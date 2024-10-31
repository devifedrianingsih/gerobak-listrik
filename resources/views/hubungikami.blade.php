<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami</title>
    <link rel="stylesheet" href="{{ asset('css/hubungikami.css') }}">
    <script src="https://kit.fontawesome.com/4a1b340fe5.js" crossorigin="anonymous"></script>
    
</head>
<body>
<header>
        <div class="container">
            <h3>Gerobak Listrik</h3>
            <nav>
                <a href="/">Home</a>
                <a href="/sejarah">Sejarah</a>
                <a href="/paketfranchise">Produk</a>
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
        <div class="contact-container">
        <h2>Hubungi Kami</h2>
        <form id="contact-form">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write your message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>
  <div class="form-message" id="form-message"></div>
</div>
<script src="{{asset('js/hubungikami.js') }}"></script>  
</body>
</html>