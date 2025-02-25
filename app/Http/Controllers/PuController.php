<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Ruang;
use App\Models\DetailRuang;


class PuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
    
        // Konversi ID ruangTempat ke nama
        foreach ($pengembalianTertunda as &$entry) {
            if (isset($entry['ruangTempat']) && is_numeric($entry['ruangTempat'])) {
                $entry['ruangTempat'] = $this->getNamaBarangAtauRuang($entry['ruangTempat']);
            }
        }
    
        // Simpan kembali ke session setelah dikonversi
        Session::put('pengembalian_tertunda', $pengembalianTertunda);
    
        return view('user.pu.index', compact('pengembalianTertunda'));
    }

    
    private function getNamaBarangAtauRuang($id)
{
    if (!$id || !is_numeric($id)) {
        return '-';
    }

    // Cek di tabel Ruang
    $ruang = Ruang::find($id);
    if ($ruang) {
        return $ruang->name ?? '-';
    }

    // Cek di tabel DetailRuang
    $detailRuang = DetailRuang::find($id);
    if ($detailRuang) {
        return $detailRuang->nama_barang ?? '-';
    }

    return '-';
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
