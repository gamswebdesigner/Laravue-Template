<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/teste-sem-layout', function () {
    return Inertia::render('WithoutLayout');
})->name('semLayout');

// ------------------------------------- ROTAS DE AUTENTICAÇÃO --------------------------------------- //

// Rota protegida (Exemplo de Dashboard)
Route::get('/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->middleware('auth')->name('dashboard');


// Rotas de Visitantes (Apenas não autenticados)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);

    // Recuperação de Senha (Esqueci a senha)
    Route::get('/forgot-password', [PasswordResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'store'])->name('password.email');

    // Reset da Senha (Link do E-mail)
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'edit'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});

// Logout
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');
