<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $users = User::when($search, function($query) use ($search) {
                    return $query->where('name', 'like', "%{$search}%")
                                 ->orWhere('email', 'like', "%{$search}%")
                                 ->orWhere('mapel', 'like', "%{$search}%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        return view('admin.users.index', compact('users', 'search'));
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mapel' => $request->mapel,
            'is_admin' => $request->has('is_admin') ? true : false,
        ]);

        // Simpan password asli di session untuk ditampilkan
        session()->put('generated_passwords.'.$user->id, $request->password);

        return redirect()->route('admin.users.index')
             ->with('success', 'User created successfully');
    }
    
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

        $userCount = User::count();
        $isAdmin = ($userCount == 0);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mapel' => $request->mapel,
            'is_admin' => $isAdmin,
        ]);

        // Simpan password asli di session untuk ditampilkan
        session()->put('generated_passwords.'.$user->id, $request->password);

        return redirect()->route('pengguna.index')
             ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'mapel' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mapel' => $request->mapel,
            'is_admin' => $request->has('is_admin') ? true : false,
        ];

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
            // Simpan password baru di session
            session()->put('generated_passwords.'.$user->id, $request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
             ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        // Hapus juga password yang tersimpan di session jika ada
        session()->forget('generated_passwords.'.$user->id);

        return redirect()->route('admin.users.index')
             ->with('success', 'User deleted successfully');
    }
}