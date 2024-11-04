<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        return view('user.peminjaman.index');
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
    public function submit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'mapel' => 'required|string',
            'barangtempat' => 'required|string',
            'jam' => 'required|string',
        ]);
    
        $newEntry = [
            'name' => $request->nama,
            'mapel' => $request->mapel,
            'barangTempat' => $request->barangtempat,
            'jam' => $request->jam,
            'status' => 'Pending'
        ];
    
        // Store the new entry in the session
        $pendingApprovals = Session::get('pending_approvals', []);
        $pendingApprovals[] = $newEntry;
        Session::put('pending_approvals', $pendingApprovals);
    
        return redirect()->route('peminjaman.index'); // Redirect to the form or approval list
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
