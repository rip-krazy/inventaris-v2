<?php

namespace App\Http\Controllers;

use App\Models\DetailRuang;
use Illuminate\Http\Request;

class DrController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        // Mengambil data detailruangs dengan pencarian (jika ada) dan selalu mengurutkan data berdasarkan nama_barang
        $detailruangs = DetailRuang::when($search, function ($query, $search) {
                            $query->where('nama_barang', 'like', '%' . $search . '%')
                                  ->orWhere('kode_barang', 'like', '%' . $search . '%')
                                  ->orWhere('kondisi_barang', 'like', '%' . $search . '%');
                        })
                        ->orderBy('nama_barang', 'asc') // Urutkan berdasarkan nama_barang dari A-Z
                        ->paginate(10); // Atur jumlah data per halaman
    
        return view('user.ru.dr.index', compact('detailruangs', 'search'));
    }
}
