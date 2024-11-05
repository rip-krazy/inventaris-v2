<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all();
        $ruangan = Ruangan::paginate(2);
        return view('user.ru.index', compact('ruangan'));
    }
}
