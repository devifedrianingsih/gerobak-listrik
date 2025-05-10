document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submit-btn');
    const resetBtn = document.getElementById('resetFormBtn');
    const latInputGroup = form.querySelector('input[name="latitude"]').parentNode.parentNode;
    const longInputGroup = form.querySelector('input[name="longitude"]').parentNode.parentNode;

    function clearErrors() {
        const errorSpans = document.querySelectorAll('.error-message');
        errorSpans.forEach(el => el.remove());
        const inputs = form.querySelectorAll('input, select');
        inputs.forEach(input => input.classList.remove('is-invalid'));
    }

    function showError(input, message) {
        clearFieldError(input);
        const span = document.createElement('span');
        span.className = 'error-message text-danger small mt-1';
        span.innerText = message;
        input.classList.add('is-invalid');
        input.parentNode.appendChild(span);
    }

    function showCustomError(parent, message) {
        const span = document.createElement('span');
        span.className = 'error-message text-danger small mt-1 d-block';
        span.innerText = message;
        parent.appendChild(span);
    }

    function clearFieldError(input) {
        input.classList.remove('is-invalid');
        const existingError = input.parentNode.querySelector('.error-message');
        if (existingError) existingError.remove();
    }

    function clearCustomError(parent) {
        const existingError = parent.querySelector('.error-message');
        if (existingError) existingError.remove();
    }

    function isOnlyLetters(str) {
        return /^[a-zA-Z\s]+$/.test(str);
    }

    function isOnlyDigits(str) {
        return /^\d+$/.test(str);
    }

    function isValidCoordinate(str) {
        return /^-?\d+(\.\d+)?$/.test(str);
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isValidFile(file, allowedTypes, maxSizeMB) {
        const fileType = file.type;
        const fileSizeMB = file.size / (1024 * 1024);
        return allowedTypes.includes(fileType) && fileSizeMB <= maxSizeMB;
    }

    function isAtLeast17YearsOld(birthDateStr) {
        const birthDate = new Date(birthDateStr);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age >= 17;
    }

    submitBtn.addEventListener('click', function () {
        clearErrors();
        clearCustomError(latInputGroup);
        clearCustomError(longInputGroup);

        const {
            nama, no_ktp, tgl_lahir, email, no_hp,
            domisili, alamat_ktp, alamat,
            jenis_kelamin, provinsi, kota, kecamatan, kelurahan,
            provinsi_mitra, kota_mitra, kecamatan_mitra, kelurahan_mitra,
            kode_pos, latitude, longitude,
            upload_ktp, upload_foto
        } = form;

        const fileKTP = upload_ktp.files[0];
        const fileFoto = upload_foto.files[0];
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        let valid = true;

        if (nama.value.trim() === '' || !isOnlyLetters(nama.value)) {
            showError(nama, nama.value.trim() === '' ? 'Field ini wajib diisi.' : 'Nama hanya boleh huruf.');
            valid = false;
        }

        if (no_ktp.value.trim() === '' || !isOnlyDigits(no_ktp.value) || no_ktp.value.length !== 16) {
            showError(no_ktp, 'No KTP harus 16 digit angka.');
            valid = false;
        }

        if (tgl_lahir.value.trim() === '' || !isAtLeast17YearsOld(tgl_lahir.value)) {
            showError(tgl_lahir, tgl_lahir.value.trim() === '' ? 'Field ini wajib diisi.' : 'Usia minimal harus 17 tahun.');
            valid = false;
        }

        if (email.value.trim() === '' || !isValidEmail(email.value)) {
            showError(email, email.value.trim() === '' ? 'Field ini wajib diisi.' : 'Format email tidak valid.');
            valid = false;
        }

        if (no_hp.value.trim() === '' || !isOnlyDigits(no_hp.value)) {
            showError(no_hp, 'Nomor HP hanya boleh angka.');
            valid = false;
        }

        if (domisili.value.trim() === '' || !isOnlyLetters(domisili.value)) {
            showError(domisili, domisili.value.trim() === '' ? 'Field ini wajib diisi.' : 'Domisili hanya boleh huruf.');
            valid = false;
        }

        if (alamat_ktp.value.trim() === '') {
            showError(alamat_ktp, 'Field ini wajib diisi.');
            valid = false;
        }

        if (alamat.value.trim() === '') {
            showError(alamat, 'Field ini wajib diisi.');
            valid = false;
        }

        [
            { input: jenis_kelamin, name: 'Jenis Kelamin' },
            { input: provinsi, name: 'Provinsi' },
            { input: kota, name: 'Kota' },
            { input: kecamatan, name: 'Kecamatan' },
            { input: kelurahan, name: 'Kelurahan' },
            { input: provinsi_mitra, name: 'Provinsi Mitra' },
            { input: kota_mitra, name: 'Kota Mitra' },
            { input: kecamatan_mitra, name: 'Kecamatan Mitra' },
            { input: kelurahan_mitra, name: 'Kelurahan Mitra' }
        ].forEach(({ input, name }) => {
            if (!input.value) {
                showError(input, `Pilih ${name}.`);
                valid = false;
            }
        });

        if (kode_pos.value.trim() === '' || !isOnlyDigits(kode_pos.value) || kode_pos.value.length !== 5) {
            showError(kode_pos, 'Kode Pos harus 5 digit angka.');
            valid = false;
        }

        if (latitude.value.trim() === '' || !isValidCoordinate(latitude.value)) {
            showCustomError(latInputGroup, latitude.value.trim() === '' ? 'Field ini wajib diisi.' : 'Format latitude tidak valid.');
            valid = false;
        }

        if (longitude.value.trim() === '' || !isValidCoordinate(longitude.value)) {
            showCustomError(longInputGroup, longitude.value.trim() === '' ? 'Field ini wajib diisi.' : 'Format longitude tidak valid.');
            valid = false;
        }

        if (!fileKTP || !isValidFile(fileKTP, allowedTypes, 2)) {
            showError(upload_ktp, 'File KTP harus jpg/jpeg/png dan maksimal 2MB.');
            valid = false;
        }

        if (!fileFoto || !isValidFile(fileFoto, allowedTypes, 2)) {
            showError(upload_foto, 'File Foto harus jpg/jpeg/png dan maksimal 2MB.');
            valid = false;
        }

        if (valid) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Mengirim...`;
            clearFormStorage();
            setTimeout(() => {
                document.getElementById('modalBtn').click();
            }, 300);
        }
    });

    // === LOCAL STORAGE ===
    const formFieldsToSave = [
        'nama','no_ktp', 'tgl_lahir', 'email', 'no_hp', 'jenis_kelamin',
        'alamat_ktp', 'provinsi', 'kota', 'kecamatan',
        'kelurahan', 'domisili', 'alamat', 'provinsi_mitra', 'kota_mitra',
        'kecamatan_mitra', 'kelurahan_mitra', 'kode_pos', 'latitude', 'longitude'
    ];

    formFieldsToSave.forEach(fieldName => {
        const field = form[fieldName];
        if (field) {
            field.addEventListener('input', () => {
                localStorage.setItem(`form_${fieldName}`, field.value);
            });
            field.addEventListener('change', () => {
                localStorage.setItem(`form_${fieldName}`, field.value);
            });
        }
    });

    formFieldsToSave.forEach(fieldName => {
        const savedValue = localStorage.getItem(`form_${fieldName}`);
        if (savedValue !== null && form[fieldName]) {
            form[fieldName].value = savedValue;
        }
    });

    function clearFormStorage() {
        formFieldsToSave.forEach(fieldName => {
            localStorage.removeItem(`form_${fieldName}`);
        });
    }

    // === RESET FORM ===
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            if (!confirm('Yakin ingin mengosongkan form?')) return;
            const inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.checked = false;
                } else {
                    input.value = '';
                }
                clearFieldError(input);
            });
            clearErrors();
            clearCustomError(latInputGroup);
            clearCustomError(longInputGroup);
            clearFormStorage();
        });
    }

    // === LIVE VALIDATION ===
    const liveValidate = () => {
        [form.nama, form.domisili].forEach(input => {
            input.addEventListener('input', () => {
                if (input.value.trim() !== '' && isOnlyLetters(input.value)) clearFieldError(input);
            });
        });

        form.no_ktp.addEventListener('input', () => {
            if (form.no_ktp.value.trim() !== '' && isOnlyDigits(form.no_ktp.value) && form.no_ktp.value.length === 16)
                clearFieldError(form.no_ktp);
        });

        form.tgl_lahir.addEventListener('change', () => {
            if (form.tgl_lahir.value.trim() !== '' && isAtLeast17YearsOld(form.tgl_lahir.value))
                clearFieldError(form.tgl_lahir);
        });

        form.email.addEventListener('input', () => {
            if (form.email.value.trim() !== '' && isValidEmail(form.email.value)) clearFieldError(form.email);
        });

        form.no_hp.addEventListener('input', () => {
            if (form.no_hp.value.trim() !== '' && isOnlyDigits(form.no_hp.value)) clearFieldError(form.no_hp);
        });

        [
            form.jenis_kelamin, form.provinsi, form.kota, form.kecamatan, form.kelurahan,
            form.provinsi_mitra, form.kota_mitra, form.kecamatan_mitra, form.kelurahan_mitra
        ].forEach(select => {
            select.addEventListener('change', () => {
                if (select.value !== '') clearFieldError(select);
            });
        });

        [form.alamat_ktp, form.alamat].forEach(input => {
            input.addEventListener('input', () => {
                if (input.value.trim() !== '') clearFieldError(input);
            });
        });

        form.kode_pos.addEventListener('input', () => {
            if (form.kode_pos.value.trim() !== '' && isOnlyDigits(form.kode_pos.value) && form.kode_pos.value.length === 5)
                clearFieldError(form.kode_pos);
        });

        form.latitude.addEventListener('input', () => {
            if (form.latitude.value.trim() !== '' && isValidCoordinate(form.latitude.value))
                clearCustomError(latInputGroup);
        });

        form.longitude.addEventListener('input', () => {
            if (form.longitude.value.trim() !== '' && isValidCoordinate(form.longitude.value))
                clearCustomError(longInputGroup);
        });

        form.upload_ktp.addEventListener('change', () => {
            const file = form.upload_ktp.files[0];
            if (file && isValidFile(file, allowedTypes, 2)) clearFieldError(form.upload_ktp);
        });

        form.upload_foto.addEventListener('change', () => {
            const file = form.upload_foto.files[0];
            if (file && isValidFile(file, allowedTypes, 2)) clearFieldError(form.upload_foto);
        });
    };

    liveValidate();
});
