<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $barangs = Barang::paginate(10); // Adjust the number as needed
        return view('admin.barangs.index', compact('barangs'));
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
            'jumlah_barang' => 'required|integer',
            'lokasi' => 'required',
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
            'jumlah_barang' => 'required|integer',
            'lokasi' => 'required',
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
