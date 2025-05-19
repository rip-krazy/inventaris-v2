<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $penggunas = User::when($search, function ($query, $search) {
                            return $query->where('name', 'like', '%' . $search . '%')
                                  ->orWhere('email', 'like', '%' . $search . '%')
                                  ->orWhere('mapel', 'like', '%' . $search . '%');
                        })
                        ->orderBy('name', 'asc')
                        ->paginate(10);
        
        return view('admin.pengguna.index', compact('penggunas', 'search'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'mapel' => 'required|string|max:255',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mapel' => $request->mapel,
        ]);

        // Simpan password original di database untuk ditampilkan
        \App\Models\PlaintextPassword::create([
            'user_id' => $user->id,
            'password' => $request->password,
        ]);

        return redirect()->route('pengguna.index')
               ->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'mapel' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mapel' => $request->mapel,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
            
            // Update atau buat record password plaintext di database
            \App\Models\PlaintextPassword::updateOrCreate(
                ['user_id' => $pengguna->id],
                ['password' => $request->password]
            );
        }

        $pengguna->update($data);

        return redirect()->route('pengguna.index')
               ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $pengguna)
    {
        // Catatan: Tidak perlu menghapus plaintext password
        // karena sudah ada constraint onDelete('cascade')
        // pada tabel plaintext_passwords        
        $pengguna->delete();
        
        return redirect()->route('pengguna.index')
               ->with('success', 'Pengguna berhasil dihapus');
    }
}