<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

// Route untuk halaman welcome
Route::get('/', function () {
    return view('user.home');
});

// Route dashboard umum
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route profile untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/home', function () {
        return view('admin.home');
    })->name('admin.home');
});

// Route untuk user dashboard, dapat diakses oleh user biasa
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/home', function () {
        return view('user.home');
    })->name('user.home');
});

Route::get('/ruangans', [RuanganController::class, 'index'])->name('ruangans.index');
Route::get('/ruangans/create', [RuanganController::class, 'create'])->name('ruangans.create');
Route::post('/ruangans', [RuanganController::class, 'store'])->name('ruangans.store');
Route::get('/ruangans/{ruangan}', [RuanganController::class, 'show'])->name('ruangans.show');
Route::get('/ruangans/{ruangan}/edit', [RuanganController::class, 'edit'])->name('ruangans.edit');
Route::put('/ruangans/{ruangan}', [RuanganController::class, 'update'])->name('ruangans.update');
Route::delete('/ruangans/{ruangan}', [RuanganController::class, 'destroy'])->name('ruangans.destroy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/ruangan', [RuanganController::class, 'indexUser'])->name('user.ruangan.index');
});
