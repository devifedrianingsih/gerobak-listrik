<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Sejarah Kami</title>
    <link rel="stylesheet" href="{{ asset('css/sejarah.css') }}">
</head>
<body>

<!-- Navbar -->
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
<!-- Sejarah Section -->
<section id="about">
    <div class="about-1">
        <!-- Gambar ditambahkan di sini -->
        <img src="{{ asset('img/sejarah.jpg') }}" alt="Sejarah" class="img-sjrh">
        <h2>Sejarah Kami</h2>
        <p>Sejarah Gerobak Listrik dimulai pada tahun 2020 ketika sekelompok insinyur dan pengusaha melihat peluang dalam kendaraan listrik ringan yang ramah lingkungan dan efisien. Dalam beberapa tahun, Gerobak Listrik berkembang menjadi salah satu pelopor di industri kendaraan listrik lokal.</p>
    </div>

    <div id="about-2">
        <div class="content-box-lg">
            <div class="container">
                <div class="kotak">
                    <!-- MISSION -->
                    <div class="col-md-4">
                        <div class="about-item text-center mission">
                            <i class="fa fa-pencil"></i>
                            <h3>Misi</h3>
                            <hr>
                            <p>Kami berkomitmen untuk menyediakan kendaraan listrik yang hemat energi dan ramah lingkungan.</p>
                        </div>
                    </div>

                    <!-- VISION -->
                    <div class="col-md-4">
                        <div class="about-item text-center vision">
                            <i class="fa fa-globe"></i>
                            <h3>Visi</h3>
                            <hr>
                            <p>Menjadi pelopor dalam pengembangan teknologi kendaraan listrik di Indonesia.</p>
                        </div>
                    </div>

                    <!-- SEJARAH -->
                    <div class="col-md-4">
                        <div class="about-item text-center achievements">
                            <i class="fa fa-book"></i>
                            <h3>Sejarah</h3>
                            <hr>
                            <p>Sejak didirikan pada tahun 2020, kami terus berinovasi untuk menghadirkan solusi transportasi yang berkelanjutan dan modern.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<!-- <footer>
    <div class="container">
        <h3>Gerobak Listrik</h3>
        <div class="footer-info">
            <div>
                <p>&copy; 2024 Gerobak Listrik. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer> -->

</body>
</html>
