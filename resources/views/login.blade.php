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
            <form action="" method="">
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="save-me-group">
                <div class="save-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Ingatkan akun saya!</label>
                </div>
                <div class="pw">
                    <a href="" class="forgot-password">Lupa Kata Sandi?</a>
                </div>
                </div>
                <a href="/" button type="submit"> <div class="login-button">  LOGIN  </div> </a> 
                <div class="text-bottom">
                   <a href="/register" class="preregister">Sudah punya akun?</a>
                </div>
            </form>
        </div>
        <div class="login-right">
            <img src="{{ asset('img/login1.jpg') }}" alt="Gerobak Listrik">
        </div>
        
    </div>
</body>
</html>