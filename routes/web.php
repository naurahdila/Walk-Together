<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/walktogether', function () {
    return view('layout.main');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.action'); // Proses login
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('regis'); // Menampilkan form register
Route::post('/register', [AuthController::class, 'register'])->name('register.action'); // Proses register
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); // Menampilkan dashboard setelah login
