<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\DuController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\RuController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PuController;
use App\Http\Controllers\RaController;
use App\Http\Controllers\DetailruangController;
use App\Http\Controllers\DrController;


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

Route::resource('dashboard', DashboardController::class);

// Route data
Route::resource('barangs', BarangController::class);

// Route Ruangan

Route::resource('ruang', RuangController::class);

// Route user

Route::resource('pengguna', PenggunaController::class);

Route::resource('detailruang', DetailruangController::class);
Route::get('/detailruang/{id}/show', [DetailRuangController::class, 'show'])->name('detailruang.show');



// Halaman Pengembalian
//Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
//Route::post('/pengembalian', [PengembalianController::class, 'store'])->name('pengembalian.store');
// Route Persetujuan


Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
Route::post('/approvals/approve/{index}', [ApprovalController::class, 'approve'])->name('approvals.approve');
Route::post('/approvals/reject/{index}', [ApprovalController::class, 'reject'])->name('approvals.reject');

// Rute untuk melihat daftar pengembalian
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');

// Rute untuk menyetujui permintaan pengembalian
Route::post('/pengembalian/approve/{index}', [PengembalianController::class, 'approve'])->name('pengembalian.approve');


Route::resource('du', DuController::class);

Route::resource('db', DbController::class);

Route::resource('ru', RuController::class);

Route::resource('dr', DrController::class);

Route::resource('peminjaman', PeminjamanController::class);
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('/peminjaman/submit', [PeminjamanController::class, 'submit'])->name('peminjaman.submit');

Route::resource('ra', RaController::class);

Route::resource('pu', PuController::class);


Route::resource('profile', ProfileController::class);

// Rute untuk mengautentikasi (login)
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Rute untuk logout
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
