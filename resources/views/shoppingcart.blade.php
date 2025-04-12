<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>Checkout Produk</title>
    <link rel="stylesheet" href="{{ asset('css/shoppingcart.css') }}">
</head>
<body>

    <div class="checkout-container">
        <h1>Checkout Produk</h1>

        <!-- Produk Checkout -->
        <div class="product-item">
            <img src="https://via.placeholder.com/100" alt="Produk">
            <div class="product-details">
                <h2>Produk 1</h2>
                <p>Harga: Rp <span class="price">50000</span></p>
                <label>Jumlah:
                    <input type="number" class="quantity" value="1" min="1">
                </label>
            </div>
        </div>

        <!-- Informasi Total -->
        <div class="total">
            <p>Total: Rp <span id="total-price">50000</span></p>
        </div>

        <!-- Formulir Pengiriman -->
        <div class="shipping-info">
            <h2>Informasi Pengiriman</h2>
            <label>Nama: <input type="text" id="name"></label>
            <label>Alamat: <input type="text" id="address"></label>
            <label>No. Telepon: <input type="text" id="phone"></label>
        </div>

        <!-- Tombol Checkout -->
        <button id="checkout-button">Checkout</button>
    </div>

    <script src="shopping.js"></script>
</body>
</html>
