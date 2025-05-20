<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Barang;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
   public function index()
   {
    if(Auth::id())
    {
        $usertype=Auth()->user()->usertype;

        // Get the count of pending returns from session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        $jumlahPengembalianTertunda = count($pengembalianTertunda);

        if($usertype=='user')
        {
            $jumlahPengguna = User::count(); 
            $totalbarang = Barang::count();
            $jumlahBarangBaik = Barang::where('kondisi_barang', 'baik')->count();
            $jumlahBarangRusak = Barang::where('kondisi_barang', 'rusak')->count();
            return view('user.du.index',compact(
                'jumlahPengguna',
                'totalbarang',
                'jumlahBarangBaik',
                'jumlahBarangRusak',
                'jumlahPengembalianTertunda'
            ));
        }

        else if($usertype=='admin')
        {
            $jumlahPengguna = User::count(); 
            $totalbarang = Barang::count();
            $jumlahBarangBaik = Barang::where('kondisi_barang', 'baik')->count();
            $jumlahBarangRusak = Barang::where('kondisi_barang', 'rusak')->count();
            return view('admin.dashboard.index', compact(
                'jumlahPengguna',
                'totalbarang',
                'jumlahBarangBaik',
                'jumlahBarangRusak',
                'jumlahPengembalianTertunda'
            ));
        }

        else
        {
            return redirect()->back();
        }
    }
   }
   
   public function showItemDetails()
   {
       $barangList = Barang::all();
       return response()->json([
           'status' => 'success',
           'data' => $barangList
       ]);
   }
   
   public function showPendingReturns()
   {
       // Get pending returns from session
       $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
       
       // Convert IDs to names, similar to how it's done in PengembalianController
       foreach ($pengembalianTertunda as &$entry) {
           if (isset($entry['barangTempat']) && is_numeric($entry['barangTempat'])) {
               $entry['barangTempat'] = $this->getNamaBarangAtauRuang($entry['barangTempat']);
           }

           if (isset($entry['ruangTempat']) && is_numeric($entry['ruangTempat'])) {
               $entry['ruangTempat'] = $this->getNamaBarangAtauRuang($entry['ruangTempat']);
           }
       }
       
       return response()->json([
           'status' => 'success',
           'data' => $pengembalianTertunda
       ]);
   }
   
   /**
    * Helper function to get item name by ID (copied from PengembalianController)
    */
   private function getNamaBarangAtauRuang($id)
   {
       // Check if ID is a Barang
       $barang = Barang::find($id);
       if ($barang) {
           return $barang->nama_barang;
       }
   
       // Check if ID is a Ruang
       $ruang = Ruang::find($id);
       if ($ruang) {
           return $ruang->name;
       }
   
       // If not found
       return '-';
   }
}