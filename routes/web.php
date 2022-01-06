<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Produk\KategoriController;
use App\Http\Controllers\Produk\ProdukController;
use App\Http\Controllers\Belanja\BelanjaController;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Home')->group( function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::namespace('Auth')->group( function () {
    Route::get('/login', [LoginController::class, 'view'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::prefix('panel')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin/dashboard');
        })->name('dashboard');
        Route::get('/banner', [BannerController::class, 'edit'])->name('edit.banner');
        Route::put('/banner/{id}', [BannerController::class, 'update'])->name('update.banner');
        Route::get('/api/kategori', [KategoriController::class, 'data'])->name('data.kategori');
        Route::get('/api/produk', [ProdukController::class, 'data'])->name('data.produk');
        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori');
        Route::get('/kategori/buat', [KategoriController::class, 'create'])->name('buat.kategori');
        Route::get('/kategori/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('edit.kategori');
        Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('delete.kategori');
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk');
        Route::get('/produk/buat', [ProdukController::class, 'create'])->name('buat.produk');
        Route::get('/produk/{produk}', [ProdukController::class, 'edit'])->name('kategori.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('edit.produk');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('delete.produk');
        Route::redirect('/', '/panel/dashboard', 301);
    });
});
