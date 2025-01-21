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
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PuController;
use App\Http\Controllers\RaController;
use App\Http\Controllers\DetailruangController;
use App\Http\Controllers\DrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;


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

// Route data
Route::resource('barangs', BarangController::class);

// Route Ruangan

Route::resource('ruang', RuangController::class);
Route::get('/ruang/{id}/detailruang', [RuangController::class, 'show'])->name('detailruang');

Route::resource('detailruang', DetailruangController::class);
// Route user

Route::resource('pengguna', PenggunaController::class);

Route::resource('detailruang', DetailruangController::class);
// Route::get('detailruang/{detailruang}/show', [DetailRuangController::class, 'show'])->name('detailruang.show');


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Resource route for the history controller (this will handle CRUD operations for the "history" resource)
Route::resource('history', HistoryController::class);

// Custom route for showing a specific history day (this is your custom route)
Route::get('history/{history}', [HistoryController::class, 'show'])->name('history.show');





Route::resource('hu', HuController::class);


require __DIR__.'/auth.php';

