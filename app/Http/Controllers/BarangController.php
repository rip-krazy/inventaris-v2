<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian
    
        // Ambil data barang berdasarkan pencarian dan urutkan nama_barang
        $barangs = Barang::when($search, function ($query, $search) {
                        $query->where('nama_barang', 'like', '%' . $search . '%')
                              ->orWhere('kode_barang', 'like', '%' . $search . '%')
                              ->orWhere('kondisi_barang', 'like', '%' . $search . '%');
                    })
                    ->orderBy('nama_barang', 'asc') // Urutkan berdasarkan nama_barang secara alfabetis
                    ->paginate(10); // Atur jumlah barang per halaman
    
        $totalBarang = Barang::count();
        
        // Kirim data barang dan query pencarian ke view
        return view('admin.barangs.index', compact('barangs', 'search'));
    }


    public function create()
    {
        return view('admin.barangs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:barangs',
            'kondisi_barang' => 'required',
        ]);

        Barang::create($request->all());
        return redirect()->route('barangs.index')->with('success', 'Data Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('admin.barangs.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'kondisi_barang' => 'required',
        ]);

        $barang->update($request->all());
        return redirect()->route('barangs.index')->with('success', 'Data Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Data Barang berhasil dihapus.');
    }
}
