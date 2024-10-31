<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuController extends Controller
{
    public function index()
    {
        $ruangs = Ruang::all();
        $ruangs = Ruang::paginate(1);
        return view('user.ru.index', compact('ruangs'));
    }
}
