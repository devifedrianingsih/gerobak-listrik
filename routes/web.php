<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalonMitraController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Route untuk halaman Peta Sebaran
Route::get('/map-google-maps', [CalonMitraController::class, 'petaMitra'])->name('peta-mitra');

// Route untuk halaman produk dengan nama rute
Route::get('/ecommerce-products', [ProductController::class, 'index'])->name('product.index');

// Route untuk menampilkan halaman tambah produk (GET)
Route::get('/ecommerce-add-product', [ProductController::class, 'create'])->name('product.create');

// Route untuk menyimpan produk baru (POST)
Route::post('/ecommerce-add-product', [ProductController::class, 'store'])->name('product.store');
Route::get('/ecommerce-products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/ecommerce-products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// Route untuk pengunggahan gambar (POST)
Route::post('/upload-product-image', [ProductController::class, 'uploadImage'])->name('upload.product.image');

//Route untuk form pendaftaran
Route::post('/post-mitra', [CalonMitraController::class, 'post'])->name('post.mitra');

Route::get('/ecommerce-potential-partners', [CalonMitraController::class, 'index'])->name('calon-mitra.index');
Route::post('/calon-mitra.index/{id}/terima', [CalonMitraController::class, 'terimaMitra'])->name('calon-mitra.terima');
Route::post('/calon-mitra.index/{id}/tolak', [CalonMitraController::class, 'tolakMitra'])->name('calon-mitra.tolak');

//Mengambil data dari tabel calon mitra untuk page mitra
Route::get('/ecommerce-potential-partners/{id}', [MitraController::class, 'getCalonMitraData']);
Route::post('/ecommerce-potential-partners/update/{id}', [MitraController::class, 'updateCalonMitra']);

Route::get('/ecommerce-customers', [MitraController::class, 'indexMitra'])->name('mitra.index');


// Route untuk halaman checkout
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

//Route untuk halaman konfirmasi pembayaran
Route::get('ecommerce-payment', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
Route::post('/admin/payments/{id}/approve', [AdminPaymentController::class, 'approve'])->name('admin.payments.approve');
Route::post('/admin/payments/{id}/reject', [AdminPaymentController::class, 'reject'])->name('admin.payments.reject');

//Route untuk halaman order
Route::get('/ecommerce-orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/create-from-payments', [OrderController::class, 'createFromPayments'])->name('orders.createFromPayments');
Route::patch('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/order-detail/{id}', [OrderController::class, 'showDetail'])->name('order.detail');

//Route untuk invoice
Route::get('/order-invoice/{id}', [OrderController::class, 'showInvoice'])->name('order.invoice');


// Route untuk dashboard (dengan middleware auth)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

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
    return view('formpendaftaran');
});
Route::get('/hasiljadi', function () {
    $product = Product::all();

    return view('hasiljadi', compact('product'));
});
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

// Rute fallback untuk menangkap semua route yang tidak didefinisikan (Opsional)
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');
