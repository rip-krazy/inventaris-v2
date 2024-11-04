<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingApprovals = Session::get('pending_approvals', []);
        return view('user.peminjaman.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'mapel' => 'required|string',
            'barangtempat' => 'required|string',
            'jam' => 'required|string',
        ]);
    
        $newEntry = [
            'name' => $request->nama,
            'mapel' => $request->mapel,
            'barangTempat' => $request->barangtempat,
            'jam' => $request->jam,
            'status' => 'Pending'
        ];
    
        // Store the new entry in the session
        $pendingApprovals = Session::get('pending_approvals', []);
        $pendingApprovals[] = $newEntry;
        Session::put('pending_approvals', $pendingApprovals);
    
        return redirect()->route('pending'); // Redirect to the form or approval list
    }

    public function pending()
    {
        return view('user.peminjaman.pending'); // This returns the pending view
    }
}
