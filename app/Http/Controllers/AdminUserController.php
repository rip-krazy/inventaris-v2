<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mapel' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mapel' => $request->mapel,
        ]);

        return redirect()->route('admin.users.index')
             ->with('success', 'User created successfully');
    }
    
    // Metode tambahan yang dapat diakses tanpa middleware admin
    public function registerForm()
    {
        return view('admin.users.register');
    }
    
    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mapel' => 'required|string|max:255',
        ]);

        // Jika ini adalah user pertama, maka jadikan admin
        $userCount = User::count();
        $isAdmin = ($userCount == 0);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mapel' => $request->mapel,
            'is_admin' => $isAdmin,
        ]);

        return redirect()->route('home')
             ->with('success', 'User created successfully');
    }
}