<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pengembalian;
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
        
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = Session::get('pengembalian_history', []);

        // Mengkonversi ID barangTempat menjadi nama barang untuk pengembalianTertunda
        foreach ($pengembalianTertunda as &$entry) {
            if (isset($entry['barangTempat']) && is_numeric($entry['barangTempat'])) {
                $id = $entry['barangTempat'];
                
                // Coba cari dari Barang dulu
                $barang = Barang::find($id);
                if ($barang) {
                    $entry['barangTempat'] = $barang->nama_barang;
                } else {
                    // Coba cari dari DetailRuang
                    $detailRuang = DetailRuang::find($id);
                    if ($detailRuang) {
                        $entry['barangTempat'] = $detailRuang->nama_barang;
                    } else {
                        // Coba cari dari Ruang
                        $ruang = Ruang::find($id);
                        if ($ruang) {
                            $entry['barangTempat'] = $ruang->nama_ruang;
                        }
                    }
                }
            }
        }
        
        // Simpan kembali data dengan nama yang telah diubah
        Session::put('pengembalian_tertunda', $pengembalianTertunda);

        return view('admin.pengembalian.index', compact('pengembalianTertunda', 'pengembalianHistory'));
    }

    public function approve($index)
    {
        // Mengambil data pengembalian tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        if (isset($pengembalianTertunda[$index])) {
            // Memindahkan data yang disetujui ke history
            $pengembalianHistory = Session::get('pengembalian_history', []);
            $entry = $pengembalianTertunda[$index];
            
            // Pastikan kita menggunakan nama barang, bukan ID
            $barangTempat = $entry['barangTempat'];
            
            // Cek apakah barangTempat berupa ID, jika iya cari namanya dari database
            if (is_numeric($barangTempat)) {
                // Coba cari dari Barang dulu
                $barang = Barang::find($barangTempat);
                if ($barang) {
                    $barangTempat = $barang->nama_barang;
                } else {
                    // Coba cari dari DetailRuang
                    $detailRuang = DetailRuang::find($barangTempat);
                    if ($detailRuang) {
                        $barangTempat = $detailRuang->nama_barang;
                    } else {
                        // Coba cari dari Ruang
                        $ruang = Ruang::find($barangTempat);
                        if ($ruang) {
                            $barangTempat = $ruang->nama_ruang;
                        }
                    }
                }
            }
            
            // Menambahkan data yang disetujui ke pengembalian history dengan nama barang yang benar
            $pengembalianHistory[] = [
                'name' => $entry['name'],
                'mapel' => $entry['mapel'],
                'barangTempat' => $barangTempat, // Menggunakan nama barang/tempat, bukan ID
                'tanggal_pengembalian' => now()->toDateString(),
            ];
            
            // Menghapus data yang sudah disetujui dari pengembalian tertunda
            unset($pengembalianTertunda[$index]);
            
            // Menyimpan kembali data ke session
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
            Session::put('pengembalian_history', $pengembalianHistory);
        }
        
        return redirect()->route('pengembalian.index')
            ->with('status', 'success')
            ->with('message', 'Permintaan pengembalian telah disetujui!');
    }
    
    public function history()
    {
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = Session::get('pengembalian_history', []);
        
        // Pastikan semua barangTempat dikonversi ke nama jika masih berupa ID
        foreach ($pengembalianHistory as &$entry) {
            if (isset($entry['barangTempat']) && is_numeric($entry['barangTempat'])) {
                $id = $entry['barangTempat'];
                
                // Coba cari dari Barang dulu
                $barang = Barang::find($id);
                if ($barang) {
                    $entry['barangTempat'] = $barang->nama_barang;
                } else {
                    // Coba cari dari DetailRuang
                    $detailRuang = DetailRuang::find($id);
                    if ($detailRuang) {
                        $entry['barangTempat'] = $detailRuang->nama_barang;
                    } else {
                        // Coba cari dari Ruang
                        $ruang = Ruang::find($id);
                        if ($ruang) {
                            $entry['barangTempat'] = $ruang->nama_ruang;
                        }
                    }
                }
            }
        }
        
        // Update session dengan data yang telah dikonversi
        Session::put('pengembalian_history', $pengembalianHistory);
        
        return view('admin.history.index', compact('pengembalianHistory'));
    }
}