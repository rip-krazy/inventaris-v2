<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini

class PenggunaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');  // Ambil input pencarian

    // Ambil data pengguna dengan pencarian (jika ada) dan selalu mengurutkan berdasarkan 'name'
    $penggunas = Pengguna::when($search, function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%')
                              ->orWhere('username', 'like', '%' . $search . '%')
                              ->orWhere('password', 'like', '%' . $search . '%')
                              ->orWhere('mapel', 'like', '%' . $search . '%');
                    })
                    ->orderBy('name', 'asc') // Urutkan berdasarkan 'name' secara alfabetis
                    ->paginate(10); // Atur jumlah data per halaman
    
    // Kirim data pengguna dan query pencarian ke view
    return view('admin.pengguna.index', compact('penggunas', 'search'));
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

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:penggunas,username,'.$id,
            'mapel' => 'required|string|max:255',
            'password' => 'nullable|min:6', // Password boleh kosong
        ]);

        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->mapel = $request->mapel;

        // Hanya update password jika ada input baru
        if ($request->filled('password')) {
            $pengguna->password = $request->password; // Simpan langsung tanpa Hash
        }


        $pengguna->save();

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }


    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
