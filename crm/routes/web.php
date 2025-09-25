<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

// Página inicial pública
Route::get('/', function () {
    return view('welcome');
});

// Dashboard común para cualquier usuario logueado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil de usuario (viene de Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 👑 Rutas solo para admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::resource('incidents', App\Http\Controllers\IncidentController::class);
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class);
});

// 👤 Rutas para usuario normal (solo ver listados)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
});

require __DIR__.'/auth.php';

