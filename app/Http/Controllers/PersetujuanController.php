<?php

namespace App\Http\Controllers;

use App\Models\persetujuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingApprovals = persetujuan::all(); // Fetch all approvals
        return view('your_view_name', compact('pendingApprovals')); // Pass them to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'barangtempat' => 'required|string|max:255',
            'jam' => 'required|date_format:H:i',
        ]);

        Persetujuan::create($request->only('nama', 'mapel', 'barangtempat', 'jam'));

        return redirect()->back()->with('success', 'Approval added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
