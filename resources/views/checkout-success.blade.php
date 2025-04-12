<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Pembayaran Berhasil</title>
</head>
<body>
    <div class="success-container">
        <h1>Pembayaran Berhasil!</h1>
        <p>Terima kasih telah melakukan pembayaran. Kami akan segera memproses pesanan Anda.</p>
        <a href="{{ url('/beranda') }}">Kembali ke Beranda</a>
    </div>
</body>
</html>
