<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;



class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Daftar aktivitas atau data history (bisa dari database atau array)
        return view('admin.history.index');
    }

    /**
     * Display the specified resource (Menampilkan detail berdasarkan hari).
     */
    public function show(string $day)
    {
        $daysMap = [
            'senin' => 1,
            'selasa' => 2,
            'rabu' => 3,
            'kamis' => 4,
            'jumat' => 5,
            'sabtu' => 6,
            'minggu' => 7,
        ];
    
        if (!array_key_exists($day, $daysMap)) {
            abort(404);
        }
    
        $history = History::whereDay('created_at', $daysMap[$day])->get();
    
        return view('admin.history.show', compact('history', 'day'));  // Pass $day here
    }
    

    }

