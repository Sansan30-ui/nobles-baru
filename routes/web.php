<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard.index');
})->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('coba');
// Route::get('/logout', function () {
//     return view('pages.index');
// })->name('home');

// Route::get('/produk', function () {
//     return view('pages.products.index');
// })->name('produk');

Route::get('/produk', [ProdukController::class, 'index']);




Route::get('/barang', function () {
    return view('pages.admin.barang.index');
})->name('barang');

Route::get('/tambah', function () {
    return view('pages.admin.barang.tambah');
})->name('tambah');

Route::resource('barang', BarangController::class);

Route::get('/register', [RegisterController::class]);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/detail/{id}', [DetailController::class, 'detail']);


// Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
