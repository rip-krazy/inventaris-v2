<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan halaman profil (menggunakan metode show)
    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    // Menampilkan form untuk mengedit profil
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    // Memproses update profil
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Update data user
        $user->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}

