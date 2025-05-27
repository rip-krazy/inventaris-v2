<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\DetailRuang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian
        
        // Statistik untuk dashboard cards
        $totalRuangs = Ruang::count();
        $ruangsWithDescription = Ruang::whereNotNull('description')
                                      ->where('description', '!=', '')
                                      ->count();
        $ruangsWithoutDescription = $totalRuangs - $ruangsWithDescription;

        // Ambil data ruang dengan pencarian (jika ada) dan selalu mengurutkan berdasarkan 'name'
        $ruangs = Ruang::when($search, function ($query, $search) {
                            $query->where('name', 'like', '%' . $search . '%')
                                  ->orWhere('description', 'like', '%' . $search . '%');
                        })
                        ->orderBy('name', 'asc') // Urutkan berdasarkan 'name' secara alfabetis
                        ->paginate(10); // Atur jumlah data per halaman
        
        // Kirim data ruang, statistik, dan query pencarian ke view
        return view('admin.ruang.index', compact(
            'ruangs', 
            'search', 
            'totalRuangs', 
            'ruangsWithDescription', 
            'ruangsWithoutDescription'
        ));
    }

    public function create()
    {
        return view('admin.ruang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ruangs,name',
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
            'name' => 'required|string|max:255|unique:ruangs,name,' . $ruang->id,
            'description' => 'nullable|string',
        ]);

        $ruang->update($request->all());

        return redirect()->route('ruang.index')->with('success', 'Data ruang berhasil diubah.');
    }

    public function destroy(Ruang $ruang)
    {
        try {
            // Cek apakah ruang memiliki detail barang
            $hasDetails = DetailRuang::where('ruang_id', $ruang->id)->exists();
            
            if ($hasDetails) {
                return redirect()->route('ruang.index')
                    ->with('error', 'Ruang tidak dapat dihapus karena masih memiliki detail barang.');
            }
            
            $ruang->delete();
            
            return redirect()->route('ruang.index')
                ->with('success', 'Data ruang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')
                ->with('error', 'Terjadi kesalahan saat menghapus ruang.');
        }
    }

    public function item(Ruang $ruang)
    {
        return view('admin.ruang.detailruang.index', compact('ruang'));
    }

    public function show($id)
    {
        // Pastikan kita mengambil ruang beserta detail barangnya
        $ruang = Ruang::findOrFail($id);
    
        // Ambil detail barang terkait dengan ruang ini
        $detailruangs = DetailRuang::where('ruang_id', $id)->get();
    
        return view('admin.ruang.detailruang.index', compact('ruang', 'detailruangs'));
    }
}