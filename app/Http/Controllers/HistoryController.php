<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controller\history;

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


    }

