<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Hubungi Kami</title>
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('js/visi.js') }}">

</head>
<body>
<header>
        <div class="container">
            <h3>Gerobak Listrik</h3>
            <nav>
                <a href="/">Home</a>
                <a href="/sejarah">Sejarah</a>
                <a href="/produk">Produk</a>
                <a href="/artikel">Artikel</a>
                <a href="/hubungi">Hubungi Kami</a>
            </nav>
            <div class="icons">
                <a href="/login">
                    <i class="fa-solid fa-user"></i></i>
                </a>
                <a href="/login">
                <i class="fa-solid fa-cart-shopping"></i></i>
                </a>

            </div>
        </div>
    </header>

    <section class="kemitraan">
    <div class="content-left">
        <h2>Visi Perusahaan</h2>
        <p>
            Our vision is to become a leading company in the industry by providing top-quality services
            and products to our customers, ensuring sustainable growth, and contributing to the community.
        </p>
    </div>

    <div class="content-right">
        <div id="carouselVisi" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselVisi" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselVisi" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselVisi" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" data-url="">
                    <img src="{{ asset('img/visi.jpg') }}" class="d-block w-100" alt="Visi Image 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/misi.jpg') }}" class="d-block w-100" alt="Visi Image 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/sejarah.jpg') }}" class="d-block w-100" alt="Visi Image 3">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselVisi" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselVisi" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Bootstrap Carousel JS (if not already included in the project) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Optionally, you can add additional JavaScript if you want to control the Visi carousel
    var carouselVisi = document.getElementById('carouselVisi');
    var visiCarousel = new bootstrap.Carousel(carouselVisi, {
        interval: 2000,  // Time in milliseconds between automatic transitions
        wrap: true       // Enables looping through slides
    });
</script>

</body>
</html>
