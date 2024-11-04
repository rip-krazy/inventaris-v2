<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::all();
        $penggunas = Pengguna::paginate(1); 
        return view('admin.pengguna.index', compact('penggunas'));
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
