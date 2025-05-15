<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
   {
    if(Auth::id())
    {
        $usertype=Auth()->user()->usertype;

        if($usertype=='user')
        {
            $jumlahPengguna = User::count(); 
            $totalbarang = Barang::count();
            $jumlahBarangBaik = Barang::where('kondisi_barang', 'baik')->count();
            $jumlahBarangRusak = Barang::where('kondisi_barang', 'rusak')->count();
            return view('user.du.index',compact('jumlahPengguna','totalbarang','jumlahBarangBaik','jumlahBarangRusak'));
        }

        else if($usertype=='admin')
        {
            $jumlahPengguna = User::count(); 
            $totalbarang = Barang::count();
            $jumlahBarangBaik = Barang::where('kondisi_barang', 'baik')->count();
            $jumlahBarangRusak = Barang::where('kondisi_barang', 'rusak')->count();
            return view('admin.dashboard.index', compact('jumlahPengguna','totalbarang','jumlahBarangBaik','jumlahBarangRusak'));
        }

        else
        {
            return redirect()->back();
        }
    }
   }
}
