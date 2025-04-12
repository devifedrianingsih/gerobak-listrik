<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Hubungi Kami</title>
    <link rel="stylesheet" href="{{ asset('css/hubungikami.css') }}">
    <script src="https://kit.fontawesome.com/4a1b340fe5.js" crossorigin="anonymous"></script>

</head>
<body>
<!-- Navbar -->
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
        <div class="contact-container">
        <h2>Hubungi Kami</h2>
        <form id="contact-form">
            <label for="name">Nama Anda</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

            <label for="message">Pesan</label>
            <textarea id="message" name="message" placeholder="Tuliskan pesan Anda" rows="4" required></textarea>

            <button type="submit">Kirim!</button>
        </form>
  <div class="form-message" id="form-message"></div>
</div>
<script src="{{asset('js/hubungikami.js') }}"></script>
</body>
</html>
