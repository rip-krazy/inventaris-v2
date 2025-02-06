<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\HistoryPengembalian;

class PengembalianController extends Controller
{
    public function index()
    {
        // Mendapatkan data pengembalian yang tertunda dari session
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
        
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = Session::get('pengembalian_history', []);
        
        // Pass data ke view
        return view('admin.pengembalian.index', compact('pengembalianTertunda', 'pengembalianHistory'));
    }

    public function approve($index)
    {
        $pengembalianTertunda = Session::get('pengembalian_tertunda', []);
    
        if (isset($pengembalianTertunda[$index])) {
            $entry = $pengembalianTertunda[$index];
    
            if (!isset($entry['name'], $entry['mapel'], $entry['barangTempat'])) {
                return redirect()->route('pengembalian.index')->with('status', 'error')->with('message', 'Data tidak lengkap!');
            }
    
            // Simpan ke database
            HistoryPengembalian::create([
                'name' => $entry['name'],
                'mapel' => $entry['mapel'],
                'barang_tempat' => $entry['barangTempat'],
                'tanggal_pengembalian' => now()->toDateString(),
            ]);
    
            unset($pengembalianTertunda[$index]);
    
            Session::put('pengembalian_tertunda', $pengembalianTertunda);
        }
    
        return redirect()->route('pengembalian.index')->with('status', 'success')->with('message', 'Permintaan pengembalian telah disetujui!');
    }
    

    public function history()
    {
        // Mendapatkan data pengembalian yang sudah disetujui (history) dari session
        $pengembalianHistory = HistoryPengembalian::all();
        return view('admin.history.index', compact('pengembalianHistory'));
    }
}







