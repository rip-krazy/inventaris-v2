<?php

namespace App\Http\Controllers;
use App\Models\Ruangan;
use App\Models\Ruang;

use Illuminate\Http\Request;

class RuController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
        $ruangs = Ruang::all();
        $ruangs = Ruang::paginate(10);
        return view('user.ru.index', compact('ruangs'));
=======
        $search = $request->input('search');  // Ambil input pencarian

        // Cek apakah ada pencarian
        if ($search) {
            // Jika ada, cari berdasarkan nama_barang, kode_barang, atau kondisi_barang
            $ruangs = Ruang::where('name', 'like', '%' . $search . '%')
                             ->orWhere('description', 'like', '%' . $search . '%')
                             ->paginate(10); // Atur jumlah barang per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua Ruang dengan paginasi
            $ruangs = Ruang::paginate(10);
        }
    
        // Kirim data barang dan query pencarian ke view
        return view('user.ru.index', compact('ruangs', 'search'));
>>>>>>> 040ed90dc43c5e0de58a3c5df42825b8be5e0914
    }
}
