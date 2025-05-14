<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Show the registration form
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate basic fields for all user types
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string', 'in:admin,guru,siswa'],
        ];

        // Add conditional validation rules based on usertype
        if ($request->usertype === 'guru') {
            $rules['mapel'] = ['required', 'string', 'max:255'];
        } elseif ($request->usertype === 'siswa') {
            $rules['kelas'] = ['required', 'string', 'max:255'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new user
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ];

        // Add type-specific fields
        if ($request->usertype === 'guru' && $request->has('mapel')) {
            $userData['mapel'] = $request->mapel;
        } elseif ($request->usertype === 'siswa' && $request->has('kelas')) {
            $userData['kelas'] = $request->kelas;
        }

        $user = User::create($userData);

        // Fire registered event (useful for verification emails, etc.)
        event(new Registered($user));

        // Redirect based on user type or other logic
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat!');
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        // Basic validation rules
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'usertype' => ['required', 'string', 'in:admin,guru,siswa'],
        ];

        // Only validate password if it's being updated
        if ($request->filled('password')) {
            $rules['password'] = ['string', 'min:8', 'confirmed'];
        }

        // Add conditional validation rules based on usertype
        if ($request->usertype === 'guru') {
            $rules['mapel'] = ['required', 'string', 'max:255'];
        } elseif ($request->usertype === 'siswa') {
            $rules['kelas'] = ['required', 'string', 'max:255'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update user data
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
        ];

        // Only update password if it's being changed
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        // Handle role-specific fields
        if ($request->usertype === 'guru') {
            $userData['mapel'] = $request->mapel;
            $userData['kelas'] = null; // Clear student-specific fields
        } elseif ($request->usertype === 'siswa') {
            $userData['kelas'] = $request->kelas;
            $userData['mapel'] = null; // Clear teacher-specific fields
        } else {
            // Admin doesn't need role-specific fields
            $userData['mapel'] = null;
            $userData['kelas'] = null;
        }

        $user->update($userData);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }
}