<?php

// app/Http/Controllers/BarangController.php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $barangs = Barang::with('ruang')
            ->when($search, function ($query, $search) {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhere('kode_barang', 'like', '%' . $search . '%')
                      ->orWhere('kondisi_barang', 'like', '%' . $search . '%')
                      ->orWhereHas('ruang', function($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%');
                      });
            })
            ->orderBy('kode_barang', 'asc')
            ->get()
            ->groupBy('nama_barang')
            ->map(function ($items) {
                $lokasiCount = $items->groupBy('ruang.name')->map(function ($lokasiItems) {
                    return $lokasiItems->count();
                });

                return [
                    'nama_barang' => $items->first()->nama_barang,
                    'total_barang' => $items->count(),
                    'baik_count' => $items->where('kondisi_barang', 'Baik')->count(),
                    'rusak_count' => $items->where('kondisi_barang', 'Rusak')->count(),
                    'lokasi_list' => $lokasiCount->toArray(),
                    'items' => $items->sortBy('kode_barang')
                ];
            });

        $currentPage = request()->get('page', 1);
        $perPage = 10;
        $currentItems = $barangs->slice(($currentPage - 1) * $perPage, $perPage);
        
        $totalBarang = Barang::count();
        $ruangs = Ruang::all(); // Untuk dropdown jika diperlukan
        
        return view('admin.barangs.index', compact('currentItems', 'search', 'totalBarang', 'barangs', 'ruangs'));
    }

    public function create()
    {
        $ruangs = Ruang::orderBy('name', 'asc')->get();
        return view('admin.barangs.create', compact('ruangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'nomor_urut' => 'required|numeric|min:0|max:999',
            'kondisi_barang' => 'required',
            'ruang_id' => 'required|exists:ruangs,id',
        ]);

        $kode_barang = $this->generateKodeBarang($request->nama_barang, $request->nomor_urut);
        
        if (Barang::where('kode_barang', $kode_barang)->exists()) {
            return back()->withErrors(['nomor_urut' => 'Kode barang ' . $kode_barang . ' sudah ada. Silakan gunakan nomor urut yang berbeda.'])->withInput();
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $kode_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'lokasi' => $request->lokasi ?? '', // Lokasi bisa diisi atau dibiarkan kosong
            'ruang_id' => $request->ruang_id,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Data Barang berhasil ditambahkan dengan kode: ' . $kode_barang);
    }

    public function edit(Barang $barang)
    {
        $ruangs = Ruang::orderBy('name', 'asc')->get();
        $nomor_urut = $this->extractNomorUrut($barang->kode_barang);
        return view('admin.barangs.edit', compact('barang', 'nomor_urut', 'ruangs'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'nomor_urut' => 'required|numeric|min:0|max:999',
            'kondisi_barang' => 'required',
            'ruang_id' => 'required|exists:ruangs,id',
        ]);

        $kode_barang_baru = $this->generateKodeBarang($request->nama_barang, $request->nomor_urut);
        
        if (Barang::where('kode_barang', $kode_barang_baru)->where('id', '!=', $barang->id)->exists()) {
            return back()->withErrors(['nomor_urut' => 'Kode barang ' . $kode_barang_baru . ' sudah ada. Silakan gunakan nomor urut yang berbeda.'])->withInput();
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $kode_barang_baru,
            'kondisi_barang' => $request->kondisi_barang,
            'ruang_id' => $request->ruang_id,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Data Barang berhasil diperbarui dengan kode: ' . $kode_barang_baru);
    }

    // ... (method lainnya tetap sama seperti sebelumnya)


    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Data Barang berhasil dihapus.');
    }

    /**
     * Get available nomor urut untuk nama barang tertentu
     */
    public function getAvailableNomorUrut(Request $request)
    {
        $nama_barang = $request->get('nama_barang');
        
        if (!$nama_barang) {
            return response()->json([]);
        }

        // Get existing kode barang untuk nama ini
        $existingCodes = Barang::where('nama_barang', $nama_barang)
                              ->pluck('kode_barang')
                              ->toArray();
        
        // Extract nomor urut yang sudah digunakan
        $usedNumbers = [];
        foreach ($existingCodes as $code) {
            $parts = explode('-', $code);
            if (isset($parts[1])) {
                $usedNumbers[] = (int)$parts[1];
            }
        }

        // Generate available numbers (1-999)
        $availableNumbers = [];
        for ($i = 1; $i <= 999; $i++) {
            if (!in_array($i, $usedNumbers)) {
                $kode_preview = $this->generateKodeBarang($nama_barang, $i);
                $availableNumbers[] = [
                    'nomor' => $i,
                    'kode' => $kode_preview
                ];
            }
        }

        return response()->json($availableNumbers);
    }

    /**
     * Get existing barang dengan nama yang sama
     */
    public function getExistingBarang(Request $request)
    {
        $nama_barang = $request->get('nama_barang');
        
        if (!$nama_barang) {
            return response()->json([]);
        }

        $existingBarang = Barang::where('nama_barang', $nama_barang)
                               ->orderBy('kode_barang', 'asc')
                               ->get(['id', 'kode_barang', 'kondisi_barang', 'lokasi']);

        return response()->json($existingBarang);
    }

    /**
     * Get unique locations from database
     */
    public function getLocations(Request $request)
    {
        $search = $request->get('search', '');
        
        $locations = Barang::select('lokasi')
                          ->distinct()
                          ->when($search, function ($query, $search) {
                              return $query->where('lokasi', 'like', '%' . $search . '%');
                          })
                          ->orderBy('lokasi', 'asc')
                          ->pluck('lokasi')
                          ->filter()
                          ->values();

        return response()->json($locations);
    }

    /**
     * Generate kode barang berdasarkan 3 huruf depan nama barang + nomor urut
     */
    private function generateKodeBarang($nama_barang, $nomor_urut)
    {
        // Ambil 3 huruf depan dari nama barang, ubah ke lowercase
        $prefix = strtolower(substr(preg_replace('/[^a-zA-Z]/', '', $nama_barang), 0, 3));
        
        // Format nomor urut menjadi 3 digit dengan leading zero
        $nomor_formatted = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
        
        // Gabungkan dengan format: prefix-nomor
        return $prefix . '-' . $nomor_formatted;
    }

    /**
     * Extract nomor urut dari kode barang yang ada
     */
    private function extractNomorUrut($kode_barang)
    {
        // Split kode barang berdasarkan '-'
        $parts = explode('-', $kode_barang);
        
        // Ambil bagian terakhir (nomor urut) dan convert ke integer
        return isset($parts[1]) ? (int)$parts[1] : 1;
    }
}