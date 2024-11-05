<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
        $penggunas = Pengguna::all();
        $penggunas = Pengguna::paginate(10); 
        return view('admin.pengguna.index', compact('penggunas'));
=======
         $search = $request->input('search');  // Ambil input pencarian

        // Cek apakah ada pencarian
        if ($search) {
            // Jika ada, cari berdasarkan nama_barang, kode_barang, atau kondisi_barang
            $penggunas = Pengguna::where('name', 'like', '%' . $search . '%')
                             ->orWhere('username', 'like', '%' . $search . '%')
                             ->orWhere('password', 'like', '%' . $search . '%')
                             ->orWhere('mapel', 'like', '%' . $search . '%')
                             ->paginate(10); // Atur jumlah barang per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua barang dengan paginasi
            $penggunas = Pengguna::paginate(10);
        }
    
        // Kirim data barang dan query pencarian ke view
        return view('admin.pengguna.index', compact('penggunas', 'search'));
>>>>>>> 040ed90dc43c5e0de58a3c5df42825b8be5e0914
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:penggunas',
            'password' => 'required|unique:penggunas',
            'mapel' => 'required',
        ]);
        
        Pengguna::create($request->all());
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(Pengguna $pengguna)
    {
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:penggunas,username,' . $pengguna->id,
            'photo' => 'nullable|image',
            'mapel' => 'required',
        ]);
        
        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
