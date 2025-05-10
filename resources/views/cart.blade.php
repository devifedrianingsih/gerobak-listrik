    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    </head>
    <body>
    <header>
            <div class="container">
                <div class="logo">
                    <a href="/beranda">Gerobak Listrik</a>
                </div>
                <nav>
                    <a href="/beranda">Beranda</a>
                    <a href="/sejarah">Sejarah</a>
                    <a href="/paketfranchise">Produk</a>
                    <a href="/kemitraan">Kemitraan</a>
                    <a href="/artikel">Artikel</a>
                    <a href="/hubungikami">Hubungi Kami</a>
                </nav>
            </div>
        </header>
        <div class="title">
            Pilihlah Produk PilihanMu!
            <p>Paket Bahan Baku</p>
        </div>
        
        <div class="products-cart-container">
            <div class="dropdown-wrapper">
                <button id="button" class="dropdown-toggle">Pilih Paket!</button>
                <ul id="dropdown-menu" class="dropdown-content">
                    <li><a href="/paketfranchise">Paket Franchise</a></li>
                    <li><a href="/cart">Paket Hasil Jadi</a></li>
                </ul>
            </div>

        <div class="products-cart-container">
        <section class="products">
            <div class="product" data-name="Paket Super A" data-price="19.000.000">
                <img src="{{ asset('img/paket a.jpg') }}" alt="Product 1">
                <h2>Paket Super A</h2>
                <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
                <h4>Price:Rp.19.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Super B" data-price="14.000.000">
                <img src="{{ asset('img/paket b.jpg') }}" alt="Product 2">
                <h2>Paket Super B</h2>
                <p>Paket Bundling Super B termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
                <h4>Price:Rp.14.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Super C" data-price="9.000.000">
                <img src="{{ asset('img/paket c.jpg') }}" alt="Product 3">
                <h2>Paket Super C</h2>
                <p>Paket Bundling Super C termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
                <h4>Price:Rp.9.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Hemat A" data-price="17.000.000">
                <img src="{{ asset('img/paket a.jpg') }}" alt="Product 4">
                <h2>Paket Hemat A</h2>
                <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
                <h4>Price:Rp.17.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Hemat B" data-price="12.000.000">
                <img src="{{ asset('img/paket b.jpg') }}" alt="Product 5">
                <h2>Paket Hemat B</h2>
                <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
                <h4>Price:Rp.12.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Hemat C" data-price="8.000.000">
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
            <p>Total: <span class="cart-total">0</span></p>
            <button class="checkout-btn">Checkout</button>
        </div>
    </section>
        </div>

        <script src="js/cart.js"></script>
    </body>
    </html>
