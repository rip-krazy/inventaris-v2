<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');  // Ambil input pencarian

    // Ambil data ruang dengan pencarian (jika ada) dan selalu mengurutkan berdasarkan 'name'
    $ruangs = Ruang::when($search, function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%')
                              ->orWhere('description', 'like', '%' . $search . '%');
                    })
                    ->orderBy('name', 'asc') // Urutkan berdasarkan 'name' secara alfabetis
                    ->paginate(10); // Atur jumlah data per halaman
    
    // Kirim data ruang dan query pencarian ke view
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

    public function item(Ruang $ruang)
    {
        return view('admin.ruang.detailruang.index', compact('ruang'));
    }

    public function show($id)
    {
        // Fetch the room with its items
        $ruang = Ruang::with('items')->findOrFail($id);
        
        return view('admin.ruang.detailruang.index', compact('ruang'));
    }
}
