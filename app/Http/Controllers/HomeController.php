<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function userDashboard()
    {
        return view('user.dashboard'); // Buatkan view ini di resources/views/user/dashboard.blade.php
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); // Buatkan view ini di resources/views/admin/dashboard.blade.php
    }
}
