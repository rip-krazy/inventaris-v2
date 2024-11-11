<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\RuController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PeminjamanController;
<<<<<<< HEAD
use App\Http\Controllers\Auth\AuthenticatedSessionController;
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
>>>>>>> 22f86f1f6cc9261141750b0a8e0cf16f5890e22e

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
<<<<<<< HEAD
Route::get('ruangs', [RuangController::class, 'index'])->name('ruangs.index');

=======
>>>>>>> 22f86f1f6cc9261141750b0a8e0cf16f5890e22e
// Route user

Route::resource('pengguna', PenggunaController::class);
// Route Persetujuan


Route::get('approvals/', [ApprovalController::class, 'index'])->name('approvals.index');
Route::post('approvals/approve/{index}', [ApprovalController::class, 'approve'])->name('approvals.approve');
Route::post('approvals/reject/{index}', [ApprovalController::class, 'reject'])->name('approvals.reject');

Route::get('user/du', function () {
    return view('user/du');
});

Route::resource('db', DbController::class);

Route::resource('ru', RuController::class);

Route::resource('peminjaman', PeminjamanController::class);
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('/peminjaman/submit', [PeminjamanController::class, 'submit'])->name('peminjaman.submit');
Route::get('/pending', [PeminjamanController::class, 'pending'])->name('pending');

Route::get('/pending', function () {
    return view('user.peminjaman.pending'); // Adjust the path according to your folder structure
})->name('pending');


<<<<<<< HEAD
// Rute untuk menampilkan form login
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
=======
Route::resource('profile', ProfileController::class);

>>>>>>> 22f86f1f6cc9261141750b0a8e0cf16f5890e22e

// Rute untuk mengautentikasi (login)
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Rute untuk logout
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
