<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Produk</title>
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7jmv7jN0vC7ZCiTevmYt-ySWbGsLQbHs&callback=initMap&libraries=places" async defer></script>
</head>
<body>
<div class="checkout-container">
    <h1>Pembayaran</h1>
    <div class="checkout-form">
        <div class="left">
            <!-- Informasi Pengiriman -->
            <div class="section">
                <h2>Informasi Pengiriman</h2>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label for="address">Alamat Pengiriman</label>
                    <input type="text" id="address" placeholder="Masukkan alamat" readonly>
                    <button type="button" onclick="getLocation()">Dapatkan Lokasi Saya</button>
                </div>
                <!-- Tambahkan input manual untuk alamat jika gagal mendapatkan lokasi -->
                <div class="form-group" id="manualAddress" style="display:none;">
                    <label for="manual-address">Masukkan Alamat Pengiriman</label>
                    <input type="text" id="manual-address" placeholder="Masukkan alamat manual">
                </div>
                <div id="map" style="height: 300px; margin-top: 10px;"></div>
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
        </div>

        <!-- Rangkuman Pembelian -->
        <div class="right">
            <div class="section">
                <h2>Rangkuman Pembelian</h2>
                <div class="summary" id="summary">
                    <!-- Produk akan ditambahkan di sini secara dinamis -->
                </div>
                <p id="total">Total: <strong></strong></p>
            </div>

            <!-- Tombol Checkout -->
            <div class="checkout-btn">
                <button type="button" id="checkout-btn">Bayar Sekarang</button>
            </div>
        </div>
    </div>
</div>

<script src="js/checkout.js"></script>

</body>
</html>
