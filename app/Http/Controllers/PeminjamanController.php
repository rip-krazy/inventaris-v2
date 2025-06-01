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
            'jam_dari' => 'required|numeric',
            'jam_sampai' => 'required|numeric|gt:jam_dari',
            'jenis' => 'required|string',
        ]);

        if ($request->jenis === 'barang') {
            $request->validate(['barangtempat' => 'required|exists:barangs,id']);
            $barang = Barang::find($request->barangtempat);
            if ($barang->kondisi_barang !== 'Baik') {
                return back()->withErrors(['barangtempat' => 'Barang dalam kondisi rusak tidak dapat dipinjam'])->withInput();
            }
        } else {
            $request->validate([
                'ruangtempat' => 'required|exists:ruangs,id',
                'ruang_nama' => 'required|string'
            ]);
            
            // Cek ketersediaan ruangan
            $ruang = Ruang::find($request->ruangtempat);
            
            // Jika ruangan sudah dipinjam (ada di description)
            if ($ruang->description && str_contains($ruang->description, 'Dipinjam')) {
                return back()->withErrors(['ruangtempat' => 'Ruangan ini sedang tidak tersedia'])->withInput();
            }
        }

        $jamFormat = "Jam ke-{$request->jam_dari} sampai Jam ke-{$request->jam_sampai}";

        $newEntry = [
            'name' => $request->nama,
            'mapel' => $request->mapel,
            'jam' => $jamFormat,
            'status' => 'Pending',
            'jenis' => $request->jenis,
            'catatan' => $request->catatan,
        ];

        if ($request->jenis === 'barang') {
            $newEntry['barangTempat'] = $request->barangtempat;
        } else {
            $newEntry['ruangTempat'] = $request->ruangtempat;
            $newEntry['ruangNama'] = $request->ruang_nama;
            
            // Update keterangan ruangan
            $ruang = Ruang::find($request->ruangtempat);
            $ruang->update([
                'description' => "Dipinjam oleh {$request->nama} untuk {$request->mapel} ({$jamFormat})"
            ]);
        }

        $pendingApprovals = Session::get('pending_approvals', []);
        $pendingApprovals[] = $newEntry;
        Session::put('pending_approvals', $pendingApprovals);

        return redirect()->route('peminjaman.index')->with('notification', 'Peminjaman berhasil diajukan!');
    }
}