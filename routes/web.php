<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalonMitraController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\MapsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();

Route::get('/', function() {
    return redirect()->to('gerobaklistrik/dashboard');
});

// ==================== CALON MITRA ====================
Route::post('/gerobaklistrik/mitra', [CalonMitraController::class, 'post'])->name('post.mitra');
Route::get('/gerobaklistrik/calon-mitra', [CalonMitraController::class, 'index'])->name('calon-mitra.index');
Route::post('/gerobaklistrik/calon-mitra/{id}/process', [CalonMitraController::class, 'prosesMitra'])->name('calon-mitra.proses');

// ==================== CEK LOKASI CALON MITRA ====================
Route::post('/cek-lokasi', [CalonMitraController::class, 'cekLokasi'])->name('cek-lokasi');

// ==================== MITRA ====================
Route::get('/gerobaklistrik/mitra', [MitraController::class, 'indexMitra'])->name('mitra.index');
Route::post('/gerobaklistrik/mitra/{id}/update', [MitraController::class, 'updateCalonMitra'])->name('mitra.update');
Route::delete('/gerobaklistrik/mitra/{id}/delete', [MitraController::class, 'deleteCalonMitra'])->name('mitra.delete');

/// ==================== PETA ====================
Route::get('/gerobaklistrik/peta-sebaran', [MapsController::class, 'index'])->name('peta-mitra');

// ==================== PRODUK ====================
Route::get('/ecommerce/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/ecommerce/products/create', [ProductController::class, 'create'])->name('ecommerce.products.create');
Route::post('/ecommerce/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/ecommerce/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/ecommerce/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/ecommerce/products/upload-image', [ProductController::class, 'uploadImage'])->name('upload.product.image');

// ==================== CHECKOUT ====================
Route::post('/ecommerce/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// ==================== PEMBAYARAN ====================
Route::get('/ecommerce/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
Route::post('/admin/payments/{id}/approve', [AdminPaymentController::class, 'approve'])->name('admin.payments.approve');
Route::post('/admin/payments/{id}/reject', [AdminPaymentController::class, 'reject'])->name('admin.payments.reject');

// ==================== PESANAN ====================
Route::get('/ecommerce/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/ecommerce/orders', [OrderController::class, 'createFromPayments'])->name('orders.createFromPayments');
Route::get('/ecommerce/orders/{id}', [OrderController::class, 'showDetail'])->name('order.detail');
Route::patch('/ecommerce/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

// ==================== INVOICE ====================
Route::get('/ecommerce/orders/{id}/invoice', [OrderController::class, 'showInvoice'])->name('order.invoice');

// ==================== DASHBOARD ====================
Route::get('/gerobaklistrik/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('{any}', [DashboardController::class, 'root'])->where('any', '.*');

// Halaman statis
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
    return view('gerobaklistrik-formpendaftaran');
});

Route::get('/hasiljadi', function () {
    $product = Product::all();
    return view('hasiljadi', compact('product'));
});

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');