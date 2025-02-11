<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruang;
use App\Models\Barang;
use App\Models\peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Ambil data barang dari tabel 'barangs'
        $barangs = Barang::all();
        
        // Ambil data ruang dari tabel 'ruangs'
        $ruangs = Ruang::all();
    
        // Ambil data user yang sedang login
        $user = Auth::user();
    
        // Kirimkan data barang, ruang, dan data user ke view
        return view('user.peminjaman.index', compact('barangs', 'ruangs', 'user'));

    }

    public function submit(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama' => 'required|string',
            'mapel' => 'required|string',
            'barangtempat' => 'required|exists:barangs,id', // Validasi jika barang/tempat ada
            'jam' => 'required|string',
            'jenis' => 'required|string', // Validasi jenis
        ]);
    
        // Tentukan jenis (barang atau ruang) yang dipilih
        $jenis = $request->jenis;
    
        // Tambahkan permintaan baru ke session
        $newEntry = [
            'name' => $request->nama,
            'mapel' => $request->mapel,
            'barangTempat' => $request->barangtempat,
            'jam' => $request->jam,
            'status' => 'Pending',
            'jenis' => $jenis, // Menyimpan jenis (barang/ruang)
            'barangtempat' => $request->barangtempat, // menyimpan id barang atau ruang
            'ruangtempat' => $request->ruangtempat,  // menyimpan id ruang
        ];
    
        // Ambil pending approvals dari session dan simpan
        $pendingApprovals = Session::get('pending_approvals', []);
        $pendingApprovals[] = $newEntry;
        Session::put('pending_approvals', $pendingApprovals);
    
        // Redirect ke halaman tunggu
        return redirect()->route('ra.index');
    }
    
    

}
