<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png" />
  <title>Form Pendaftaran Calon Mitra</title>

  <link rel="stylesheet" href="{{ asset('css/formpendaftaran.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
</head>

<body>
  <div class="container my-5">
    <div class="text-center my-4">
        <img src="{{ asset('build/images/login1.png') }}" alt="Logo" style="max-height: 100px;" class="mb-3">
        <h5 class="fw-bold">Form Pendaftaran Calon Mitra</h5>
    </div>
    <form action="{{ route('post.mitra') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- SECTION 1 -->
      <div class="section">
        <h3 class="fw-bold fs-5 text-center">Data Calon Mitra</h3>
        <p class="text-center mb-4 text-muted small">
          Masukkan data diri sesuai dengan kartu identitas secara benar dan teliti!
        </p>

        <div class="row g-4">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Lengkap (Sesuai KTP) <small class="text-danger">*</small></label>
              <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" autofocus />
            </div>
            <div class="form-group">
              <label>No KTP <small class="text-danger">*</small></label>
              <input type="number" name="no_ktp" placeholder="Masukkan Nomor KTP" maxlength="16" />
            </div>
            <div class="form-group">
              <label>Tanggal Lahir <small class="text-danger">*</small></label>
              <input type="date" name="tgl_lahir" />
            </div>
            <div class="form-group">
              <label>Email <small class="text-danger">*</small></label>
              <input type="email" name="email" placeholder="Masukkan Email" />
            </div>
            <div class="form-group">
              <label>Nomor HP (WhatsApp) <small class="text-danger">*</small></label>
              <input type="tel" name="no_hp" placeholder="Masukkan Nomor HP" />
            </div>
            <div class="form-group">
                <label>Jenis Kelamin <small class="text-danger">*</small></label>
                <select name="jenis_kelamin" class="form-select" required>
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="Wanita">Wanita</option>
                  <option value="Laki-laki">Laki-laki</option>
                </select>
              </div>
            <div class="form-group">
              <label>Upload KTP (jpeg, jpg, png; max 2MB)</label>
              <input type="file" name="upload_ktp" accept=".jpg,.jpeg,.png" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat (Sesuai KTP) <small class="text-danger">*</small></label>
              <input type="text" name="alamat_ktp" placeholder="Masukkan Alamat" />
            </div>
            <div class="form-group">
              <label>Provinsi <small class="text-danger">*</small></label>
              <select name="provinsi" id="provinsi" class="form-select">
                <option value="">Pilih Provinsi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kota <small class="text-danger">*</small></label>
              <select name="kota" id="kota" class="form-select">
                <option value="">Pilih Kota</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kecamatan <small class="text-danger">*</small></label>
              <select name="kecamatan" id="kecamatan" class="form-select">
                <option value="">Pilih Kecamatan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kelurahan <small class="text-danger">*</small></label>
              <select name="kelurahan" id="kelurahan" class="form-select">
                <option value="">Pilih Kelurahan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Domisili <small class="text-danger">*</small></label>
              <input type="text" name="domisili" placeholder="Masukkan Domisili" />
            </div>
            <div class="form-group">
              <label>Upload Pas Foto (jpeg, jpg, png; max 2MB)</label>
              <input type="file" name="upload_foto" accept=".jpg,.jpeg,.png" />
            </div>
          </div>
        </div>
      </div>

      <!-- SECTION 2 -->
      <div class="section mt-5">
        <h3 class="fw-bold fs-5 text-center">Pendaftaran Alamat Mitra</h3>
        <p class="text-center mb-4 text-muted small">
          Masukkan alamat sesuai dengan alamat yang akan didaftarkan
        </p>

        <div class="form-check form-check-inline mb-4">
          <input name="copy" class="form-check-input" type="checkbox" id="copyLocation" value="option1" />
          <label class="form-check-label" for="copyLocation">Alamat / Provinsi, Kota, Kecamatan, Kelurahan sama dengan Data Calon Mitra</label>
        </div>

        <div class="row g-4">
          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat Lengkap <small class="text-danger">*</small></label>
              <input type="text" name="alamat" placeholder="Masukkan Alamat Lengkap" />
            </div>
            <div class="form-group">
              <label>Provinsi <small class="text-danger">*</small></label>
              <select name="provinsi_mitra" id="provinsi_mitra" class="form-select">
                <option value="">Pilih Provinsi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kota <small class="text-danger">*</small></label>
              <select name="kota_mitra" id="kota_mitra" class="form-select">
                <option value="">Pilih Kota</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kecamatan <small class="text-danger">*</small></label>
              <select name="kecamatan_mitra" id="kecamatan_mitra" class="form-select">
                <option value="">Pilih Kecamatan</option>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Kelurahan <small class="text-danger">*</small></label>
              <select name="kelurahan_mitra" id="kelurahan_mitra" class="form-select">
                <option value="">Pilih Kelurahan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kode Pos <small class="text-danger">*</small></label>
              <input type="text" name="kode_pos" placeholder="Masukkan Kode Pos" />
            </div>
            <div class="form-group">
                <label>Latitude <small class="text-danger">*</small></label>
                <div class="input-group">
                  <input type="text" name="latitude" class="form-control" placeholder="Titik Koordinat Lokasi Usaha *">
                  <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#popupKoordinat" title="Lihat Panduan Koordinat">
                    <i class="bi bi-geo-alt-fill"></i>
                  </button>
                </div>
              </div>
              
              <div class="form-group">
                <label>Longitude <small class="text-danger">*</small></label>
                <div class="input-group">
                  <input type="text" name="longitude" class="form-control" placeholder="Titik Koordinat Lokasi Usaha *">
                  <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#popupKoordinat" title="Lihat Panduan Koordinat">
                    <i class="bi bi-geo-alt-fill"></i>
                  </button>
                </div>
              </div>
          </div>
        </div>
      </div>

      <!-- Modal Panduan Koordinat -->
      <div class="modal fade" id="popupKoordinat" tabindex="-1" aria-labelledby="popupKoordinatLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupKoordinatLabel">Panduan Mengambil Titik Koordinat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" style="padding: 1rem;">
                    <img src="{{ asset('build/images/koordinat.png') }}" alt="Panduan Koordinat" style="width: 400px;" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>     

      <!-- MODAL VALIDASI -->
      <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="termsModalLabel">Pernyataan Data Telah Sesuai</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Dengan ini, saya menyatakan bahwa semua data yang saya masukkan dalam formulir pendaftaran ini adalah benar dan sesuai dengan informasi yang sebenarnya. Saya memahami bahwa jika data yang saya berikan tidak sesuai atau tidak lengkap, hal tersebut dapat mempengaruhi proses pendaftaran saya.</p>
            </div>
            <div class="mx-3 mb-4 form-check form-check-inline">
              <input name="terms" class="form-check-input" type="checkbox" onchange="toggleSubmitButton(this)" id="agreeTerms" />
              <label class="form-check-label" for="agreeTerms">Saya menyatakan bahwa data yang saya masukkan telah sesuai dan benar.</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" id="submitButton" disabled>Kirim</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Tombol Submit dan Reset -->
      <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
          <button type="button" id="submit-btn" class="btn btn-primary w-100 mb-2" style="background-color: #745A34; border-color: #745A34;">
            Kirim
          </button>
          <button type="button" class="btn btn-outline-secondary w-100" id="resetFormBtn">
            Reset Form
          </button>
        </div>
      </div>

      <!-- Tombol tersembunyi untuk trigger modal -->
      <button type="button" class="d-none" id="modalBtn" data-bs-toggle="modal" data-bs-target="#termsModal"></button>


  <script src="js/formpendaftaran.js"></script>
  <script src="{{ asset('js/form-validation-inline.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>
