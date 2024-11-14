<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Barang;
use App\Models\Detailruang;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPengguna = Pengguna::count(); 
        $totalbarang = Barang::count();
        $jumlahBarangBaik = Barang::where('kondisi_barang', 'baik')->count();
        $jumlahBarangRusak = Barang::where('kondisi_barang', 'rusak')->count();
        return view('admin.dashboard.index', compact('jumlahPengguna','totalbarang','jumlahBarangBaik','jumlahBarangRusak')); // Kirimkan data ke view
    }
}

