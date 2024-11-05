<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Ruangan;
=======
use App\Models\Ruang;
>>>>>>> b26db9b2880b925c607e78ef7b2437bc3dd6a0c0
use Illuminate\Http\Request;

class RuController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $ruangan = Ruangan::all();
        $ruangan = Ruangan::paginate(2);
        return view('user.ru.index', compact('ruangan'));
=======
        $ruangs = Ruang::all();
        $ruangs = Ruang::paginate(1);
        return view('user.ru.index', compact('ruangs'));
>>>>>>> b26db9b2880b925c607e78ef7b2437bc3dd6a0c0
    }
}
