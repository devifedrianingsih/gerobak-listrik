<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
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

    <section class="home">
        <div class="container-home">
            <div class="text">
                <p>Apa itu gerobak listrik? Gerobak listrik adalah<br> suatu perusahaan franchise yang menawarkan<br> produk usaha berupa gerobak listrik dan<br> produk hasil jadi serta bahan baku<br> yang tersedia dalam tiap paket berbeda.</p>
                <a href="/paketfranchise" class="join-mitra">Beli Paket Franchise</a>
                <a href="/hasiljadi" class="join-mitra">Beli Produk Jadi</a>
            </div>
            <div class="container-image">
                <img src="{{ asset('img/gerobak.png') }}" alt="Gerobak Listrik">
            </div>
        </div>

        <div class="menu">
            <div class="title-menu">
                <h1>Menu Produk Jadi</h1>
            </div>
            <div class="container-menu">
                <div class="menu1">
                    <img src="{{ asset('img/ekado.jpg') }}" alt="Ekado Puyuh">
                    <h3>Ekado Crispy</h3>
                    <p>Olahan telur puyuh yang dibalut daging cincang dan kulit lumpia</p>
                </div>
                <div class="menu2">
                    <img src="{{ asset('img/pangsit.jpg') }}" alt="Pangsit Telur Puyuh">
                    <h3>Ekado Crispy</h3>
                    <p>Olahan telur puyuh yang dibalut daging cincang dan kulit lumpia</p>
                </div>
                <div class="menu3">
                    <img src="{{ asset('img/sate.jpg') }}" alt="Sate Telur Puyuh">
                    <h3>Ekado Crispy</h3>
                    <p>Olahan telur puyuh yang dibalut daging cincang dan kulit lumpia</p>
                </div>
                <div class="menu4">
                    <img src="{{ asset('img/telur.jpg') }}" alt="Telur Puyuh">
                    <h3>Ekado Crispy</h3>
                    <p>Olahan telur puyuh yang dibalut daging cincang dan kulit lumpia</p>
                </div>
            </div>
        </div>

        <div class="polaroid-paket">
            <div class="judul">
                <h2>Paket Franchise</h2>
                <p>Paket ini meliputi Gerobak Listrik, Bahan Baku, dan Modal Pendaftaran.</p>
            </div>

            <div class="polaroid">
                <a href="/pakethemata">
                    <img src="{{ asset('img/paket b.jpg') }}" alt="Paket A" style="width:100%" class="img-pol">
                </a>
                <div class="container">
                    <h4>Paket A</h4>
                    <p>Gerobak Listrik, Bahan Baku, dan Modal Pendaftaran.</p>
                    <p>Rp. 23.670.000,-</p>
                </div>
            </div>

            <div class="polaroid">
                <a href="/pakethematb">
                    <img src="{{ asset('img/paket c.jpg') }}" alt="Paket B" style="width:100%" class="img-pol">
                </a>
                <div class="container">
                    <h4>Paket B</h4>
                    <p>Gerobak Listrik, Bahan Baku, dan Modal Pendaftaran.</p>
                    <p>Rp. 23.670.000,-</p>
                </div>
            </div>

            <div class="polaroid">
                <a href="/pakethematc">
                    <img src="{{ asset('img/paket a.jpg') }}" alt="Paket C" style="width:100%" class="img-pol">
                </a>
                <div class="container">
                    <h4>Paket C</h4>
                    <p>Gerobak Listrik, Bahan Baku, dan Modal Pendaftaran.</p>
                    <p>Rp. 23.670.000,-</p>
                </div>
            </div>
        </div>

        <div class="berita-terkini">
            <div class="container-berita">
                <div class="berita-img">
                    <img src="{{ asset('img/berita.jpg') }}" alt="Berita Terkini">
                </div>
                <div>
                    <div class="title-berita">
                        <h1>Sejarah Perusahaan</h1>
                    </div>
                    <div class="text-berita">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        <div class="berita-more">Baca Selengkapnya...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="faq">
            <div class="text">
                <h2> F A Q</h2>
                <p>(Frequently Asked Questions)</p>
            </div>
            <div class="box">
                <ul class="accordion">
                    <li>
                        <input type="radio" name="accordion" id="first" checked>
                        <label for="first">Produk apa yang banyak peminatnya? </label>
                        <div class="content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </div>
                    </li>
                    <li>
                        <input type="radio" name="accordion" id="second">
                        <label for="second">Bagaimana membeli paket franchise?</label>
                        <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </div>
                    </li>
                    <li>
                        <input type="radio" name="accordion" id="third">
                        <label for="third">Apakah produk jadi dapat dikirim langsung?</label>
                        <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </div>
                    </li>
                    <li>
                        <input type="radio" name="accordion" id="fourth">
                        <label for="fourth">Bagaimana cara memperoleh diskon dari paket franchise?</label>
                        <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </div>
                    </li>
                </ul>
            </div> -->
            <div class="faq">
    <div class="text">
        <h2> F A Q</h2>
        <p>(Frequently Asked Questions)</p>
    </div>
    <div class="box">
        <ul class="accordion">
            <li>
                <button class="accordion-toggle">Produk apa yang banyak peminatnya?</button>
                <div class="content">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
            </li>
            <li>
                <button class="accordion-toggle">Bagaimana membeli paket franchise?</button>
                <div class="content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
            </li>
            <li>
                <button class="accordion-toggle">Apakah produk jadi dapat dikirim langsung?</button>
                <div class="content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
            </li>
            <li>
                <button class="accordion-toggle">Bagaimana cara memperoleh diskon dari paket franchise?</button>
                <div class="content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
            </li>
        </ul>
    </div>
</div>

        </div>
    </section>
    <script>
   document.querySelectorAll('.accordion-toggle').forEach((button) => {
    button.addEventListener('click', () => {
        button.classList.toggle('active'); // Toggle kelas active untuk ikon
        const content = button.nextElementSibling;
        content.classList.toggle('open');

        if (content.classList.contains('open')) {
            content.style.maxHeight = content.scrollHeight + 'px';
        } else {
            content.style.maxHeight = '0';
        }
    });
});



    </script>

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
                    <img src="img/map.png" alt="Map">
                </div>
                <div>
                    <h3>Media Sosial</h3>
                    <a href="https://wa.me/088926312910"><img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp"></a>
                    <a href="https://www.instagram.com"><img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="Instagram"></a>
                    <a href="mailto:example@gmail.com"><img src="https://img.icons8.com/color/48/000000/gmail.png" alt="Gmail"></a>
                    <a href="https://www.facebook.com"><img src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="Facebook"></a>
                </div>
            </div>
</footer> -->
</body>
</html>
