// --- Submit Validation + Prepare Modal ---
document.getElementById("submit-btn").addEventListener("click", function (e) {
    e.preventDefault();

    const form = document.querySelector("form");
    const submitBtn = document.getElementById("submit-btn");
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

    if (!allFilled) {
        const formatted = emptyFields.map(str =>
            str.split('_').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ')
        ).join(', ');
        alert("Harap lengkapi seluruh form!\nYang belum diisi: " + formatted);
        return;
    }

    const lat = form.latitude.value.trim();
    const lng = form.longitude.value.trim();

    if (!lat || !lng) {
        alert("Silakan isi Latitude dan Longitude terlebih dahulu.");
        return;
    }

    submitBtn.disabled = true;
    submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Mengecek Lokasi...`;

    axios.post("/cek-lokasi", {
        latitude: lat,
        longitude: lng,
    })
    .then((response) => {
        if (response.data.exists) {
            alert("Lokasi ini sudah digunakan. Silakan pilih titik lokasi lain.");
            submitBtn.disabled = false;
            submitBtn.innerHTML = `Kirim`;
        } else {
            document.getElementById("modalBtn").click();

            const modal = document.getElementById("termsModal");
            modal.addEventListener('hidden.bs.modal', function () {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `Kirim`;
            }, { once: true });
        }
    })
    .catch((error) => {
        console.error("Error saat cek lokasi:", error);
        alert("Terjadi kesalahan saat mengecek lokasi.");
        submitBtn.disabled = false;
        submitBtn.innerHTML = `Kirim`;
    });
});

document.getElementById("submitButton").addEventListener("click", function () {
    const agreed = document.getElementById("agreeTerms").checked;
    if (!agreed) {
        alert("Kamu harus menyetujui pernyataan sebelum mengirim.");
        return;
    }
    document.querySelector("form").submit();
});


// --- Load Wilayah ---
document.addEventListener('DOMContentLoaded', () => {
    loadProvinces('provinsi');
    loadProvinces('provinsi_mitra');
});

function loadProvinces(elementId) {
    axios.get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(response => {
            updateDropdown(document.getElementById(elementId), response.data, 'id', 'name');
        });
}

function loadRegencies(provinceId, elementId) {
    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
        .then(response => {
            updateDropdown(document.getElementById(elementId), response.data, 'id', 'name');
            clearDropdown(elementId.includes('mitra') ? 'kecamatan_mitra' : 'kecamatan');
            clearDropdown(elementId.includes('mitra') ? 'kelurahan_mitra' : 'kelurahan');
        });
}

function loadDistricts(regencyId, elementId) {
    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
        .then(response => {
            updateDropdown(document.getElementById(elementId), response.data, 'id', 'name');
            clearDropdown(elementId.includes('mitra') ? 'kelurahan_mitra' : 'kelurahan');
        });
}

function loadVillages(districtId, elementId) {
    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
        .then(response => {
            updateDropdown(document.getElementById(elementId), response.data, 'id', 'name');
        });
}

// --- Update Dropdown: Teks dan Value diset UPPERCASE, ID disimpan di data-id ---
function updateDropdown(dropdown, items, idField, nameField) {
    const label = getPlaceholderLabel(dropdown.id); // gunakan label yang sesuai
    dropdown.innerHTML = `<option value="">Pilih ${label}</option>`;
    items.forEach(item => {
        const nameUpper = item[nameField].toUpperCase();
        const option = document.createElement('option');
        option.value = nameUpper;
        option.textContent = nameUpper;
        option.setAttribute('data-id', item[idField]);
        dropdown.appendChild(option);
    });
}

function clearDropdown(elementId) {
    const dropdown = document.getElementById(elementId);
    const label = getPlaceholderLabel(elementId);
    if (dropdown) dropdown.innerHTML = `<option value="">Pilih ${label}</option>`;
}

function getPlaceholderLabel(id) {
    const map = {
        'provinsi': 'Provinsi',
        'kota': 'Kota',
        'kecamatan': 'Kecamatan',
        'kelurahan': 'Kelurahan',
        'provinsi_mitra': 'Provinsi',
        'kota_mitra': 'Kota',
        'kecamatan_mitra': 'Kecamatan',
        'kelurahan_mitra': 'Kelurahan'
    };
    return map[id] || 'Opsi';
}

// --- Event Wilayah Cascade ---
document.getElementById('provinsi').addEventListener('change', function () {
    const id = this.options[this.selectedIndex].getAttribute('data-id');
    loadRegencies(id, 'kota');
});

document.getElementById('provinsi_mitra').addEventListener('change', function () {
    const id = this.options[this.selectedIndex].getAttribute('data-id');
    loadRegencies(id, 'kota_mitra');
});

document.getElementById('kota').addEventListener('change', function () {
    const id = this.options[this.selectedIndex].getAttribute('data-id');
    loadDistricts(id, 'kecamatan');
});

document.getElementById('kota_mitra').addEventListener('change', function () {
    const id = this.options[this.selectedIndex].getAttribute('data-id');
    loadDistricts(id, 'kecamatan_mitra');
});

document.getElementById('kecamatan').addEventListener('change', function () {
    const id = this.options[this.selectedIndex].getAttribute('data-id');
    loadVillages(id, 'kelurahan');
});

document.getElementById('kecamatan_mitra').addEventListener('change', function () {
    const id = this.options[this.selectedIndex].getAttribute('data-id');
    loadVillages(id, 'kelurahan_mitra');
});

// --- Copy Wilayah ke Alamat Mitra ---
document.getElementById('copyLocation').addEventListener('change', function () {
    const isChecked = this.checked;
    const fields = ['provinsi', 'kota', 'kecamatan', 'kelurahan'];

    fields.forEach(function (field) {
        const source = document.getElementById(field);
        const target = document.getElementById(field + '_mitra');

        if (isChecked) {
            target.innerHTML = source.innerHTML;
            target.value = source.value;
        } else {
            target.innerHTML = '<option value="">Pilih</option>';
        }
    });
});

// --- Modal Toggle ---
function toggleSubmitButton(checkbox) {
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = !checkbox.checked;
}
