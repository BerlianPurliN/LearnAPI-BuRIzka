<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswasController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/siswas', [SiswasController::class, 'index']);
// Route::get('/siswas', [SiswasController::class, 'create']);
// Route::post('/siswas', [SiswasController::class, 'store']);
// Route::get('/siswas/{id}/edit', [SiswasController::class, 'edit'])->name('siswas.edit');
// Route::put('siswas/{id}', [SiswasController::class, 'update'])->name('siswas.update');
// Route::delete('/siswas/{id}', [SiswasController::class, 'destroy'])->name('siswas.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
