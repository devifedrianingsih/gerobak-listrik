<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="{{ asset('css/formpendaftaran.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="{{ route('post.mitra') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-sections" id="form-pendaftaran">
                <!-- Left Section: Personal Details -->
                <div class="section row">
                    <h3 class="fw-bold fs-4">Data Calon Mitra</h3>
                    <h5 class="fw-normal fs-5 mb-4">Masukkan data diri sesuai dengan kartu identitas secara benar dan
                        teliti!</h5>

                    <div class="row col-lg-6 col-ms-12">
                        <div class="form-group">
                            <label>Nama Lengkap (Sesuai KTP) <small class="text-danger">*</small></label>
                            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" autofocus>
                        </div>
                        <div class="form-group">
                            <label>No KTP <small class="text-danger">*</small></label>
                            <input type="number" name="no_ktp" placeholder="Masukkan Nomor KTP" maxlength="16">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir <small class="text-danger">*</small></label>
                            <input type="date" name="tgl_lahir" placeholder="Masukkan tanggal lahir">
                        </div>
                        <div class="form-group">
                            <label>Email <small class="text-danger">*</small></label>
                            <input type="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label>Nomor HP (WhatsApp) <small class="text-danger">*</small></label>
                            <input type="tel" name="no_hp" placeholder="Masukkan Nomor HP (WhatsApp)">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin <small class="text-danger">*</small></label>
                            <select name="jenis_kelamin">
                                <option value="Wanita">Wanita</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat (Sesuai KTP) <small class="text-danger">*</small></label>
                            <input type="text" name="alamat_ktp" placeholder="Masukkan Alamat (Sesuai KTP)">
                        </div>
                    </div>
                    <div class="row col-lg-6 col-ms-12">
                        <div class="form-group">
                            <label>Domisili <small class="text-danger">*</small></label>
                            <input type="text" name="domisili" placeholder="Masukkan Domisili">
                        </div>
                        <div class="form-group">
                            <label>Upload KTP (jpeg, jpg, png; max 2MB)</label>
                            <input type="file" name="upload_ktp" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="form-group">
                            <label>Upload Pas Foto (jpeg, jpg, png; max 2MB)</label>
                            <input type="file" name="upload_foto" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="form-group">
                            <label>Provinsi <small class="text-danger">*</small></label>
                            <select name="provinsi" id="provinsi" class="form-select">
                                <option value="">Pilih Provinsi</option>
                                <!-- Provinsi options akan muncul di sini -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kota <small class="text-danger">*</small></label>
                            <select name="kota" id="kota" class="form-select">
                                <option value="">Pilih Kota</option>
                                <!-- Kota options akan muncul di sini -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan <small class="text-danger">*</small></label>
                            <select name="kecamatan" id="kecamatan" class="form-select">
                                <option value="">Pilih Kecamatan</option>
                                <!-- Kecamatan options akan muncul di sini -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelurahan <small class="text-danger">*</small></label>
                            <select name="kelurahan" id="kelurahan" class="form-select">
                                <option value="">Pilih Kelurahan</option>
                                <!-- Kelurahan options akan muncul di sini -->
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Right Section: Address Details -->
                <div class="section row">
                    <h3 class="fw-bold fs-4">Pendaftaran Alamat Mitra</h3>
                    <h5 class="fw-normal fs-5 mb-4">Masukkan alamat sesuai dengan alamat yang akan didaftarkan</h5>

                    <div class="col-lg-12 mb-4">
                        <div class="form-check form-check-inline">
                            <input name="copy" class="form-check-input" type="checkbox" id="copyLocation" value="option1">
                            <label class="form-check-label" for="copyLocation">Alamat / Provinsi, Kota, Kecamatan,
                                Kelurahan sama dengan Data Calon Mitra</label>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Alamat Lengkap <small class="text-danger">*</small></label>
                            <input type="text" name="alamat" placeholder="Masukkan Alamat Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Kode Pos <small class="text-danger">*</small></label>
                            <input type="text" name="kode_pos" placeholder="Masukkan Kode Pos">
                        </div>
                        <div class="form-group">
                            <label>Latitude <small class="text-danger">*</small></label>
                            <input type="text" name="latitude" placeholder="Masukkan Titik Latitude">
                        </div>
                        <div class="form-group">
                            <label>Longitude <small class="text-danger">*</small></label>
                            <input type="text" name="longitude" placeholder="Masukkan Titik Longitude">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Provinsi <small class="text-danger">*</small></label>
                            <select name="provinsi_mitra" id="provinsi_mitra" class="form-select">
                                <option value="">Pilih Provinsi</option>
                                <!-- Provinsi options akan muncul di sini -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kota <small class="text-danger">*</small></label>
                            <select name="kota_mitra" id="kota_mitra" class="form-select">
                                <option value="">Pilih Kota</option>
                                <!-- Kota options akan muncul di sini -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan <small class="text-danger">*</small></label>
                            <select name="kecamatan_mitra" id="kecamatan_mitra" class="form-select">
                                <option value="">Pilih Kecamatan</option>
                                <!-- Kecamatan options akan muncul di sini -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelurahan <small class="text-danger">*</small></label>
                            <select name="kelurahan_mitra" id="kelurahan_mitra" class="form-select">
                                <option value="">Pilih Kelurahan</option>
                                <!-- Kelurahan options akan muncul di sini -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="termsModalLabel">Pernyataan Data Telah Sesuai</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Dengan ini, saya menyatakan bahwa semua data yang saya masukkan dalam formulir
                                pendaftaran
                                ini adalah benar dan sesuai dengan informasi yang sebenarnya.
                                Saya memahami bahwa jika data yang saya berikan tidak sesuai atau tidak lengkap, hal
                                tersebut dapat mempengaruhi proses pendaftaran saya.</p>
                        </div>
                        <div class="mx-3 mb-4 form-check form-check-inline">
                            <input name="terms" class="form-check-input" type="checkbox" onchange="toggleSubmitButton(this)" id="agreeTerms">
                            <label class="form-check-label" for="agreeTerms">Saya menyatakan bahwa data yang saya
                                masukkan telah sesuai dan benar.</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="submitButton" disabled>Kirim</button>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" id="submit-btn" class="next-button">Kirim</button>
        </form>

        <button type="button" class="d-none" id="modalBtn" data-bs-toggle="modal"
            data-bs-target="#termsModal"></button>
    </div>

    <script>
        document.getElementById("submit-btn").addEventListener("click", function(e) {
            e.preventDefault();

            const form = document.querySelector("form");
            const fields = [
                'nama', 'no_ktp', 'tgl_lahir', 'email', 'no_hp',
                'jenis_kelamin', 'alamat_ktp', 'domisili', 'upload_ktp', 'upload_foto',
                'provinsi_mitra', 'kota_mitra', 'kecamatan_mitra', 'kelurahan_mitra',
                'provinsi', 'kota', 'kecamatan', 'kelurahan',
                'alamat', 'kode_pos', 'latitude', 'longitude',
            ];

            let allFilled = true;
            let emptyFields = [];

            fields.forEach(name => {
                const input = form.querySelector(`[name="${name}"]`);
                if (!input || input.value.trim() === "") {
                    emptyFields.push(name);
                    allFilled = false;
                }
            });

            // Fungsi buat ubah "tgl_lahir" -> "Tgl Lahir"
            const formatLabel = (str) => {
                return str
                    .split('_')
                    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                    .join(' ');
            };

            if (!allFilled) {
                const formatted = emptyFields.map(formatLabel).join(', ');
                alert("Harap lengkapi seluruh form pendaftaran!\nYang belum diisi: " + formatted);
            } else {
                document.getElementById('modalBtn').click();
            }
        });
    </script>

    <script>
        let copy = false;
        const dataJKT = {
            provinsi: ['DKI Jakarta'],
            kota: {
                'DKI Jakarta': [
                    'Jakarta Pusat', 'Jakarta Utara', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Barat'
                ]
            },
            kecamatan: {
                'Jakarta Pusat': [
                    'Menteng', 'Cikini', 'Gondangdia', 'Kebon Sirih', 'Tanah Abang'
                ],
                'Jakarta Utara': [
                    'Kelapa Gading', 'Tanjung Priok', 'Pademangan', 'Kecamatan Koja', 'Cilincing'
                ],
                'Jakarta Selatan': [
                    'Kebayoran Baru', 'Pancoran', 'Jagakarsa', 'Mampang Prapatan', 'Cilandak'
                ],
                'Jakarta Timur': [
                    'Cipayung', 'Duren Sawit', 'Makassar', 'Jatinegara', 'Kramat Jati'
                ],
                'Jakarta Barat': [
                    'Cengkareng', 'Kalideres', 'Grogol Petamburan', 'Kembangan', 'Taman Sari'
                ]
            },
            kelurahan: {
                'Menteng': [
                    'Menteng', 'Gondangdia', 'Cikini', 'Kebon Sirih', 'Tanah Abang'
                ],
                'Kelapa Gading': [
                    'Kelapa Gading Timur', 'Kelapa Gading Barat', 'Pegangsaan Dua'
                ],
                'Kebayoran Baru': [
                    'Selong', 'Gandaria', 'Kebayoran Lama', 'Kebayoran Baru'
                ],
                'Cipayung': [
                    'Pondok Bambu', 'Bambu Apus', 'Cipayung', 'Kampung Melayu'
                ],
                'Tanjung Priok': [
                    'Sungai Bambu', 'Papanggo', 'Kepulauan Seribu', 'Tanjung Priok'
                ],
                'Jagakarsa': [
                    'Jagakarsa', 'Kebagusan', 'Cipete Utara'
                ],
                'Grogol Petamburan': [
                    'Grogol', 'Slipi', 'Kebon Jeruk'
                ],
                'Cengkareng': [
                    'Cengkareng Timur', 'Cengkareng Barat', 'Duri Kosambi'
                ],
                'Cilincing': [
                    'Cilincing', 'Marunda', 'Kalibaru'
                ],
                // Kelurahan lainnya sesuai kebutuhan
            }
        };

        // Function untuk update options dropdown
        const updateDropdown = (element, options) => {
            element.innerHTML = '<option value="">Pilih</option>';
            options.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option;
                optionElement.textContent = option;
                element.appendChild(optionElement);
            });
        };

        // Event listener untuk memilih provinsi
        document.getElementById('provinsi').addEventListener('change', (e) => {
            const provinsi = e.target.value;
            const kotaDropdown = document.getElementById('kota');
            const kecamatanDropdown = document.getElementById('kecamatan');
            const kelurahanDropdown = document.getElementById('kelurahan');

            // Update Kota berdasarkan Provinsi
            if (provinsi) {
                updateDropdown(kotaDropdown, dataJKT.kota[provinsi] || []);
                kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
            } else {
                updateDropdown(kotaDropdown, []);
                kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
            }
        });

        // Event listener untuk memilih Kota
        document.getElementById('kota').addEventListener('change', (e) => {
            const kota = e.target.value;
            const kecamatanDropdown = document.getElementById('kecamatan');
            const kelurahanDropdown = document.getElementById('kelurahan');

            // Update Kecamatan berdasarkan Kota
            if (kota) {
                updateDropdown(kecamatanDropdown, dataJKT.kecamatan[kota] || []);
                kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
            } else {
                kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
            }
        });

        // Event listener untuk memilih Kecamatan
        document.getElementById('kecamatan').addEventListener('change', (e) => {
            const kecamatan = e.target.value;
            const kelurahanDropdown = document.getElementById('kelurahan');

            // Update Kelurahan berdasarkan Kecamatan
            if (kecamatan) {
                updateDropdown(kelurahanDropdown, dataJKT.kelurahan[kecamatan] || []);
            } else {
                kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
            }
        });

        // Pre-load Provinsi ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const provinsiDropdown = document.getElementById('provinsi');
            updateDropdown(provinsiDropdown, dataJKT.provinsi);
        });

        if (!copy) {
            // Event listener untuk memilih provinsi
            document.getElementById('provinsi_mitra').addEventListener('change', (e) => {
                const provinsi = e.target.value;
                const kotaDropdown = document.getElementById('kota_mitra');
                const kecamatanDropdown = document.getElementById('kecamatan_mitra');
                const kelurahanDropdown = document.getElementById('kelurahan_mitra');

                // Update Kota berdasarkan Provinsi
                if (provinsi) {
                    updateDropdown(kotaDropdown, dataJKT.kota[provinsi] || []);
                    kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
                } else {
                    updateDropdown(kotaDropdown, []);
                    kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
                }
            });

            // Event listener untuk memilih Kota
            document.getElementById('kota_mitra').addEventListener('change', (e) => {
                const kota = e.target.value;
                const kecamatanDropdown = document.getElementById('kecamatan_mitra');
                const kelurahanDropdown = document.getElementById('kelurahan_mitra');

                // Update Kecamatan berdasarkan Kota
                if (kota) {
                    updateDropdown(kecamatanDropdown, dataJKT.kecamatan[kota] || []);
                    kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
                } else {
                    kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
                }
            });

            // Event listener untuk memilih Kecamatan
            document.getElementById('kecamatan_mitra').addEventListener('change', (e) => {
                const kecamatan = e.target.value;
                const kelurahanDropdown = document.getElementById('kelurahan_mitra');

                // Update Kelurahan berdasarkan Kecamatan
                if (kecamatan) {
                    updateDropdown(kelurahanDropdown, dataJKT.kelurahan[kecamatan] || []);
                } else {
                    kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';
                }
            });
        }

        // Pre-load Provinsi ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const provinsiDropdown = document.getElementById('provinsi_mitra');
            updateDropdown(provinsiDropdown, dataJKT.provinsi);
        });

        document.getElementById('copyLocation').addEventListener('change', function() {
            copy = true
            const isChecked = this.checked;

            const fields = ['provinsi', 'kota', 'kecamatan', 'kelurahan'];

            fields.forEach(function(field) {
                const source = document.getElementById(field);
                const target = document.getElementById(field + '_mitra');

                if (isChecked) {
                    // Kalau target belum punya opsi yang sama, tambahin dulu
                    if (target.tagName === 'SELECT') {
                        const existingOption = Array.from(target.options).find(opt => opt.value === source
                            .value);
                        if (!existingOption && source.value !== '') {
                            const newOption = new Option(source.value, source.value);
                            target.add(newOption);
                        }
                    }

                    target.value = source.value;

                    // Biar ikut update terus kalau user ubah field utama
                    if (!source.dataset.listenerAttached) {
                        source.addEventListener('input', function() {
                            if (document.getElementById('copyLocation').checked) {
                                // Tambah opsi baru juga kalau value-nya belum ada di target
                                if (target.tagName === 'SELECT') {
                                    const exists = Array.from(target.options).find(opt => opt
                                        .value === source.value);
                                    if (!exists && source.value !== '') {
                                        const newOption = new Option(source.value, source.value);
                                        target.add(newOption);
                                    }
                                }

                                target.value = source.value;
                            }
                        });
                        source.dataset.listenerAttached = "true";
                    }
                } else {
                    target.value = '';
                }
            });

            copy = false
        });
    </script>

    <script>
        function toggleSubmitButton(checkbox) {
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = !checkbox.checked;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>
