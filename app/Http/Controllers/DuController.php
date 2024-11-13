<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuController extends Controller
{
    public function index()
    {
        return view('user.du.index');
    }
}
