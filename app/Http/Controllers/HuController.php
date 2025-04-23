<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class HuController extends Controller
{
    /**
     * Display a listing of the user's return history.
     */
    public function index()
    {
        // Get the current authenticated user's name
        $userName = Auth::user()->name;
        
        // Fetch history data from database instead of session
        $pengembalianHistory = History::where('type', 'pengembalian')
            ->where('name', $userName)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Pass the data to the view
        return view('user.hu.index', compact('pengembalianHistory'));
    }

    /**
     * Get detailed information about a specific history entry
     */
    public function getDetails($id)
    {
        // Get the authenticated user's name
        $userName = Auth::user()->name;
        
        // Find the history entry by ID and ensure it belongs to the current user
        $history = History::where('id', $id)
            ->where('name', $userName)
            ->first();
        
        if ($history) {
            return response()->json($history);
        }
        
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

    /**
     * Filter history entries based on search criteria
     */
    public function filter(Request $request)
    {
        $userName = Auth::user()->name;
        $query = History::where('type', 'pengembalian')
            ->where('name', $userName);
            
        // Apply search filter
        $search = $request->input('search');
        $filterTanggal = $request->input('tanggal');
        $filterStatus = $request->input('status');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('barang_tempat', 'like', "%{$search}%")
                  ->orWhere('ruang_tempat', 'like', "%{$search}%")
                  ->orWhere('mapel', 'like', "%{$search}%");
            });
        }

        // Apply date filter
        if (!empty($filterTanggal)) {
            $query->whereDate('tanggal_pengembalian', $filterTanggal);
        }

        // Apply status filter
        if (!empty($filterStatus)) {
            $query->where('status', $filterStatus);
        }

        // Get the filtered results
        $pengembalianHistory = $query->orderBy('created_at', 'desc')->get();

        // Pass request parameters back to view for maintaining filter state
        $filters = [
            'search' => $search,
            'tanggal' => $filterTanggal,
            'status' => $filterStatus
        ];

        return view('user.hu.index', compact('pengembalianHistory', 'filters'));
    }

    /**
     * Reset all filters
     */
    public function resetFilter()
    {
        return redirect()->route('hu.index');
    }
}