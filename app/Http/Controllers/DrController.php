<?php

namespace App\Http\Controllers;

use App\Models\DetailRuang;
use Illuminate\Http\Request;

class DrController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $detailruangs = DetailRuang::where('nama_barang', 'like', '%' . $search . '%')
                                        ->orWhere('kode_barang', 'like', '%' . $search . '%')
                                        ->orWhere('kondisi_barang', 'like', '%' . $search . '%')
                                        ->paginate(10);
        } else {
            $detailruangs = DetailRuang::paginate(10);
        }
    
        return view('user.ru.dr.index', compact('detailruangs', 'search'));
    }
}
