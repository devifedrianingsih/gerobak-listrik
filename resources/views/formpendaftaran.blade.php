<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/formpendaftaran.css') }}">
</head>
<body>
    <div class="container">
        <h2>Registrasi Pendaftaran</h2>
        <h4>Isilah form pendaftaran ini dengan sesuai!</h4>
        <form method="POST" action="{{ route('post.mitra') }}">
            @csrf
            <div class="form-sections">
                <!-- Left Section: Personal Details -->
                <div class="section">
                    <h3>Data Diri</h3>
                    <h5>Masukkan data diri sesuai dengan kartu identitas secara benar dan teliti!</h5>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" placeholder="Enter birth date">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="tel" name="telp" placeholder="Enter mobile number">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jk" placeholder="Enter your gender">
                    </div>
                    <div class="form-group">
                        <label>Domisili</label>
                        <input type="text" name="dom" placeholder="Enter occupation">
                    </div>
                </div>

                <!-- Right Section: Address Details -->
                <div class="section">
                    <h3>Pendaftaran Alamat Mitra</h3>
                    <h5>Masukkan alamat sesuai dengan alamat yang akan didaftarkan</h5>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Enter street address">
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" name="kota" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="prov" placeholder="Enter state">
                    </div>
                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" name="pos" placeholder="Enter postal code">
                    </div>
                    <div class="form-group">
                        <label>Negara</label>
                        <input type="text" name="negara" placeholder="Enter country">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="lat" placeholder="Enter latitude">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="lon" placeholder="Enter longitude">
                    </div>
                </div>
            </div>


            <button type="submit" class="next-button">Selesai</button>
        </form>
    </div>
</body>
</html>
