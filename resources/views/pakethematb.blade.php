<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Paket Hemat A</title>
    <link rel="stylesheet" href="{{ asset('css/paketfranchise.css') }}">
    <script src="https://kit.fontawesome.com/4a1b340fe5.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <div class="container">
            <h3>Gerobak Listrik</h3>
            <nav>
                <a href="/beranda">Home</a>
                <a href="/sejarah">Sejarah</a>
                <a href="/paketfranchise">Produk</a>
                <a href="/artikel">Artikel</a>
                <a href="/hubungi">Hubungi Kami</a>
            </nav>
            <div class="icons">
                <a href="/login-user">
                    <i class="fa-solid fa-user"></i></i>
                </a>
                <a href="/checkout">
                <i class="fa-solid fa-cart-shopping"></i></i>
                </a>

            </div>
        </div>
    </header>

    <main class="content">
        <section class="package">
            <div class="container">
                <div class="package-content">
                    <img src="{{ asset('img/paket b.jpg') }}" alt="Gerobak Listrik" class="package-image">
                    <div class="package-details">
                        <h2>Paket Hemat B</h2>
                        <p>Paket ini menjadi salah satu paket andalan pada produk terbaru. Sudah meliputi :</p>
                        <ul>
                            <li>Gerobak Listrik</li>
                            <li>Bahan Baku</li>
                            <li>Modal Pendaftaran</li>
                        </ul>
                        <p class="price">Rp. 23.670.000,-</p>
                        <a href="/formpendaftaran" class="buy-button">Beli Paket!</a>
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
</body>
</html>
