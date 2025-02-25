<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

            // Simpan history pengembalian dengan membedakan barang dan ruang
            $pengembalianHistory[] = [
                'name' => $pengembalianTertunda[$index]['name'],
                'mapel' => $pengembalianTertunda[$index]['mapel'],
                'barang_tempat' => $barangTempat,
                'ruangTempat' => $ruangTempat,
                'tanggal_pengembalian' => now()->toDateString(),
            ];

            // Hapus dari daftar tertunda
            unset($pengembalianTertunda[$index]);

            // Update session
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
            Session::put('pengembalian_history', $pengembalianHistory);
        }

        return redirect()->route('pengembalian.index')->with('status', 'success')->with('message', 'Permintaan pengembalian telah disetujui!');
    }

    // Menampilkan riwayat pengembalian
    public function history()
    {
        $historyPengembalian = Pengembalian::all();
        return view('admin.history.index', compact('historyPengembalian'));
    }
}
