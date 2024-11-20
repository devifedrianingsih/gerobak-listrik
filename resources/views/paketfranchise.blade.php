<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <script src="https://kit.fontawesome.com/4a1b340fe5.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="/beranda">Gerobak Listrik</a>
        </div>
        <nav>
            <a href="/beranda">Home</a>
            <a href="/sejarah">Sejarah</a>
            <a href="/paketfranchise">Produk</a>
            <a href="/artikel">Artikel</a>
            <a href="/hubungi">Hubungi Kami</a>
        </nav>
    </div>
</header>

    </header>
    <section class="product-selection">
    <div class="container">
            <div class="container-product">
                <h2> Pilihlah Produk PilihanMu! </h2>
                <p>Pilihlah Produk PilihanMu!</p>
                <button id="button">Pilih Paket!</button>
                <ul id="dropdown-menu" class="dropdown">
                    <li><a href="/paketfranchise">Paket Franchise</a></li>
                    <li><a href="/cart">Paket Hasil Jadi</a></li>
                </ul>

                <div class="product-grid">
                <div class="product-card">
                <a href="/pakethemata">
                 <img src="{{ asset('img/paket a.jpg') }}" alt="Ekado Puyuh">
                </a>
                    <h2>Paket Super A</h2>
                    <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
                    <p class="price">Rp.19.000.000,-</p>
                </div>
                <div class="product-card">
                <a href="/pakethematb">
                    <img src="{{ asset('img/paket b.jpg') }}" alt="Pangsit Telur Puyuh">
                </a>
                    <h2>Paket Super B</h2>
                    <p>Paket Bundling Super B termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
                    <p class="price">Rp.14.000.000,-</p>
                </div>
                <div class="product-card">
                <a href="/pakethematc">
                   <img src="{{ asset('img/paket c.jpg') }}" alt="Sate Telur Puyuh">
                </a>
                    <h2>Paket Super C</h2>
                    <p>Paket Bundling Super C termasuk: Gerobak Listrik + Bahan baku (Semua Varian) + Produk Hasil Jadi (1 Bulan)</p>
                    <p class="price">Rp.9.000.000,-</p>
                </div>
                <div class="product-card">
                <img src="{{ asset('img/paket a.jpg') }}" alt="Telur Puyuh">
                    <h2>Paket Hemat A</h2>
                    <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
                    <p class="price">Rp.17.000.000,-</p>
                </div>
                <div class="product-card">
                <img src="{{ asset('img/paket b.jpg') }}" alt="Telur Puyuh Asin">
                    <h2>Paket Hemat B</h2>
                    <p>Paket Bundling Super A termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
                    <p class="price">Rp.12.000.000,-</p>
                </div>
                <div class="product-card">
                <img src="{{ asset('img/paket c.jpg') }}" alt="Telur Puyuh">
                    <h2>Paket Hemat C</h2>
                    <p>Paket Bundling Super C termasuk: Gerobak Listrik + Bahan baku (Semua Varian)</p>
                    <p class="price">Rp.8.000.000,-</p>
                </div>

            </div>
            </div>
       </section>
    </main>

    <!-- <footer>
        <div class="container">
            <div class="footer-info">
                <div>
                    <h3>Gerobak Listrik</h3>
                    <ul>
                        <li><a href="/profil">Profil Perusahaan</a></li>
                        <li><a href="/menu">Menu Kami</a></li>
                        <li><a href="/produk">Produk Kami</a></li>
                        <li><a href="/mitra">Bergabung Mitra</a></li>
                        <li><a href="/franchise">Franchise</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Map</h3>
                    <img src="{{ asset('img/maps.png') }}" alt="Gerobak Listrik">
                </div>
                <div>
                    <h3>Media Sosial</h3>
                    <a href="https://wa.me/088926312910"><img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp"></a>
                    <a href="https://www.instagram.com"><img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="Instagram"></a>
                    <a href="mailto:example@gmail.com"><img src="https://img.icons8.com/color/48/000000/gmail.png" alt="Gmail"></a>
                    <a href="https://www.facebook.com"><img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook"></a>
                </div>
            </div>
        </div>
    </footer> -->

    <script src="{{ asset('js/product.js') }}"></script>
</body>
</html>