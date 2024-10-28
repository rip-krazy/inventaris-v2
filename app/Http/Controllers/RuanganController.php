<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class ruanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all();
        $ruangan = Ruangan::paginate(2);
        return view('admin.ruangan.index', compact('ruangan'));
    }

    public function create()
    {
        return view('admin.ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
        ]);

        Ruangan::create($request->all());
        return redirect()->route('ruangan.index')->with('success', 'ruangan created successfully.');
    }

    public function edit(Ruangan $ruangan)
    {
        return view('admin.ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
        ]);

        $ruangan->update($request->all());
        return redirect()->route('ruangan.index')->with('success', 'ruangan updated successfully.');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'ruangan deleted successfully.');
    }
}
