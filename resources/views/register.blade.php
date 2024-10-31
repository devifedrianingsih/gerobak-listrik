<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <h1  class="welcome-text">Selamat Datang di <span>Gerobak Listrik</span></h1>
            <p>Selamat Datang di Website Gerobak Listrik !</p>
            <form action="/kemitraan" method="post">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="save-me-group">
                </div>
                <button type="submit" class="login-button"> <a href="/login"></a>REGISTER</button>
            </form>

        </div>
        <div class="login-right">
            <img src="{{ asset('img/login1.jpg') }}" alt="Gerobak Listrik">
        </div>
        
    </div>
</body>
</html>