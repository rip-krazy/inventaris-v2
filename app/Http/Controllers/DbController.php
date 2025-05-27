<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DbController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian
    
        // Group barang berdasarkan nama_barang dan urutkan
        $barangs = Barang::when($search, function ($query, $search) {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhere('kode_barang', 'like', '%' . $search . '%')
                      ->orWhere('kondisi_barang', 'like', '%' . $search . '%');
            })
            ->orderBy('kode_barang', 'asc') // Urutkan berdasarkan kode_barang
            ->get()
            ->groupBy('nama_barang')
            ->map(function ($items) {
                return [
                    'nama_barang' => $items->first()->nama_barang,
                    'total_barang' => $items->count(),
                    'baik_count' => $items->where('kondisi_barang', 'Baik')->count(),
                    'rusak_count' => $items->where('kondisi_barang', 'Rusak')->count(),
                    'items' => $items->sortBy('kode_barang') // Pastikan items sudah terurut
                ];
            });

        // Convert back to paginated collection if needed
        $currentPage = request()->get('page', 1);
        $perPage = 10;
        $currentItems = $barangs->slice(($currentPage - 1) * $perPage, $perPage);
        
        $totalBarang = Barang::count();
        
        return view('user.db.index', compact('currentItems', 'search', 'totalBarang', 'barangs'));
    }
}