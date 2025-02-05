<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengembalianController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengembalian yang tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = Session::get('pengembalian_history', []);
        
        // Pass data ke view
        return view('admin.pengembalian.index', compact('pengembalianTertunda', 'pengembalianHistory'));
    }

    public function approve($index)
    {
        // Mengambil data pengembalian tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
    
        if (isset($pengembalianTertunda[$index])) {
            // Memindahkan data yang disetujui ke history
            $pengembalianHistory = Session::get('pengembalian_history', []);
    
            // Pastikan key yang dibutuhkan ada pada data pengembalian
            $entry = $pengembalianTertunda[$index];
    
            // Memastikan data memiliki key yang benar
            if (!isset($entry['name'], $entry['mapel'], $entry['barangTempat'])) {
                // Tambahkan validasi atau penanganan error jika ada key yang hilang
                return redirect()->route('pengembalian.index')->with('status', 'error')->with('message', 'Data tidak lengkap!');
            }
    
            // Menambahkan data yang disetujui ke pengembalian history
            $pengembalianHistory[] = [
                'name' => $entry['name'],
                'mapel' => $entry['mapel'],
                'barangTempat' => $entry['barangTempat'],
                'tanggal_pengembalian' => now()->toDateString(),  // Menyimpan tanggal pengembalian saat ini
            ];
    
            // Menghapus data yang sudah disetujui dari pengembalian tertunda
            unset($pengembalianTertunda[$index]);
    
            // Menyimpan kembali data ke session
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
            Session::put('pengembalian_history', $pengembalianHistory);
        }
    
        // Redirect setelah proses approve
        return redirect()->route('pengembalian.index')->with('status', 'success')->with('message', 'Permintaan pengembalian telah disetujui!');
    }
    

    public function history()
    {
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = Session::get('pengembalian_history', []);

       

        return view('admin.history.index', compact('pengembalianHistory'));
    }
}







