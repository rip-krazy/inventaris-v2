<?php

namespace App\Http\Controllers;
use App\Models\Ruangan;
use App\Models\Ruang;

use Illuminate\Http\Request;

class RuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian

    // Ambil data ruang dengan pencarian (jika ada) dan selalu mengurutkan berdasarkan 'name'
    $ruangs = Ruang::when($search, function ($query, $search) {
                        $query->where('name', 'like', '%' . $search . '%')
                              ->orWhere('description', 'like', '%' . $search . '%');
                    })
                    ->orderBy('name', 'asc') // Urutkan berdasarkan 'name' secara alfabetis
                    ->paginate(10); // Atur jumlah data per halaman
    
        // Kirim data barang dan query pencarian ke view
        return view('user.ru.index', compact('ruangs', 'search'));

    }
}
