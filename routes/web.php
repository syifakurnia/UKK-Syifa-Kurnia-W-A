<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasyarakatController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified','checkRole:admin, petugas'])->group(function() {
    Route::get('dataPetugas', [AdminController::class, 'dataPetugas'])->name('dataPetugas');
    Route::get('dataMasyarakat', [AdminController::class, 'dataMasyarakat'])->name('dataMasyarakat');
    Route::put('validasi', [AdminController::class, 'update'])->name('validasi');
});

Route::get('dataPengaduan', [AdminController::class, 'table'])->name('dataPengaduan');
Route::resource('admin', AdminController::class);
Route::resource('masyarakat', MasyarakatController::class);

Route::get('/laporan', [AdminController::class, 'get_cetak']);
Route::get('/cetak_pdf', [AdminController::class, 'cetak_pdf']);
Route::put('/tanggapan', [AdminController::class, 'editData'])->name('update');

Route::middleware(['auth', 'verified','checkRole:masyarakat'])->group(function () {
    Route::get('riwayat', [MasyarakatController::class, 'dataRiwayat'])->name('riwayat');
    Route::get('dataRiwayat', [MasyarakatController::class, 'show'])->name('riwayat');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dataTable'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';