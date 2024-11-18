<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalonMitraController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman produk dengan nama rute
Route::get('/ecommerce-products', [ProductController::class, 'index'])->name('product.index');

// Route untuk menampilkan halaman tambah produk (GET)
Route::get('/ecommerce-add-product', [ProductController::class, 'create'])->name('product.create');

// Route untuk menyimpan produk baru (POST)
Route::post('/ecommerce-add-product', [ProductController::class, 'store'])->name('product.store');

// Route untuk pengunggahan gambar (POST)
Route::post('/upload-product-image', [ProductController::class, 'uploadImage'])->name('upload.product.image');

Route::post('/post-mitra', [CalonMitraController::class, 'post'])->name('post.mitra');

Route::get('/ecommerce-potential-partners', [CalonMitraController::class, 'index'])->name('calon-mitra.index');
Route::post('/calon-mitra.index/{nomor}/terima', [CalonMitraController::class, 'terimaMitra'])->name('calon-mitra.terima');
Route::post('/calon-mitra.index/{nomor}/tolak', [CalonMitraController::class, 'tolakMitra'])->name('calon-mitra.tolak');

Route::get('/ecommerce-customers', [MitraController::class, 'indexMitra'])->name('mitra.index');

// Route untuk dashboard (dengan middleware auth)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Halaman statis
Route::view('/beranda', 'beranda');
Route::view('/produk', 'produk');
Route::view('/hubungi', 'hubungikami');
Route::view('/profil', 'profil');
Route::view('/checkout', 'checkout');
Route::view('/login-user', 'login');
Route::view('/register-user', 'register');
Route::view('/paketfranchise', 'paketfranchise');
Route::view('/produk1', 'produk1');
Route::view('/visi', 'visi');
Route::view('/misi', 'misi');
Route::view('/sejarah', 'sejarah');
Route::view('/artikel', 'artikel');
Route::view('/pakethemata', 'pakethemata');
Route::view('/pakethematb', 'pakethematb');
Route::view('/pakethematc', 'pakethematc');
Route::view('/gabung', 'gabung');
Route::view('/faq', 'faq');
Route::view('/shoppingcart', 'shoppingcart');
Route::view('/cart', 'cart');
Route::view('/isiartikel1', 'isiartikel1');
Route::view('/isiartikel2', 'isiartikel2');
Route::view('/isiartikel3', 'isiartikel3');
Route::view('/formpendaftaran', 'formpendaftaran');
Route::view('/hasiljadi', 'hasiljadi');

// Rute fallback untuk menangkap semua route yang tidak didefinisikan (Opsional)
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');