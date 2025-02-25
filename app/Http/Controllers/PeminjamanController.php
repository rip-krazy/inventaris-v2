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
        $request->validate([
            'nama' => 'required|string',
            'mapel' => 'required|string',
            'jam' => 'required|string',
            'jenis' => 'required|string',
        ]);
    
        $newEntry = [
            'name' => $request->nama,
            'mapel' => $request->mapel,
            'jam' => $request->jam,
            'status' => 'Pending',
            'jenis' => $request->jenis,
        ];
    
        if ($request->jenis === 'barang') {
            $request->validate(['barangtempat' => 'required|exists:barangs,id']);
            $newEntry['barangTempat'] = $request->barangtempat;
        } else {
            $request->validate(['ruangtempat' => 'required|exists:ruangs,id']);
            $newEntry['ruangTempat'] = $request->ruangtempat;
            $newEntry['ruangNama'] = $request->ruang_nama; // Simpan nama ruangan
        }
    
        $pendingApprovals = Session::get('pending_approvals', []);
        $pendingApprovals[] = $newEntry;
        Session::put('pending_approvals', $pendingApprovals);
    
        return redirect()->route('peminjaman.index')->with('notification', 'Peminjaman berhasil diajukan!');
    }

}
