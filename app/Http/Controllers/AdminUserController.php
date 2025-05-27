<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|string|in:admin,user',
            'mapel' => 'required|string|max:255',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'usertype' => $request->usertype,
                'mapel' => $request->mapel,
            ]);

            // Pastikan user berhasil dibuat sebelum menyimpan plaintext password
            if ($user && $user->id) {
                // Simpan password asli di database untuk ditampilkan
                \App\Models\PlaintextPassword::create([
                    'user_id' => $user->id,
                    'password' => $request->password,
                ]);
            }

            return redirect()->route('pengguna.index')
                 ->with('success', 'User created successfully');
                 
        } catch (\Exception $e) {
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Terjadi kesalahan saat membuat pengguna: ' . $e->getMessage());
        }
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
            'usertype' => 'required|string|in:admin,user',
            'mapel' => 'required|string|max:255',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'usertype' => $request->usertype,
                'mapel' => $request->mapel,
            ]);

            // Pastikan user berhasil dibuat sebelum menyimpan plaintext password
            if ($user && $user->id) {
                // Simpan password asli di database untuk ditampilkan
                \App\Models\PlaintextPassword::create([
                    'user_id' => $user->id,
                    'password' => $request->password,
                ]);
            }

            return redirect()->route('pengguna.index')
                 ->with('success', 'User created successfully');
                 
        } catch (\Exception $e) {
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Terjadi kesalahan saat membuat pengguna: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('admin.pengguna.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'mapel' => 'required|string|max:255',
            'usertype' => 'required|string|in:admin,user',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'mapel' => $request->mapel,
                'usertype' => $request->usertype,
            ];

            // Jika password diisi, update password
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|string|min:8|confirmed',
                ]);
                
                $data['password'] = Hash::make($request->password);
                
                // Update atau buat record password plaintext di database
                \App\Models\PlaintextPassword::updateOrCreate(
                    ['user_id' => $user->id],
                    ['password' => $request->password]
                );
            }

            $user->update($data);

            return redirect()->route('pengguna.index')
                 ->with('success', 'User updated successfully');
                 
        } catch (\Exception $e) {
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Terjadi kesalahan saat mengupdate pengguna: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            
            // Hapus juga password yang tersimpan di session jika ada
            session()->forget('generated_passwords.'.$user->id);

            return redirect()->route('pengguna.index')
                 ->with('success', 'User deleted successfully');
                 
        } catch (\Exception $e) {
            return redirect()->back()
                   ->with('error', 'Terjadi kesalahan saat menghapus pengguna: ' . $e->getMessage());
        }
    }
}