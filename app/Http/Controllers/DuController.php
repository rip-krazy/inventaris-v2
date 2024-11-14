<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Barang;
use Illuminate\Http\Request;

class DuController extends Controller
{
    public function index()
    {
        $jumlahPengguna = Pengguna::count(); 
        $totalbarang = Barang::count();
        $jumlahBarangBaik = Barang::where('kondisi_barang', 'baik')->count();
        $jumlahBarangRusak = Barang::where('kondisi_barang', 'rusak')->count();
        return view('user.du.index',compact('jumlahPengguna','totalbarang','jumlahBarangBaik','jumlahBarangRusak'));
    }
}
