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
        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <div class="checkout-form">
        <div class="left">
            <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Informasi Pengiriman -->
                <div class="section">
                    <h2>Informasi Pengiriman</h2>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Titik Alamat Pengiriman</label>
                        <button type="button" onclick="getLocation()">Dapatkan Lokasi Saya</button>
                    </div>
                    <div class="form-group" id="manualAddress" style="display:none;">
                        <label for="manual-address">Alamat Pengiriman</label>
                        <input type="text" id="manual-address" name="manual_address" placeholder="Masukkan alamat pengiriman" required>
                    </div>
                    <div id="map" style="height: 200px; margin-top: 10px;"></div>
                    <div class="form-group">
                        <label for="city">Kota</label>
                        <input type="text" id="city" name="city" placeholder="Masukkan kota" required>
                    </div>
                    <div class="form-group">
                        <label for="postal">Kode Pos</label>
                        <input type="text" id="postal" name="postal" placeholder="Masukkan kode pos" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon" required>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="section">
                    <h2>Pembayaran</h2>
                    <div class="form-group">
                        <label for="payment-method">Transfer Bank</label>
                        <select id="payment-method" name="payment_method" required>
                            <option value="bca">BCA 12345 a/n Gerobak Listrik</option>
                            <option value="bri">BRI 12345 a/n Gerobak Listrik</option>
                            <option value="bni">BNI 12345 a/n Gerobak Listrik</option>
                            <option value="mandiri">Mandiri 12345 a/n Gerobak Listrik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pickup-delivery">Metode Pengambilan Barang</label>
                        <select id="pickup-delivery" name="pickup_delivery" onchange="toggleAddressFields()">
                            <option value="delivery">Delivery</option>
                            <option value="pickup">Pick-Up</option>
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
                    <!-- Total Harga Ditampilkan -->
                    <p id="total-display">Total: <strong>Rp 0</strong></p>
                    <!-- Input Hidden untuk Mengirim Total -->
                    <input type="hidden" id="total" name="total" value="0">
                </div>
                <div class="section">
                    <h2>Bukti Transfer</h2>
                    <div class="upload-btn">
                        <label for="upload-bukti">Upload Bukti Transfer</label>
                        <input type="file" id="upload-bukti" name="upload_bukti" accept="image/*,application/pdf" required>
                    </div>
                </div>

                <div class="checkout-btn">
                    <button type="submit" id="checkout-btn">Konfirmasi</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="js/checkout.js"></script>

</body>
</html>
