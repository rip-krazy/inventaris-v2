<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
=======

>>>>>>> ca71a344eadfdb8fd5ef6b1f8bb631f0b32c5674
        $search = $request->input('search');  // Ambil input pencarian

        // Cek apakah ada pencarian
        if ($search) {
            // Jika ada, cari berdasarkan nama_barang, kode_barang, atau kondisi_barang
            $barangs = Barang::where('nama_barang', 'like', '%' . $search . '%')
                             ->orWhere('kode_barang', 'like', '%' . $search . '%')
                             ->orWhere('kondisi_barang', 'like', '%' . $search . '%')
                             ->paginate(10); // Atur jumlah barang per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua barang dengan paginasi
            $barangs = Barang::paginate(10);
        }
    
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
