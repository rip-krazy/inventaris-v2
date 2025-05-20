<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\DetailruangController;
use App\Http\Controllers\DrController;
use App\Http\Controllers\DuController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HuController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuController;
use App\Http\Controllers\RaController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\RuController;
use App\Http\Controllers\AdminUserController;

// Models
use App\Models\Pengguna;

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

/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
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


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::get('/jumlah-pengguna', function () {
    return response()->json(['jumlah' => Pengguna::count()]);
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Laravel's built-in profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Custom profile
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [ProfilController::class, 'destroy'])->name('profil.destroy');
});

/*
|--------------------------------------------------------------------------
| Barang (Item) Routes
|--------------------------------------------------------------------------
*/
Route::resource('barangs', BarangController::class);

/*
|--------------------------------------------------------------------------
| Ruang (Room) Routes
|--------------------------------------------------------------------------
*/
Route::resource('ruang', RuangController::class);
Route::get('/ruang/{id}/detail', [DetailRuangController::class, 'index'])->name('ruang.detail');

/*
|--------------------------------------------------------------------------
| DetailRuang (Room Detail) Routes
|--------------------------------------------------------------------------
*/
Route::resource('detailruang', DetailRuangController::class);
Route::get('/detailruang/create/{id}', [DetailRuangController::class, 'create'])->name('detailruang.create');
Route::get('/detailruang/{id}', [DetailRuangController::class, 'show'])->name('detailruang.show');
Route::get('/detailruang/item/{id}', [DetailRuangController::class, 'showItem'])->name('detailruang.showItem');
Route::get('/detailruang/{id}', [DetailRuangController::class, 'index'])->name('detailruang.index');
Route::post('/detailruang/store', [DetailRuangController::class, 'store'])->name('detailruang.store');
Route::put('/detailruang/update/{id}', [DetailRuangController::class, 'update'])->name('detailruang.update');
Route::get('/detailruang/item/edit/{id}', [DetailRuangController::class, 'editItem'])->name('detailruang.editItem');

/*
|--------------------------------------------------------------------------
| Pengguna (User) Routes
|--------------------------------------------------------------------------
*/
Route::resource('pengguna', PenggunaController::class);

/*
|--------------------------------------------------------------------------
| Peminjaman (Borrowing) Routes
|--------------------------------------------------------------------------
*/
Route::resource('peminjaman', PeminjamanController::class);
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('/peminjaman/submit', [PeminjamanController::class, 'submit'])->name('peminjaman.submit');

/*
|--------------------------------------------------------------------------
| Approvals Routes
|--------------------------------------------------------------------------
*/
Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
Route::post('/approvals/approve/{index}', [ApprovalController::class, 'approve'])->name('approvals.approve');
Route::post('/approvals/reject/{index}', [ApprovalController::class, 'reject'])->name('approvals.reject');

/*
|--------------------------------------------------------------------------
| Pengembalian (Return) Routes
|--------------------------------------------------------------------------
*/
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
Route::post('/pengembalian/approve/{index}', [PengembalianController::class, 'approve'])->name('pengembalian.approve');
Route::get('/pengembalian/reset-filter', [PengembalianController::class, 'resetFilter'])->name('pengembalian.reset-filter');
Route::get('/pengembalian/export-csv', [PengembalianController::class, 'exportCsv'])->name('pengembalian.export-csv');
Route::get('/pengembalian/details/{id}', [PengembalianController::class, 'getDetails'])->name('pengembalian.get-details');

/*
|--------------------------------------------------------------------------
| History Routes
|--------------------------------------------------------------------------
*/
Route::get('/history', [PengembalianController::class, 'history'])->name('pengembalian.history');
Route::get('/pengembalian/history', [PengembalianController::class, 'history'])->name('pengembalian.history');
Route::get('/history/filter', [HistoryController::class, 'index'])->name('history.filter');

/*
|--------------------------------------------------------------------------
| User History Routes
|--------------------------------------------------------------------------
*/
Route::resource('hu', HuController::class);
Route::get('/user/history/details/{id}', [HuController::class, 'getDetails'])->name('hu.details');
Route::get('/user/history/filter', [HuController::class, 'filter'])->name('hu.filter');
Route::get('/user/history/reset', [HuController::class, 'resetFilter'])->name('hu.reset');
Route::post('/hu/delete-history', [HuController::class, 'deleteHistory'])->name('hu.deleteHistory');

/*
|--------------------------------------------------------------------------
| Other Resource Routes
|--------------------------------------------------------------------------
*/
Route::resource('du', DuController::class);
Route::resource('db', DbController::class);
Route::resource('ru', RuController::class);
Route::resource('ra', RaController::class);
Route::resource('pu', PuController::class);

// Dr Routes
Route::resource('dr', DrController::class);
Route::get('/dr/{id}', [DrController::class, 'show'])->name('dr.show');

// Rute register yang dapat diakses tanpa middleware admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/register', [AdminUserController::class, 'registerForm'])->name('admin.register');
    Route::post('/admin/register', [AdminUserController::class, 'registerStore'])->name('admin.register.store');
});

    // User management routes
    Route::resource('users', UserController::class);


// Registration routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('admin.register.show');
Route::post('/register', [UserController::class, 'store'])->name('admin.register.store');