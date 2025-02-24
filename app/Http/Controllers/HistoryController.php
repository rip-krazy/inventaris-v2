<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengembalian yang tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $historyPengembalian = Session::get('history_pengembalian', []);

        return view('admin.pengembalian.index', compact('pengembalianTertunda', 'historyPengembalian'));
    }

    public function approve($index)
    {
        // Mengambil data pengembalian tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        if (isset($pengembalianTertunda[$index])) {
            // Memindahkan data yang disetujui ke history
            $pengembalianHistory = Session::get('pengembalian_history', []);
    
            // Pastikan data yang disetujui memiliki key yang sesuai, termasuk 'tanggal_pengembalian'
            $pengembalianHistory[] = [
                'name' => $pengembalianTertunda[$index]['name'],
                'mapel' => $pengembalianTertunda[$index]['mapel'],
                'barang_tempat' => $pengembalianTertunda[$index]['barang_tempat'],
                'tanggal_pengembalian' => now()->toDateString(),  // Menggunakan tanggal sekarang
            ];
    
            // Menghapus data yang sudah disetujui dari pengembalian tertunda
            unset($pengembalianTertunda[$index]);
    
            // Menyimpan kembali data ke session
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
            Session::put('pengembalian_history', $pengembalianHistory);
        }
    
        return redirect()->route('pengembalian.index')->with('status', 'success')->with('message', 'Permintaan pengembalian telah disetujui!');
    }
    

    // Menampilkan riwayat pengembalian
    public function history()
    {
        $historyPengembalian = Pengembalian::all();
    return view('admin.pengembalian.history', compact('historyPengembalian'));
    }
}
