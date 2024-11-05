<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian

        // Cek apakah ada pencarian
        if ($search) {
            // Jika ada, cari berdasarkan nama_barang, kode_barang, atau kondisi_barang
            $ruangs = Ruang::where('name', 'like', '%' . $search . '%')
                             ->orWhere('description', 'like', '%' . $search . '%')
                             ->paginate(10); // Atur jumlah barang per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua Ruang dengan paginasi
            $ruangs = Ruang::paginate(10);
        }
    
        // Kirim data barang dan query pencarian ke view
        return view('admin.ruang.index', compact('ruangs', 'search'));
    }

    public function create()
    {
        return view('admin.ruang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Ruang::create($request->all());

        return redirect()->route('ruang.index')->with('success', 'Data ruang berhasil ditambahkan.');
    }

    public function edit(Ruang $ruang)
    {
        return view('admin.ruang.edit', compact('ruang'));
    }

    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $ruang->update($request->all());

        return redirect()->route('ruang.index')->with('success', 'Data ruang berhasil diubah.');
    }

    public function destroy(Ruang $ruang)
    {
        $ruang->delete();

        return redirect()->route('ruang.index')->with('success', 'Data ruang berhasil dihapus.');
    }

    // RuangController: App\Http\Controllers\RuangController.php
    public function details(Ruang $ruang)
    {
        $barangs = $ruang->barangs; // Get items in this room
        return view('admin.ruang.details', compact('ruang', 'barangs'));
    }

}
