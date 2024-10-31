<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\RuController;

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

Route::resource('ruang', RuangController::class);

// Route user

Route::resource('pengguna', PenggunaController::class);

// Route Persetujuan

Route::resource('persetujuan', PersetujuanController::class);

Route::get('user/du', function () {
    return view('user/du');
});

Route::resource('db', DbController::class);

Route::resource('ru', RuController::class);


Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('/persetujuan', [PeminjamanController::class, 'store'])->name('persetujuan.store');


// Rute untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute untuk registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);