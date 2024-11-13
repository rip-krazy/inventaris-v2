<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('user.peminjaman.index');
    }

    public function submit(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama' => 'required|string',
            'mapel' => 'required|string',
            'barangtempat' => 'required|string',
            'jam' => 'required|string',
        ]);
    
        // Tambahkan permintaan baru ke session
        $newEntry = [
            'name' => $request->nama,
            'mapel' => $request->mapel,
            'barangTempat' => $request->barangtempat,
            'jam' => $request->jam,
            'status' => 'Pending',
        ];
    
        // Ambil pending approvals dari session dan simpan
        $pendingApprovals = Session::get('pending_approvals', []);
        $pendingApprovals[] = $newEntry;
        Session::put('pending_approvals', $pendingApprovals);
    
        // Redirect ke halaman tunggu
        return redirect()->route('ra.index');
    }
    
}


