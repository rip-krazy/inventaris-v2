<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create($ruangId)
    {
        $ruang = Ruang::findOrFail($ruangId);
        return view('admin.ruang.detailruang.create', compact('ruang'));
    }

    public function store(Request $request, $ruangId)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|unique:items,code',
            'condition' => 'required|in:Baik,Rusak'
        ]);

        $validatedData['ruang_id'] = $ruangId;

        Item::create($validatedData);

        return redirect()->route('detailruang.show', $ruangId)
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('admin.ruang.detailruang.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|unique:items,code,' . $item->id,
            'condition' => 'required|in:Baik,Rusak'
        ]);

        $item->update($validatedData);

        return redirect()->route('detailruang.show', $item->ruang_id)
            ->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $ruangId = $item->ruang_id;
        $item->delete();

        return redirect()->route('detailruang.show', $ruangId)
            ->with('success', 'Barang berhasil dihapus');
    }
    public function show(Request $request, $id)
    {
        $item = Item::findOrFail($id); // Fetch the item by ID
        return view('admin.ruang.detailruang.show', compact('item')); // Pass the 'item' variable to the view
    }
    
    
}