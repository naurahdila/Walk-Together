<?php


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\transaksiAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\articleController;
use App\Http\Middleware\AuthCheckMiddleware;
use App\Http\Controllers\UserDetailTransaksi;


use App\Http\Controllers\process_registration;
use App\Http\Controllers\user_detailtransaksi;
use App\Http\Controllers\TransactionController;




// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
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
    Route::get('/detail_lomba', [process_registration::class, 'showlomba'])->name('detail_lomba')->defaults('category', 'lomba');
    Route::get('/detail_freshgraduate', [process_registration::class, 'showfreshgraduate'])->name('detail_freshgraduate')->defaults('category', 'freshgraduate');
    Route::get('/detail_magang', [process_registration::class, 'showmagang'])->name('detail_magang')->defaults('category', 'magang');
    Route::get('/detail_kewirausahaan', [process_registration::class, 'showkewirausahaan'])->name('detail_kewirausahaan')->defaults('category', 'kewirausahaan');
    Route::get('/detail_mapres', [process_registration::class, 'showmapres'])->name('detail_mapres')->defaults('category', 'mapres');

    Route::post('/pendaftaraan', [process_registration::class, 'store'])->name('registration.store');
    Route::get('/pendaftaran/success', function() { return "Data Berhasil Disimpan!";})->name('registration.success');
    Route::get('/user/transactions', [user_detailtransaksi::class, 'index'])->name('user.detailtransaksi');
    Route::post('/user/transactions', [user_detailtransaksi::class, 'index'])->name('post.detailtransaksi'); 


    //ini route untuk section article admin
    Route::get('/admin/articles', [articleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [articleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [articleController::class, 'store'])->name('admin.articles.store');

    //section article untuk user
    Route::get('/articles', [articleController::class, 'list'])->name('user.articles.list');
    Route::get('/articles/{id}', [articleController::class, 'show'])->name('user.articles.show');
    Route::post('/image/upload', [imageController::class, 'upload'])->name('image.upload');
    Route::post('/articles/{id}/like', [articleController::class, 'likeArticle']);

    //ini route untuk admin akses tabel transaksi
    Route::get('transaction_history', [transaksiAdmin::class, 'index'])->name('admin.transaction_history.index');
    Route::get('transaction_history/print', [transaksiAdmin::class, 'printPDF'])->name('admin.transaction_history.print');
    Route::get('/admin/transaction-history/{id}', [transaksiAdmin::class, 'show'])
    ->name('admin.transaction_history.show');
  
});




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


//MIDTRANS BARUUU
Route::post('/transaction/pay/{id}', [UserDetailTransaksi::class, 'createPaymentToken'])->name('paymento');
Route::get('/transaction/pay/{id}', [UserDetailTransaksi::class, 'createPaymentToken'])->name('payment');


Route::post('/midtrans/webhook/', [UserDetailTransaksi::class, 'handleNotification'])->name('handleNotification');

//transaction invoice
Route::get('/transaction/invoice/{id}', [TransactionController::class, 'invoice'])->name('transaction.invoice');

Route::post('/transaction/update-status/{id}', function ($id, Request $request) {
    $transaction = App\Models\Transaction::find($id);
    if ($transaction) {
        $transaction->status_pembayaran = $request->input('status');
        $transaction->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan.']);
});


Route::post('/update-status-pembayaran', [UserDetailTransaksi::class, 'updateStatusPembayaran']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');



