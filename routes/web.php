<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PaymentController;
use App\Http\Middleware\AuthCheckMiddleware;
use App\Http\Controllers\process_registration;
use App\Http\Controllers\user_detailtransaksi;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.action'); // Proses login
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('regis'); // Menampilkan form register
Route::post('/register', [AuthController::class, 'register'])->name('register.action'); // Proses register
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');})->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
});


Route::middleware([AuthCheckMiddleware::class ])->group(function () {
    Route::get('/dashboard', [process_registration::class, 'dashboard'])->name('dashboard');
    Route::get('/detail_beasiswa', [process_registration::class, 'showProduct'])->name('detail_beasiswa')->defaults('category', 'beasiswa');
    // Route::get('/transaction/pay/{id}', [process_registration::class, 'getSnapToken'])->name('transaction.pay');
    // Route::post('/transaction/pay/{id}', [process_registration::class, 'getSnapToken'])->name('transaction.pay');



    Route::post('/pendaftaraan', [process_registration::class, 'store'])->name('registration.store');
    Route::get('/pendaftaran/success', function() { return "Data Berhasil Disimpan!";})->name('registration.success');

    Route::get('/user/transactions', [user_detailtransaksi::class, 'index'])->name('user.detailtransaksi');
    Route::post('/user/transactions', [user_detailtransaksi::class, 'index'])->name('post.detailtransaksi');


    // Melakukan pembayaran
    // Route::post('/user/transactions/{id}/pay', [user_detailtransaksi::class, 'pay'])->name('transactions.pay');



    Route::get('/check', function () {
        if (Auth::check()) {
            return "User sedang login: " . Auth::user()->name;
        }
        return "User belum login.";
    });
});

Route::post('/midtrans/notification', [process_registration::class, 'handlenotification'])->name('midtrans.notification');
Route::get('/force-logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login')->with('success', 'Logout berhasil!');
});

Route::get('/detailtransaksi', function () {
    return view('user.detailtransaksi');
});

Route::get('/user/transactions', [user_detailtransaksi::class, 'index'])->name('user.detailtransaksi');
// Melakukan pembayaran
// Route::post('/user/transactions/{id}/pay', [user_detailtransaksi::class, 'pay'])->name('transactions.pay');

// Route::get('/pembayaran', [PaymentController::class, 'processPayment'])->name('pembayaran.show');
// Route::get('/generate-snap-token', [user_detailtransaksi::class, 'store']);

//MIDTRANS BARUUU
use App\Http\Controllers\UserDetailTransaksi;

// Route::get('/transaction', [UserDetailTransaksi::class, 'index']);
Route::post('/transaction/pay/{id}', [UserDetailTransaksi::class, 'createPaymentToken'])->name('paymento');
Route::get('/transaction/pay/{id}', [UserDetailTransaksi::class, 'createPaymentToken'])->name('payment');
// Route::post('/midtrans/notification', [UserDetailTransaksi::class, 'handleNotification']);
