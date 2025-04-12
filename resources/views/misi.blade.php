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
    <link rel="stylesheet" href="{{ asset('js/sejarah.js') }}">
    <script src="https://kit.fontawesome.com/4a1b340fe5.js" crossorigin="anonymous"></script>

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
                <a href="/checkout">
                <i class="fa-solid fa-cart-shopping"></i></i>
                </a>

            </div>
        </div>
    </header>

    <section class="kemitraan">
    <div class="content-left">
        <h2>Sejarah Perusahaan</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </p>
    </div>

    <div class="content-right">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" data-url="/sejarah">
                    <img src="{{ asset('img/sejarah.jpg') }}" class="d-block w-100" alt="Sejarah Image">
                </div>
                <div class="carousel-item" data-url="/visi">
                    <img src="{{ asset('img/visi.jpg') }}" class="d-block w-100" alt="Visi Image">

                </div>
                <div class="carousel-item" data-url="/misi">
                    <img src="{{ asset('img/misi.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<script>
    // Event listener for when the carousel changes
    var carouselElement = document.getElementById('carouselExampleIndicators');
    carouselElement.addEventListener('slid.bs.carousel', function(event) {
        // Get the active carousel item
        var activeItem = document.querySelector('.carousel-item.active');

        // Get the URL from the data attribute of the active item
        var targetUrl = activeItem.getAttribute('data-url');

        // Redirect to the target URL
        if (targetUrl) {
            window.location.href = targetUrl;
        }
    });
</script>

</body>
</html>
