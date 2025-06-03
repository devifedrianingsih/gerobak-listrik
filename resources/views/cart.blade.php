    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
        <title>Bahan Baku</title>
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
            <div class="product" data-name="Paket Bundling Nasi dan Pelengkap" data-price="5.000.000">
                <img src="{{ asset('img/nasi.png') }}" alt="Product 1">
                <h2>Paket Bundling Nasi dan Pelengkap</h2>
                <p>Paket bundling nasi dan pelengkap berisi nasi kucing frozen, orek tempe, dan sambal khas, siap saji untuk cita rasa angkringan rumahan.</p>
                <h5>Isi 100 pax</h5>
                <h4>Price:Rp.5.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Bundling Camilan Beku Goreng" data-price="7.000.000">
                <img src="{{ asset('img/camilan.png') }}" alt="Product 2">
                <h2>Paket Bundling Camilan Beku Goreng</h2>
                <p>Paket Bundling camilan beku siap goreng seperti tempe mendoan, tahu isi, dan cireng, cocok untuk sajian praktis dan renyah setiap saat</p>
                <h5>Isi 100 pax</h5>                
                <h4>Price:Rp.7.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Paket Bundling Sate dan Lauk Pauk" data-price="10.000.000">
                <img src="{{ asset('img/sate.png') }}" alt="Product 3">
                <h2>Paket Bundling Sate dan Lauk Pauk</h2>
                <p>Paket Bundling hidangan tusuk siap goreng dengan cita rasa khas Jawa, praktis untuk lauk atau camilan.</p>
                <h5>Isi 100 pax</h5>
                <h4>Price:Rp.10.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Telur Puyuh" data-price="4.000.000">
                <img src="{{ asset('img/telurpuyuh.png') }}" alt="Product 4">
                <h2>Telur Puyuh</h2>
                <p>Telur segar siap olah, pas untuk sate bacem. Kulit bersih dan dikirim dalam kondisi terbaik.</p>
                <h5>Isi 200 pax</h5>
                <h4>Price:Rp.4.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Ikan Teri" data-price="3.000.000">
                <img src="{{ asset('img/ikanteri.png') }}" alt="Product 5">
                <h2>Ikan Teri</h2>
                <p>Teri gurih dan renyah, cocok untuk sambal atau tumisan nasi kucing. Dikemas higienis, tahan lama. </p>
                <h5>Isi 200 pax</h5>
                <h4>Price:Rp.3.000.000,-</h4>
                <button class="add-to-cart">+ Tambahkan pada Keranjang</button>
            </div>

            <div class="product" data-name="Bandeng Presto Mini" data-price="10.000.000">
                <img src="{{ asset('img/bandengpresto.png') }}" alt="Product 6">
                <h2>Bandeng Presto Mini</h2>
                <p>Bandeng presto lunak dan gurih, tinggal goreng atau panaskan. Praktis untuk lauk nasi kucing.</p>
                <h5>Isi 200 pax</h5>
                <h4>Price:Rp.10.000.000,-</h4>
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
