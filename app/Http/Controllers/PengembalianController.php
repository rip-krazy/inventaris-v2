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
        return view('admin.pengembalian.index', compact('pengembalianTertunda'));
    }

    // Menyetujui permintaan pengembalian
    public function approve($index)
    {
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        if (isset($pengembalianTertunda[$index])) {
            // Mengubah status menjadi 'Diterima'
            $pengembalianTertunda[$index]['status'] = 'Diterima';
        }

        // Menyimpan kembali data yang telah diperbarui ke session
        Session::put('pengembalian_tertunda', $pengembalianTertunda);

        return redirect()->route('pengembalian.index')->with('status', 'success')->with('message', 'Permintaan pengembalian telah disetujui!');
    }

    
}
