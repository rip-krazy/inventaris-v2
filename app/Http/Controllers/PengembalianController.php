<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Add this for logging
use Carbon\Carbon;
use App\Models\Pengembalian;
use App\Models\History;
use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Ruang;
use App\Models\DetailRuang;

class PengembalianController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengembalian yang tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        // Mengonversi ID barangTempat atau ruangTempat menjadi nama
        foreach ($pengembalianTertunda as &$entry) {
            if (isset($entry['barangTempat']) && is_numeric($entry['barangTempat'])) {
                $entry['barangTempat'] = $this->getNamaBarangAtauRuang($entry['barangTempat']);
            }

            if (isset($entry['ruangTempat']) && is_numeric($entry['ruangTempat'])) {
                $entry['ruangTempat'] = $this->getNamaBarangAtauRuang($entry['ruangTempat']);
            }
        }
        
        // Simpan kembali data dengan nama yang telah diubah
        Session::put('pengembalian_tertunda', $pengembalianTertunda);

        // Get approved history data from database instead of session
        $pengembalianHistory = History::where('type', 'pengembalian')->get();

        return view('admin.pengembalian.index', compact('pengembalianTertunda', 'pengembalianHistory'));
    }

    public function approve($index)
    {
        // Mengambil data pengembalian tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        if (isset($pengembalianTertunda[$index])) {
            $entry = $pengembalianTertunda[$index];
    
            // Get the item ID (either barangTempat or ruangTempat)
            $itemId = null;
            if (isset($entry['barangTempat']) && is_numeric($entry['barangTempat'])) {
                $itemId = $entry['barangTempat'];
                $barangTempat = $this->getNamaBarangAtauRuang($entry['barangTempat']);
                $ruangTempat = null;
            } elseif (isset($entry['ruangTempat']) && is_numeric($entry['ruangTempat'])) {
                $itemId = $entry['ruangTempat'];
                $ruangTempat = $this->getNamaBarangAtauRuang($entry['ruangTempat']);
                $barangTempat = null;
            } else {
                // Handle case when both are not available or not numeric
                $barangTempat = $entry['barangTempat'] ?? null;
                $ruangTempat = $entry['ruangTempat'] ?? null;
                // You might want to set a default itemId or handle this case differently
                $itemId = 0; // Or some other appropriate default
            }
    
            // Create new history record in database
            $history = new History();
            $history->name = $entry['name'];
            $history->mapel = $entry['mapel'] ?? null;
            $history->barang_tempat = $barangTempat;
            $history->ruang_tempat = $ruangTempat;
            $history->tanggal_pengembalian = now()->toDateString();
            $history->status = 'Approved';
            $history->alasan = null;
            $history->type = 'pengembalian';
            
            // Add required fields from migration
            $history->item_id = $itemId;
            $history->action = 'return'; // "pengembalian" action
            $history->admin_id = auth()->id() ?? 1; // Use authenticated admin ID or default to 1
            $history->notes = 'Approved via pengembalian system'; // Optional notes
            
            $history->save();
            
            // Menghapus data yang sudah disetujui dari pengembalian tertunda
            unset($pengembalianTertunda[$index]);
            
            // Menyimpan kembali data pengembalian tertunda ke session
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
        }
        
        return redirect()->route('pengembalian.index')
            ->with('status', 'success')
            ->with('message', 'Permintaan pengembalian telah disetujui dan disimpan ke database!');
    }
    
    public function history(Request $request)
    {
        // Query dasar untuk mendapatkan data history dari database
        $query = History::where('type', 'pengembalian');

        // Apply search filter
        $search = $request->input('search');
        $filterTanggal = $request->input('tanggal');
        $filterStatus = $request->input('status');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('barang_tempat', 'like', "%{$search}%")
                  ->orWhere('ruang_tempat', 'like', "%{$search}%")
                  ->orWhere('mapel', 'like', "%{$search}%");
            });
        }

        // Apply date filter
        if (!empty($filterTanggal)) {
            $query->whereDate('tanggal_pengembalian', $filterTanggal);
        }

        // Apply status filter
        if (!empty($filterStatus)) {
            $query->where('status', $filterStatus);
        }

        // Get the filtered results
        $pengembalianHistory = $query->get();

        // Pass request parameters back to view for maintaining filter state
        $filters = [
            'search' => $search,
            'tanggal' => $filterTanggal,
            'status' => $filterStatus
        ];

        return view('admin.history.index', [
            'pengembalianHistory' => $pengembalianHistory,
            'filters' => $filters
        ]);
    }

    public function resetFilter()
    {
        return redirect()->route('pengembalian.history');
    }

    public function exportCsv(Request $request)
    {
        // Query dasar untuk mendapatkan data history dari database
        $query = History::where('type', 'pengembalian');
        
        // Apply the same filters as in the history method
        $search = $request->input('search');
        $filterTanggal = $request->input('tanggal');
        $filterStatus = $request->input('status');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('barang_tempat', 'like', "%{$search}%")
                  ->orWhere('ruang_tempat', 'like', "%{$search}%")
                  ->orWhere('mapel', 'like', "%{$search}%");
            });
        }

        // Apply date filter
        if (!empty($filterTanggal)) {
            $query->whereDate('tanggal_pengembalian', $filterTanggal);
        }

        // Apply status filter
        if (!empty($filterStatus)) {
            $query->where('status', $filterStatus);
        }

        // Get the filtered results
        $filteredHistory = $query->get();

        // Generate CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="pengembalian_history.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($filteredHistory) {
            $file = fopen('php://output', 'w');
            
            // Add CSV header
            fputcsv($file, [
                'No', 
                'Nama User', 
                'Tanggal Pengembalian', 
                'Nama Barang/Tempat', 
                'Mapel', 
                'Status', 
                'Alasan'
            ]);
            
            // Add data rows
            foreach ($filteredHistory as $index => $entry) {
                fputcsv($file, [
                    $index + 1,
                    $entry->name,
                    Carbon::parse($entry->tanggal_pengembalian)->format('d M Y'),
                    $entry->barang_tempat ?? $entry->ruang_tempat ?? '-',
                    $entry->mapel ?? '-',
                    $entry->status ?? 'Approved',
                    $entry->alasan ?? '-'
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    public function getDetails($id)
    {
        $history = History::find($id);
        
        if ($history) {
            return response()->json($history);
        }
        
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

    /**
     * Fungsi untuk mencari nama Barang atau Ruang berdasarkan ID
     */
    private function getNamaBarangAtauRuang($id)
    {
        // Cek apakah ID adalah Barang
        $barang = Barang::find($id);
        if ($barang) {
            return $barang->nama_barang;
        }
    
        // Cek apakah ID adalah Ruang
        $ruang = Ruang::find($id);
        if ($ruang) {
            // Make sure this matches the column name in your Ruang model
            return $ruang->name; 
        }
    
        // Jika tidak ditemukan
        return '-';
    }
}