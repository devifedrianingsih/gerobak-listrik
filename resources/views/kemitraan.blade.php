<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemitraan Gerobak Listrik Angkringan</title>
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kemitraan.css') }}">
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

<!-- HERO SECTION -->
<div class="hero-section">
    <div class="title">
        <h2>Gabung Kemitraan Gerobak Listrik Angkringan</h2>
        <p>Mulai bisnis makanan ringan modern & siap jual</p>
    </div>
    <div class="gerobak-wrapper">
        <img class="gerobak-img" src="{{ asset('build/images/favicon-32x32.png') }}" alt="Paket Kemitraan">
    </div>
</div>

<!-- SECTION KEMITRAAN (Infografis) -->
<div class="products-cart-container">
    <section class="section-kemitraan">
        <div class="card-putih">

            <!-- Judul dan Infografis -->
            <div class="paket-kemitraan-section">
                <h2>Paket Kemitraan Gerobak Listrik Angkringan</h2>
                <p>Dengan berbagai pilihan paket, Anda akan mendapatkan:</p>
                <div class="infografis-wrapper">
                    <img src="{{ asset('build/images/infografis-kemitraan.png') }}" 
                         alt="Infografis Paket Gerobak Listrik">
                </div>
            </div>

        </div>
    </section>
</div>

<!-- BAGIAN PRODUK + BACKGROUND KREM FULL -->
<div class="produk-krem-wrapper">
    <div class="produk-krem-inner">
        <h3 class="judul-produk">Informasi Harga Paket</h3>

        <section class="products-grid">
            @php
            $produkList = [
                ['name' => 'Super A', 'price' => 19000000, 'image' => 'paket a.jpg', 'desc' => 'Gerobak Listrik + Bahan baku (Semua Varian) + Produk Bahan Baku (1 Bulan)'],
                ['name' => 'Super B', 'price' => 14000000, 'image' => 'paket b.jpg', 'desc' => 'Gerobak Listrik + Bahan baku (Semua Varian) + Produk Bahan Baku (1 Bulan)'],
                ['name' => 'Super C', 'price' => 9000000,  'image' => 'paket c.jpg', 'desc' => 'Gerobak Listrik + Bahan baku (Semua Varian) + Produk Bahan Baku (1 Bulan)'],
                ['name' => 'Hemat A', 'price' => 17000000, 'image' => 'paket a.jpg', 'desc' => 'Gerobak Listrik + Bahan baku (Semua Varian)'],
                ['name' => 'Hemat B', 'price' => 12000000, 'image' => 'paket b.jpg', 'desc' => 'Gerobak Listrik + Bahan baku (Semua Varian)'],
                ['name' => 'Hemat C', 'price' => 8000000,  'image' => 'paket c.jpg', 'desc' => 'Gerobak Listrik + Bahan baku (Semua Varian)'],
            ];
            @endphp

            @foreach($produkList as $produk)
            <a href="/paketfranchise" class="product-link">
                <div class="product">
                    <img src="{{ asset('img/' . $produk['image']) }}" alt="Paket {{ $produk['name'] }}">
                    <h2>Paket {{ $produk['name'] }}</h2>
                    <p>Paket Bundling {{ $produk['name'] }} termasuk: {{ $produk['desc'] }}</p>
                    <h4>Price: Rp.{{ number_format($produk['price'], 0, ',', '.') }},-</h4>
                </div>
            </a>
            @endforeach
        </section> 
        <div class="cta-kemitraan">
            <a href="/gerobaklistrik-formpendaftaran" class="btn-gabung">Gabung Kemitraan</a>
        </div>
    </div>
</div>

</body>
</html>
