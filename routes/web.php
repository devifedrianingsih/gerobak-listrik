<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DashboardController; // Import DashboardControllergit 
use Illuminate\Support\Facades\Route;

Auth::routes();

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman customer dengan nama rute
Route::get('/ecommerce-customers', [CustomerController::class, 'index'])->name('customers.index');

// Route untuk halaman produk dengan nama rute
Route::get('/ecommerce-products', [ProductController::class, 'index'])->name('product.index');

// Route untuk menampilkan halaman tambah produk (GET)
Route::get('/ecommerce-add-product', [ProductController::class, 'create'])->name('product.create');

// Route untuk menyimpan produk baru (POST)
Route::post('/ecommerce-add-product', [ProductController::class, 'store'])->name('product.store');

// Route untuk pengunggahan gambar (POST)
Route::post('/upload-product-image', [ProductController::class, 'uploadImage'])->name('upload.product.image');


// Route untuk dashboard (dengan middleware auth)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Rute fallback untuk menangkap semua route yang tidak didefinisikan (Opsional)
// Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');


Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/produk', function () {
    return view('produk');
});
Route::get('/hubungi', function () {
    return view('hubungikami');
});
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/login-user', function () {
    return view('login');
});
Route::get('/register-user', function () {
    return view('register');
});
Route::get('/paketfranchise', function () {
    return view('paketfranchise');
});
Route::get('/produk1', function () {
    return view('produk1');
});
Route::get('/visi', function () {
    return view('visi');
});
Route::get('/misi', function () {
    return view('misi');
});
Route::get('/sejarah', function () {
    return view('sejarah');
});
Route::get('/artikel', function () {
    return view('artikel');
});
Route::get('/pakethemata', function () {
    return view('pakethemata');
});
Route::get('/pakethematb', function () {
    return view('pakethematb');
});
Route::get('/pakethematc', function () {
    return view('pakethematc');
});
Route::get('/gabung', function () {
    return view('gabung');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/shoppingcart', function () {
    return view('shoppingcart');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/isiartikel1', function () {
    return view('isiartikel1');
});
Route::get('/isiartikel2', function () {
    return view('isiartikel2');
});
Route::get('/isiartikel3', function () {
    return view('isiartikel3');
});
Route::get('/formpendaftaran', function () {
    return view('formpendaftaran');
});
Route::get('/hasiljadi', function () {
    return view('hasiljadi');
});


// Rute calonMitra, terimaMitra dan tolakMitra
Route::get('/ecommerce-potential-partners', [MitraController::class, 'index'])->name('calon-mitra.index');
Route::post('/ecommerce-potential-partners/{id}/terima', [MitraController::class, 'terima'])->name('calon-mitra.terima');
Route::post('/ecommerce-potential-partners/{id}/tolak', [MitraController::class, 'tolak'])->name('calon-mitra.tolak');
