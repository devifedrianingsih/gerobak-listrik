// formpendaftaran.js

// --- Setup Axios ---
// (Sudah include di Blade dengan <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>)

// --- Submit Validation ---
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

    const formatLabel = (str) => str.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

    // if (!allFilled) {
    //     const formatted = emptyFields.map(formatLabel).join(', ');
    //     alert("Harap lengkapi seluruh form pendaftaran!\nYang belum diisi: " + formatted);
    // } else {
    //     document.getElementById('modalBtn').click();
    // }
});

// --- Load Wilayah Indonesia Dynamic ---
document.addEventListener('DOMContentLoaded', () => {
    loadProvinces('provinsi');
    loadProvinces('provinsi_mitra');
});

function loadProvinces(elementId) {
    axios.get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(response => {
            const provinsiDropdown = document.getElementById(elementId);
            updateDropdown(provinsiDropdown, response.data, 'id', 'name');
        });
}

function loadRegencies(provinceId, elementId) {
    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
        .then(response => {
            const kotaDropdown = document.getElementById(elementId);
            updateDropdown(kotaDropdown, response.data, 'id', 'name');
            clearDropdown(elementId.includes('mitra') ? 'kecamatan_mitra' : 'kecamatan');
            clearDropdown(elementId.includes('mitra') ? 'kelurahan_mitra' : 'kelurahan');
        });
}

function loadDistricts(regencyId, elementId) {
    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
        .then(response => {
            const kecamatanDropdown = document.getElementById(elementId);
            updateDropdown(kecamatanDropdown, response.data, 'id', 'name');
            clearDropdown(elementId.includes('mitra') ? 'kelurahan_mitra' : 'kelurahan');
        });
}

function loadVillages(districtId, elementId) {
    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
        .then(response => {
            const kelurahanDropdown = document.getElementById(elementId);
            updateDropdown(kelurahanDropdown, response.data, 'id', 'name');
        });
}

function updateDropdown(dropdown, items, valueField, textField) {
    dropdown.innerHTML = '<option value="">Pilih</option>';
    items.forEach(item => {
        const option = document.createElement('option');
        option.value = item[valueField];
        option.textContent = item[textField];
        dropdown.appendChild(option);
    });
}

function clearDropdown(elementId) {
    const dropdown = document.getElementById(elementId);
    dropdown.innerHTML = '<option value="">Pilih</option>';
}

// --- Cascading Selection ---

// Provinsi -> Kota
['provinsi', 'provinsi_mitra'].forEach(id => {
    document.getElementById(id).addEventListener('change', function() {
        const provId = this.value;
        loadRegencies(provId, id === 'provinsi' ? 'kota' : 'kota_mitra');
    });
});

// Kota -> Kecamatan
['kota', 'kota_mitra'].forEach(id => {
    document.getElementById(id).addEventListener('change', function() {
        const regencyId = this.value;
        loadDistricts(regencyId, id === 'kota' ? 'kecamatan' : 'kecamatan_mitra');
    });
});

// Kecamatan -> Kelurahan
['kecamatan', 'kecamatan_mitra'].forEach(id => {
    document.getElementById(id).addEventListener('change', function() {
        const districtId = this.value;
        loadVillages(districtId, id === 'kecamatan' ? 'kelurahan' : 'kelurahan_mitra');
    });
});

// --- Copy Data Lokasi ---
document.getElementById('copyLocation').addEventListener('change', function() {
    const isChecked = this.checked;
    const fields = ['provinsi', 'kota', 'kecamatan', 'kelurahan'];

    fields.forEach(function(field) {
        const source = document.getElementById(field);
        const target = document.getElementById(field + '_mitra');

        if (isChecked) {
            if (target.tagName === 'SELECT') {
                const exists = Array.from(target.options).find(opt => opt.value === source.value);
                if (!exists && source.value !== '') {
                    const newOption = new Option(source.options[source.selectedIndex].text, source.value);
                    target.add(newOption);
                }
            }
            target.value = source.value;
        } else {
            target.value = '';
        }
    });
});

// --- Toggle Button Modal ---
function toggleSubmitButton(checkbox) {
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = !checkbox.checked;
}
