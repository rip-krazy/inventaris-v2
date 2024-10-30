<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DbController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $barangs = Barang::paginate(2); // Adjust the number as needed
        return view('user.db.index', compact('barangs'));
    }
}
