<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Produk</title>
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    
</head>
</head>
<body>
<div class="checkout-container">
    <h1>Checkout</h1>
    <div class="checkout-form">
        <!-- Informasi Pengiriman -->
        <div class="section">
            <h2>Informasi Pengiriman</h2>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <label for="address">Alamat Pengiriman</label>
                <input type="text" id="address" placeholder="Masukkan alamat">
            </div>
            <div class="form-group">
                <label for="city">Kota</label>
                <input type="text" id="city" placeholder="Masukkan kota">
            </div>
            <div class="form-group">
                <label for="postal">Kode Pos</label>
                <input type="text" id="postal" placeholder="Masukkan kode pos">
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" placeholder="Masukkan nomor telepon">
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="section">
            <h2>Metode Pembayaran</h2>
            <div class="form-group">
                <label for="payment-method">Pilih Metode Pembayaran</label>
                <select id="payment-method">
                    <option value="credit-card">Kartu Kredit</option>
                    <option value="bank-transfer">Transfer Bank</option>
                    <option value="paypal">Paypal</option>
                    <option value="cod">Bayar di Tempat (COD)</option>
                </select>
            </div>
        </div>

        <!-- Rangkuman Pembelian -->
        <div class="section">
            <h2>Rangkuman Pembelian</h2>
            <div class="summary">
                <p>Produk 1: <span>Rp. 200.000</span></p>
                <p>Produk 2: <span>Rp. 150.000</span></p>
                <p>Total: <strong>Rp. 350.000</strong></p>
            </div>
        </div>

        <!-- Tombol Checkout -->
        <div class="checkout-btn">
            <button type="submit">Bayar Sekarang</button>
        </div>
    </div>
</div>

</body>
</html>