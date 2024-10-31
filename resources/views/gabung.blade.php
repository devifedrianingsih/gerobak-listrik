<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabung Kemitraan</title>
    <link rel="stylesheet" href="{{ asset('css/gabungk.css') }}">
</head>
<body>
    <div class="container">
    <div class="title">
        <h2>GEROBAK LISTRIK</h2>
        <p> lorem ipsum dolor sit amet. lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.lorem ipsum dolor sit amet. lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.
        </p>  
    </div>
    <div class="data-title">
     <h3> DATA DIRI PELANGGAN </h3>
    </div>
    <!-- <div class="data">
        <div class="data-kiri">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><input type="text" placeholder="Masukkan Nama Lengkap"></td>
                    </tr>
                    <tr>
                        <td>No. KTP</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><input type="radio" name="jk"> Laki-laki </td>
                        <td><input type="radio" name="jk"> Perempuan </td>
                    </tr>
                    <tr>
                        <td>Warga Negara</td>
                        <td><input type="radio" name="wn"> WNI </td>
                        <td><input type="radio" name="wn"> WNA </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="data-kanan">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>No. HP(WhatsApp)</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Upload NPWP</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Upload KTP</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Upload Foto Diri</td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="data-title">
     <h3> ALAMAT LOKASI PELANGGAN </h3>
    </div>
    <div class="data">
        <div class="data-kiri">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Alamat Lengkap (Sesuai KTP)</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Lokasi Pengiriman Produk</td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="data-kanan">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>RT/ RW</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Titik Koordinator</td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="button">
            <input type="submit" value="Submit">
        </div>
    </div> -->
    <div class="registration-container">
    <h1>Form Registrasi Konsumen</h1>
    <form id="registration-form">
        <!-- Data Diri -->
        <div class="section">
            <h2>Data Diri</h2>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" placeholder="Masukkan nomor telepon" required>
            </div>
        </div>

        <!-- Lokasi Konsumen -->
        <div class="section">
            <h2>Lokasi Konsumen</h2>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" id="address" placeholder="Masukkan alamat" required>
            </div>
            <div class="form-group">
                <label for="city">Kota</label>
                <input type="text" id="city" placeholder="Masukkan kota" required>
            </div>
            <div class="form-group">
                <label for="province">Provinsi</label>
                <input type="text" id="province" placeholder="Masukkan provinsi" required>
            </div>
            <div class="form-group">
                <label for="postal-code">Kode Pos</label>
                <input type="text" id="postal-code" placeholder="Masukkan kode pos" required>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="submit-btn">
            <button type="submit">Daftar Sekarang</button>
        </div>
    </form>
</div>
<script>
    document.getElementById('registration-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah pengiriman form otomatis

        // Ambil nilai dari form
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;
        const city = document.getElementById('city').value;
        const province = document.getElementById('province').value;
        const postalCode = document.getElementById('postal-code').value;

        // Validasi sederhana
        if (name === "" || email === "" || phone === "" || address === "" || city === "" || province === "" || postalCode === "") {
            alert("Semua kolom harus diisi.");
            return;
        }

        // Jika validasi sukses, simpan data atau kirim ke server
        alert("Form berhasil dikirim!\n\nNama: " + name + "\nEmail: " + email + "\nTelepon: " + phone + "\nAlamat: " + address + ", " + city + ", " + province + ", " + postalCode);
    });
</script>

</body>
</html>

