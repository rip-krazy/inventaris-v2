<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
        $ruangs = Ruang::all();
        $ruangs = Ruang::paginate(1);
        return view('admin.ruang.index', compact('ruangs'));
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
