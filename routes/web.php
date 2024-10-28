<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
});


// Route data
Route::resource('barangs', BarangController::class);

// Route Ruangan

Route::resource('ruangan', RuanganController::class);

// Route user

Route::get('admin/pengguna', function () {
    return view('admin/pengguna');
});

Route::get('admin/persetujuan', function () {
    return view('admin/persetujuan');
});

Route::get('user/du', function () {
    return view('user/du');
});

Route::get('user/db', function () {
    return view('user/db');
});

Route::get('user/ru', function () {
    return view('user/ru');
});

Route::get('user/peminjaman', function () {
    return view('user/peminjaman');
});



// Rute untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute untuk registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);