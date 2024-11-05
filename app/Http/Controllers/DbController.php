<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DbController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian

        // Cek apakah ada pencarian
        if ($search) {
            // Jika ada, cari berdasarkan nama_barang, kode_barang, atau kondisi_barang
            $barangs = Barang::where('nama_barang', 'like', '%' . $search . '%')
                             ->orWhere('kode_barang', 'like', '%' . $search . '%')
                             ->orWhere('kondisi_barang', 'like', '%' . $search . '%')
                             ->paginate(10); // Atur jumlah barang per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua barang dengan paginasi
            $barangs = Barang::paginate(10);
        }
    
        // Kirim data barang dan query pencarian ke view
        return view('user.db.index', compact('barangs', 'search'));
    }
}
