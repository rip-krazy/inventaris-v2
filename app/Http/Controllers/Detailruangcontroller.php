<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\DetailRuang;
use Illuminate\Http\Request;

class DetailRuangController extends Controller
{
    public function index(Request $request, $id)
    {
        // Method ini sudah benar digantikan oleh method show untuk menampilkan daftar barang
        return redirect()->route('detailruang.show', ['id' => $id]);
    }
    
    public function create($id)
    {
        // Ambil data ruang berdasarkan ID
        $ruang = Ruang::findOrFail($id);
    
        // Kirim data ruang ke view create
        return view('admin.ruang.detailruang.create', compact('ruang'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:detailruangs',
            'kondisi_barang' => 'required',
            'ruang_id' => 'required|exists:ruangs,id',
        ]);
    
        DetailRuang::create([
            'ruang_id' => $request->ruang_id,
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kondisi_barang' => $request->kondisi_barang,
        ]);
    
        // Pass the ruang_id to the redirect
        return redirect()->route('detailruang.index', ['id' => $request->ruang_id])
                        ->with('success', 'Data Ruang berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $detailruang = DetailRuang::findOrFail($id);
        return view('admin.ruang.detailruang.edit', compact('detailruang'));
    }
    
    public function update(Request $request, $id)
    {
        $detailruang = DetailRuang::findOrFail($id);
        
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:detailruangs,kode_barang,' . $id,
            'kondisi_barang' => 'required',
        ]);
    
        $detailruang->update([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kondisi_barang' => $request->kondisi_barang,
        ]);
    
        return redirect()->route('detailruang.index', ['id' => $detailruang->ruang_id])
                         ->with('success', 'Data Ruang berhasil diperbarui.');
    }
    
    public function destroy(DetailRuang $detailruang)
    {
        $ruang_id = $detailruang->ruang_id; // Save the ruang_id before deletion
        $detailruang->delete();
        return redirect()->route('detailruang.index', ['id' => $ruang_id])
                        ->with('success', 'Data Ruang berhasil dihapus.');
    }
    
    // Method ini menampilkan DAFTAR BARANG dalam sebuah ruangan (seperti index)
    public function show($id, Request $request)
    {
        $ruang = Ruang::findOrFail($id); // Get the ruang
        $search = $request->input('search', ''); // Capture search value
    
        // Get the related detailruangs, apply search filter if necessary
        $detailruangs = DetailRuang::where('ruang_id', $ruang->id)
            ->when($search, function ($query, $search) {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhere('kode_barang', 'like', '%' . $search . '%')
                      ->orWhere('kondisi_barang', 'like', '%' . $search . '%');
            })
            ->orderBy('nama_barang', 'asc')
            ->paginate(10); // Paginate results
    
        // Pass both ruang and detailruangs to the view
        return view('admin.ruang.detailruang.index', compact('ruang', 'detailruangs', 'search'));
    }
    
    // Method baru untuk menampilkan DETAIL SATU BARANG
    public function showItem($id)
    {
        $item = DetailRuang::findOrFail($id);
        return view('admin.ruang.detailruang.show', compact('item'));
    }
}