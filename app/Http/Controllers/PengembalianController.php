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

            // Konversi barangTempat & ruangTempat ke nama jika masih dalam bentuk ID
            $barangTempat = isset($entry['barangTempat']) && is_numeric($entry['barangTempat']) 
                            ? $this->getNamaBarangAtauRuang($entry['barangTempat']) 
                            : null;

            $ruangTempat = isset($entry['ruangTempat']) && is_numeric($entry['ruangTempat']) 
                            ? $this->getNamaBarangAtauRuang($entry['ruangTempat']) 
                            : null;

            // Menambahkan data yang disetujui ke pengembalian history
            $pengembalianHistory[] = [
                'name' => $entry['name'],
                'mapel' => $entry['mapel'],
                'barangTempat' => $barangTempat,
                'ruangTempat' => $ruangTempat,
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
        
        // Pastikan semua barangTempat dan ruangTempat dikonversi ke nama jika masih berupa ID
        foreach ($pengembalianHistory as &$entry) {
            if (isset($entry['barangTempat']) && is_numeric($entry['barangTempat'])) {
                $entry['barangTempat'] = $this->getNamaBarangAtauRuang($entry['barangTempat']);
            }

            if (isset($entry['ruangTempat']) && is_numeric($entry['ruangTempat'])) {
                $entry['ruangTempat'] = $this->getNamaBarangAtauRuang($entry['ruangTempat']);
            }
        }
        
        // Update session dengan data yang telah dikonversi
        Session::put('pengembalian_history', $pengembalianHistory);
        
        return view('admin.history.index', compact('pengembalianHistory'));
    }

    /**
     * Fungsi untuk mencari nama Barang atau Ruang berdasarkan ID
     */
    private function getNamaBarangAtauRuang($id)
{
    if (!$id) {
        return '-'; // Jika ID kosong, return '-'
    }

    // Cek apakah ID adalah Ruangan
    $ruang = Ruang::find($id);
    if ($ruang) {
        return $ruang->name ?? '-'; // Gunakan 'name' bukan 'nama_ruang'
    }

    // Cek apakah ID adalah Detail Ruangan
    $detailRuang = DetailRuang::find($id);
    if ($detailRuang) {
        dd($detailRuang); // Debug: Pastikan data barang dalam ruangan ditemukan
        return $detailRuang->nama_barang;
    }

    return '-';
}

}
