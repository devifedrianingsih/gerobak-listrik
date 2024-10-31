<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body>
    <header>
    <div class="container">
    <h3>Gerobak Listrik</h3>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/sejarah">Sejarah</a></li>
            <li class="dropdown">
                <a href="/shoppingcart">Produk</a>
                <ul class="dropdown-content">
                    <li><a href="/cart">Produk Franchise</a></li>
                    <li><a href="#">Produk Jadi</a></li>
                </ul>
            </li>
            <li><a href="/artikel">Artikel</a></li>
            <li><a href="/hubungi">Hubungi Kami</a></li>
        </ul>
    </nav>
    <div class="icons">
        <a href="/login">
            <i class="fa-solid fa-user"></i>
        </a>   
        <a href="/checkout">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>       
    </div>
</div>

    </header>
    <div class="title">
    Pilihlah Produk PilihanMu!
    <p>Pilihlah Produk PilihanMu!</p>

<section class="products">
    <div class="product" data-name="Product 1" data-price="100">
        <img src="{{ asset('img/paket a.jpg') }}" alt="Product 1">
        <h2>Paket Super A</h2>
        <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
        <h4>Price:Rp.19.000.000,-</h4>
        <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
    </div>

    <div class="product" data-name="Product 2" data-price="150">
        <img src="{{ asset('img/paket b.jpg') }}" alt="Product 2">
        <h2>Paket Super B</h2>
        <p>Paket Bundling Super B termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
        <h4>Price:Rp.14.000.000,-</h4>
        <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
    </div>

    <div class="product" data-name="Product 3" data-price="200">
        <img src="{{ asset('img/paket c.jpg') }}" alt="Product 3">
        <h2>Paket Super C</h2>
        <p>Paket Bundling Super C termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
        <h4>Price:Rp.9.000.000,-</h4>
        <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
    </div>

    <div class="product" data-name="Product 4" data-price="100">
        <img src="{{ asset('img/paket a.jpg') }}" alt="Product 4">
        <h2>Paket Hemat A</h2>
        <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
        <h4>Price:Rp.17.000.000,-</h4>
        <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
    </div>

    <div class="product" data-name="Product 5" data-price="150">
        <img src="{{ asset('img/paket b.jpg') }}" alt="Product 5">
        <h2>Paket Hemat B</h2>
        <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
        <h4>Price:Rp.12.000.000,-</h4>
        <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
    </div>

    <div class="product" data-name="Product 6" data-price="200">
        <img src="{{ asset('img/paket c.jpg') }}" alt="Product 6">
        <h2>Paket Hemat C</h2>
        <p>Paket Bundling Super C termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
        <h4>Price:Rp.8.000.000,-</h4>
        <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
    </div>
</section>

<section class="cart">
    <h2>Shopping Cart</h2>
    <ul class="cart-items">
        <!-- Items will be dynamically added here -->
    </ul>
    <div class="cart-summary">
        <p>Total: $<span class="cart-total">0</span></p>
        <button class="checkout-btn">Checkout</button>
    </div>
</section>


    <script src="cart.js"></script>
</body>
</html>
