<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HuController extends Controller
{
    /**
     * Display a listing of the user's return history.
     */
    public function index()
    {
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = Session::get('pengembalian_history', []);
        
        // Pass the data to the view
        return view('user.hu.index', compact('pengembalianHistory'));
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
        //
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
