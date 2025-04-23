<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Pengembalian;
use App\Models\history;

class PengembalianController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengembalian yang tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $historyPengembalian = Session::get('history_pengembalian', []);

        return view('admin.history.index', compact('pengembalianTertunda', 'historyPengembalian'));
    }

    public function approve($index)
    {
        // Mengambil data pengembalian tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        if (isset($pengembalianTertunda[$index])) {
            // Memindahkan data yang disetujui ke history
            $pengembalianHistory = Session::get('pengembalian_history', []);
    
            // Pastikan kita menangani baik barang maupun ruang
            $barangTempat = isset($pengembalianTertunda[$index]['barang_tempat']) ? $pengembalianTertunda[$index]['barang_tempat'] : null;
            $ruangTempat = isset($pengembalianTertunda[$index]['ruangTempat']) ? $pengembalianTertunda[$index]['ruangTempat'] : null;
    
            // Simpan history pengembalian dengan status "Approved"
            $pengembalianHistory[] = [
                'name' => $pengembalianTertunda[$index]['name'],
                'mapel' => $pengembalianTertunda[$index]['mapel'],
                'barang_tempat' => $barangTempat,
                'ruangTempat' => $ruangTempat,
                'tanggal_pengembalian' => now()->toDateString(),
                'status' => 'Approved', // Tambahkan status di sini
            ];
    
            // Hapus dari daftar tertunda
            unset($pengembalianTertunda[$index]);
    
            // Update session
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
            Session::put('pengembalian_history', $pengembalianHistory);
        }
    
        return redirect()->route('pengembalian.index')->with('status', 'success')->with('message', 'Permintaan pengembalian telah disetujui!');
    }
    
    public function history(Request $request)
    {
        $historyPengembalian = Session::get('pengembalian_history', []);

        // Set default status for entries that don't have one
        foreach ($historyPengembalian as &$entry) {
            if (!isset($entry['status'])) {
                $entry['status'] = 'Approved'; // Default jika status tidak tersedia
            }
        }

        // Apply search filter
        $search = $request->input('search');
        $filterTanggal = $request->input('tanggal');
        $filterStatus = $request->input('status');

        $filteredHistory = $historyPengembalian;

        if (!empty($search)) {
            $filteredHistory = array_filter($filteredHistory, function($entry) use ($search) {
                // Search in name, barang/tempat, and mapel
                $searchLower = strtolower($search);
                return (
                    stripos($entry['name'], $searchLower) !== false ||
                    (isset($entry['barang_tempat']) && stripos($entry['barang_tempat'], $searchLower) !== false) ||
                    (isset($entry['ruangTempat']) && stripos($entry['ruangTempat'], $searchLower) !== false) ||
                    (isset($entry['mapel']) && stripos($entry['mapel'], $searchLower) !== false)
                );
            });
        }

        // Apply date filter
        if (!empty($filterTanggal)) {
            $filteredHistory = array_filter($filteredHistory, function($entry) use ($filterTanggal) {
                return isset($entry['tanggal_pengembalian']) && 
                       Carbon::parse($entry['tanggal_pengembalian'])->format('Y-m-d') === $filterTanggal;
            });
        }

        // Apply status filter
        if (!empty($filterStatus)) {
            $filteredHistory = array_filter($filteredHistory, function($entry) use ($filterStatus) {
                return isset($entry['status']) && $entry['status'] === $filterStatus;
            });
        }

        // Reset array keys for proper indexing
        $filteredHistory = array_values($filteredHistory);

        // Pass request parameters back to view for maintaining filter state
        $filters = [
            'search' => $search,
            'tanggal' => $filterTanggal,
            'status' => $filterStatus
        ];

        return view('admin.history.index', [
            'pengembalianHistory' => $filteredHistory,
            'filters' => $filters
        ]);
    }

    public function resetFilter()
    {
        return redirect()->route('pengembalian.history');
    }

    public function exportCsv(Request $request)
    {
        $historyPengembalian = Session::get('pengembalian_history', []);
        
        // Apply the same filters as in the history method
        $search = $request->input('search');
        $filterTanggal = $request->input('tanggal');
        $filterStatus = $request->input('status');

        $filteredHistory = $historyPengembalian;

        // Apply search filter
        if (!empty($search)) {
            $filteredHistory = array_filter($filteredHistory, function($entry) use ($search) {
                $searchLower = strtolower($search);
                return (
                    stripos($entry['name'], $searchLower) !== false ||
                    (isset($entry['barang_tempat']) && stripos($entry['barang_tempat'], $searchLower) !== false) ||
                    (isset($entry['ruangTempat']) && stripos($entry['ruangTempat'], $searchLower) !== false) ||
                    (isset($entry['mapel']) && stripos($entry['mapel'], $searchLower) !== false)
                );
            });
        }

        // Apply date filter
        if (!empty($filterTanggal)) {
            $filteredHistory = array_filter($filteredHistory, function($entry) use ($filterTanggal) {
                return isset($entry['tanggal_pengembalian']) && 
                       Carbon::parse($entry['tanggal_pengembalian'])->format('Y-m-d') === $filterTanggal;
            });
        }

        // Apply status filter
        if (!empty($filterStatus)) {
            $filteredHistory = array_filter($filteredHistory, function($entry) use ($filterStatus) {
                return isset($entry['status']) && $entry['status'] === $filterStatus;
            });
        }

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
                    $entry['name'],
                    isset($entry['tanggal_pengembalian']) ? Carbon::parse($entry['tanggal_pengembalian'])->format('d M Y') : '-',
                    isset($entry['barang_tempat']) ? $entry['barang_tempat'] : (isset($entry['ruangTempat']) ? $entry['ruangTempat'] : '-'),
                    $entry['mapel'] ?? '-',
                    $entry['status'] ?? 'Approved',
                    isset($entry['alasan']) ? $entry['alasan'] : '-'
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    public function getDetails($id)
    {
        $historyPengembalian = Session::get('pengembalian_history', []);
        
        if (isset($historyPengembalian[$id])) {
            return response()->json($historyPengembalian[$id]);
        }
        
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }
}