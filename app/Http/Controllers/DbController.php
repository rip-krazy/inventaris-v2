<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DbController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian
    
        // Ambil data barang berdasarkan pencarian dan urutkan nama_barang
        $barangs = Barang::when($search, function ($query, $search) {
                        $query->where('nama_barang', 'like', '%' . $search . '%')
                              ->orWhere('kode_barang', 'like', '%' . $search . '%')
                              ->orWhere('kondisi_barang', 'like', '%' . $search . '%');
                    })
                    ->orderBy('nama_barang', 'asc') // Urutkan berdasarkan nama_barang secara alfabetis
                    ->paginate(10); // Atur jumlah barang per halaman
    
        $totalBarang = Barang::count();
        
        // Kirim data barang dan query pencarian ke view
        return view('user.db.index', compact('barangs', 'search'));
    }
}
