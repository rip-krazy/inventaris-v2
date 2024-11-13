<?php

namespace App\Http\Controllers;

use App\Models\DetailRuang;
use Illuminate\Http\Request;

class DetailRuangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $detailruangs = DetailRuang::where('nama_barang', 'like', '%' . $search . '%')
                                        ->orWhere('kode_barang', 'like', '%' . $search . '%')
                                        ->orWhere('kondisi_barang', 'like', '%' . $search . '%')
                                        ->paginate(10);
        } else {
            $detailruangs = DetailRuang::paginate(10);
        }
    
        return view('admin.ruang.detailruang.index', compact('detailruangs', 'search'));
    }

    public function create()
    {
        return view('admin.ruang.detailruang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:detailruangs',
            'kondisi_barang' => 'required',
            'jumlah_barang' => 'required|integer',
        ]);

        DetailRuang::create($request->all());
        return redirect()->route('detailruang.index')->with('success', 'Data Ruang berhasil ditambahkan.');
    }

    public function edit(DetailRuang $detailruang)
    {
        return view('admin.ruang.detailruang.edit', compact('detailruang'));
    }

    public function update(Request $request, DetailRuang $detailruang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:detailruangs,kode_barang,' . $detailruang->id,
            'kondisi_barang' => 'required',
            'jumlah_barang' => 'required|integer',
        ]);

        $detailruang->update($request->all());
        return redirect()->route('detailruang.index')->with('success', 'Data Ruang berhasil diperbarui.');
    }

    public function destroy(DetailRuang $detailruang)
    {
        $detailruang->delete();
        return redirect()->route('detailruang.index')->with('success', 'Data Ruang berhasil dihapus.');
    }
}
