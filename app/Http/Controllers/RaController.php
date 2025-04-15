<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
         $pendingApprovals = Session::get('pending_approvals', []);
     
         foreach ($pendingApprovals as $key => $approval) {
             if (!empty($approval['barangTempat']) && is_numeric($approval['barangTempat'])) {
                 $barang = \App\Models\Barang::find($approval['barangTempat']);
                 $pendingApprovals[$key]['barangTempat'] = $barang ? $barang->nama_barang : "Barang Tidak Ditemukan";
             }
             if (!empty($approval['ruangTempat']) && is_numeric($approval['ruangTempat'])) {
                 $ruang = \App\Models\Ruang::find($approval['ruangTempat']);
                 $pendingApprovals[$key]['ruangTempat'] = $ruang ? $ruang->name : "Ruang Tidak Ditemukan";
             }
             if (!empty($approval['ruangNama'])) {
                 $pendingApprovals[$key]['ruangNama'] = $approval['ruangNama'];
             }
         }
     
         return view('user.ra.index', compact('pendingApprovals'));
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
