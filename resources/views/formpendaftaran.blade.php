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
        <form action="{{ route('post.mitra') }}" method="POST">
            @csrf
            <div class="form-sections">
                <!-- Left Section: Personal Details -->
                <div class="section">
                    <h3>Data Calon Mitra</h3>
                    <h5>Masukkan data diri sesuai dengan kartu identitas secara benar dan teliti!</h5>
                    <div class="form-group">
                        <label>Nama Lengkap (Sesuai KTP)</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" placeholder="Masukkan tanggal lahir" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP (WhatsApp)</label>
                        <input type="tel" name="telp" placeholder="Masukkan Nomor HP (WhatsApp)" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" required>
                            <option value="Wanita">Wanita</option>
                            <option value="Laki-laki">Laki-laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Domisili</label>
                        <input type="text" name="dom" placeholder="Masukkan Domisili" required>
                    </div>
                </div>

                <!-- Right Section: Address Details -->
                <div class="section">
                    <h3>Pendaftaran Alamat Mitra</h3>
                    <h5>Masukkan alamat sesuai dengan alamat yang akan didaftarkan</h5>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Masukkan Alamat Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="prov" placeholder="Masukkan Provinsi" required>
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" name="kota" placeholder="Masukkan Kota" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" name="pos" placeholder="Masukkan Kode Pos" required>
                    </div>
                    <div class="form-group">
                        <label>Negara</label>
                        <input type="text" name="negara" placeholder="Masukkan Negara" required>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="lat" placeholder="Masukkan Titik Latitude" required>
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="lon" placeholder="Masukkan Titik Longitude" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="next-button">Kirim</button>
        </form>
    </div>
</body>
</html>
