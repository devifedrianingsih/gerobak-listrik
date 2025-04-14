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

function toggleSubmitButton(checkbox) {
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = !checkbox.checked;
}
