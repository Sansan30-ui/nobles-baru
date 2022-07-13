<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/midtrans', [MidtransController::class, 'index']);

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard.index');
})->name('dashboard');



Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/home/search', [HomeController::class, 'search']);



Route::get('/barang', function () {
    return view('pages.admin.barang.index');
})->name('barang');

Route::get('/tambah', function () {
    return view('pages.admin.barang.tambah');
})->name('tambah');


Route::get('/transaksi', function () {
    return view('pages.admin.transaksi.transaksi');
})->name('transaksi');


Route::get('/profile', [UserController::class, 'edit'])->name('profile');

Route::get('/pesanan', function () {
    return view('pages.user.pesanan');
})->name('pesanan');


Route::get('/akun', [UserController::class, 'index']);
Route::put('/akun', [UserController::class, 'update']);
Route::delete('/akun/{id}', [UserController::class, 'destroy']);
Route::put('/password', [UserController::class, 'update_password']);



Route::resource('barang', BarangController::class);

Route::get('/register', [RegisterController::class]);
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/payment/{id}', [TransaksiController::class, 'payment']);
Route::get('/detail/{id}', [DetailController::class, 'detail']);
Route::post('/keranjang', [CartController::class, 'store']);
Route::post('/checkout', [TransaksiController::class, 'store']);
Route::get('/cart/{id}', [CartController::class, 'index']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);



// Auth::routes();

Auth::routes();
route::auth();

// Route::get('/', [HomeController::class, 'index'])->name('coba');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



route::group(['middleware' => ['login_check:admin']], function () {

    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard.index');
    })->name('dashboard');
});
route::group(['middleware' => ['login_check:user']], function () {
});
Route::get('/', [HomeController::class, 'index'])->name('coba');
// Route::middleware(['admin'])->group(function () {

// });
