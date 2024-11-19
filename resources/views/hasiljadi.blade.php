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
                <a href="/">Gerobak Listrik</a>
            </div>
            <nav>
                <a href="/">Home</a>
                <a href="/sejarah">Sejarah</a>
                <a href="/cart">Produk</a>
                <a href="/artikel">Artikel</a>
                <a href="/hubungi">Hubungi Kami</a>
            </nav>
        </div>
    </header>

    <section class="product-selection">
    <div class="container">
            <div class="container-product">
                <h2> Pilihlah Produk PilihanMu! </h2>
                <p>Pilihlah Produk PilihanMu!</p>
                <button id="button">Pilih Paket!</button>
                <ul id="dropdown-menu" class="dropdown">
                    <li><a href="/paketfranchise">Paket Franchise</a></li>
                    <li><a href="/produk">Paket Hasil Jadi</a></li>
                </ul>

                <div class="product-grid">
                <div class="product-card">
                        <a href="#">
                            <img src="{{ asset('img/ekado.jpg') }}" alt="Ekado Puyuh">   
                        </a> 
                            <h2>Ekado Crispy</h2>
                            <p>Ekadp crispy yang terbuat dari telur puyuh pilihan yang dibalut dengan tepung terbaik dan memiliki rasa gurih.</p>
                            <p class="price">Rp.17.000,-/pack</p>
                </div>
                <div class="product-card">
                        <a href="#">
                            <img src="{{ asset('img/pangsit.jpg') }}" alt="Pangsit Telur Puyuh">   
                        </a> 
                    <h2>Pangsit Telur Puyuh</h2>
                    <p>Pangsit telur puyuh adalah cemilan andalan yang dapat disajikan setiap waktu untuk kerbat, keluarga dan lainnya. Memiliki citra rasa unik dan gurih.</p>
                    <p class="price">Rp.25.000,-/pack</p>
                </div>
                <div class="product-card">
                        <a href="#">
                             <img src="{{ asset('img/sate.jpg') }}" alt="Sate Telur Puyuh">
                        </a> 
                    <h2>Sate Telur Puyuh</h2>
                    <p>Sate telur puyuh menjadi makanan yang dapat dikonsumsi semua kalangan. Rasa yang gurih dan manis sangat cocok menjadi teman makan.</p>
                    <p class="price">Rp.5.000,-/tusuk</p>
                </div>
                <div class="product-card">
                        <a href="#">
                            <img src="{{ asset('img/telur.jpg') }}" alt="Telur Puyuh">
                        </a>   
                    <h2>Tumis Telur Puyuh</h2>
                    <p>Tumis telur puyuh menjadi pasangan lauk yang cocok. Campuran telur, daun bawang dan petai membuat kombinasi enak dan nikmat.</p>
                    <p class="price">Rp.29.000,-/pack</p>
                </div>
                <div class="product-card">
                        <a href="#">
                            <img src="{{ asset('img/telur asin.jpg') }}" alt="Telur Puyuh Asin">
                        </a>  
                    <h2>Semur Asin Telur Puyuh</h2>
                    <p>kombinasi sempurna dari semur yang manis dengan penambahan bahan agar menjadi semur asin yang gurih dan telur puyuh yang lembut.</p>
                    <p class="price">Rp.20.000,-/200gr</p>
                </div>
                <div class="product-card">
                        <a href="#">
                            <img src="{{ asset('img/puyuh.jpg') }}" alt="Telur Puyuh">
                        </a>
                    <h2>Semur Telur Puyuh</h2>
                    <p>Semur manis dengan proses dan bahan yang sudah sesuai membuat kombinasi manis dan lembut dari telur menjadi penikmat tambahan lauk.</p>
                    <p class="price">Rp.28.000,-/200gr</p>
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

    <script src="{{asset('js/product.js') }}"></script>
</body>
</html>