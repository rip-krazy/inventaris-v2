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
use App\Http\Controllers\AdminUserController;


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

Route::get('features', function () {
    return view('features');
});



use App\Models\Pengguna;
Route::get('/jumlah-pengguna', function () {
    return response()->json(['jumlah' => Pengguna::count()]);
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
// Di dalam web.php atau routes file
Route::get('/detailruang/{id}', [DetailRuangController::class, 'show'])->name('detailruang.show');
Route::get('/detailruang/item/{id}', [DetailRuangController::class, 'showItem'])->name('detailruang.showItem');
Route::get('/detailruang/{id}', [DetailRuangController::class, 'index'])->name('detailruang.index');
Route::post('/detailruang/store', [DetailRuangController::class, 'store'])->name('detailruang.store');
Route::put('/detailruang/update/{id}', [DetailRuangController::class, 'update'])->name('detailruang.update');
Route::get('/detailruang/item/edit/{id}', [DetailRuangController::class, 'editItem'])->name('detailruang.editItem');


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
// Add this to your routes/web.php file
Route::post('/hu/delete-history', [HuController::class, 'deleteHistory'])->name('hu.deleteHistory');


Route::resource('du', DuController::class);

Route::resource('db', DbController::class);

Route::resource('ru', RuController::class);

Route::resource('dr', DrController::class);
Route::get('/dr/{id}', [DrController::class, 'show'])->name('dr.show');

Route::resource('peminjaman', PeminjamanController::class);
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('/peminjaman/submit', [PeminjamanController::class, 'submit'])->name('peminjaman.submit');
Route::get('/pengembalian/reset-filter', [PengembalianController::class, 'resetFilter'])->name('pengembalian.reset-filter');
Route::get('/pengembalian/export-csv', [PengembalianController::class, 'exportCsv'])->name('pengembalian.export-csv');
Route::get('/pengembalian/details/{id}', [PengembalianController::class, 'getDetails'])->name('pengembalian.get-details');

Route::resource('ra', RaController::class);

Route::resource('pu', PuController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', AdminUserController::class);
});

Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');

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
Route::get('/user/history/details/{id}', [HuController::class, 'getDetails'])->name('hu.details');
Route::get('/user/history/filter', [HuController::class, 'filter'])->name('hu.filter');
Route::get('/user/history/reset', [HuController::class, 'resetFilter'])->name('hu.reset');


require __DIR__.'/auth.php';

