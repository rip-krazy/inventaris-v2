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
use App\Http\Controllers\HuController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfilController;


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

Route::get('about', function () {
    return view('about');
});

Route::get('privacy', function () {
    return view('privacy');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('Service', function () {
    return view('Service');
});


// Route data
Route::resource('barangs', BarangController::class);

// Route Ruangan

Route::resource('ruang', RuangController::class);
Route::get('/ruang/{id}/detail', [DetailRuangController::class, 'index'])->name('ruang.detail');


Route::resource('pengguna', PenggunaController::class);


// Remove this line since you're using custom routes
Route::resource('detailruang', DetailRuangController::class);

Route::get('/detailruang/create/{id}', [DetailRuangController::class, 'create'])->name('detailruang.create');
Route::get('/detailruang/show/{id}', [DetailRuangController::class, 'show'])->name('detailruang.show');
Route::get('/detailruang/{id}', [DetailRuangController::class, 'index'])->name('detailruang.index');
Route::post('/detailruang/store', [DetailRuangController::class, 'store'])->name('detailruang.store');
Route::post('/detailruang/edit/{id}', [DetailRuangController::class, 'edit'])->name('detailruang.edit');

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

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [ProfilController::class, 'destroy'])->name('profil.destroy');
});


Route::get('/history', [PengembalianController::class, 'history'])->name('pengembalian.history');
Route::get('/pengembalian/history', [PengembalianController::class, 'history'])->name('pengembalian.history');
Route::get('/history/filter', [HistoryController::class, 'index'])->name('history.filter');



Route::resource('hu', HuController::class);


require __DIR__.'/auth.php';

