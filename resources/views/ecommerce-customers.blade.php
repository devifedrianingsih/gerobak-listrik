@extends('layouts.app')
@section('title')
    Mitra
@endsection
@section('content')
    <x-page-title title="Mitra" subtitle="Daftar Mitra" />

    <div class="card mt-4">
        <div class="card-body">
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="mitraTable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Mitra</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Kota</th>
                                <th>Alamat</th>
                                <th class="text-center">Lihat Detail</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mitra->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data mitr mitra.</td>
                                </tr>
                            @else
                                @foreach ($mitra as $key => $mitr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $mitr->kode_mitra }}</td>
                                        <td>{{ $mitr->nama }}</td>
                                        <td>{{ $mitr->email }}</td>
                                        <td>{{ $mitr->no_hp }}</td>
                                        <td>{{ $mitr->kota }}</td>
                                        <td>{{ $mitr->alamat }}</td>
                                        <td class="text-center fs-3">
                                            <i class="fadeIn animated lni lni-eye text-secondary"
                                                onmouseover="this.classList.replace('text-secondary', 'text-primary')"
                                                onmouseout="this.classList.replace('text-primary', 'text-secondary')"
                                                data-bs-toggle="modal" data-bs-target="#uploadModal{{ $mitr->id }}"
                                                style="cursor: pointer">
                                            </i>
                                        </td>
                                        <td class="text-center">{{ ucfirst($mitr->status) }}</td>
                                        <td class="text-center">{{ ucwords(str_replace('-', ' ', $mitr->aktif)) }}</td>
                                    </tr>

                                    <div class="modal fade" id="uploadModal{{ $mitr->id }}" tabindex="-1"
                                        aria-labelledby="uploadModal{{ $mitr->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="uploadModal{{ $mitr->id }}Label">
                                                        KTP dan Pas Foto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @php
                                                        $fields = [
                                                            'kode_mitra' => 'Kode Mitra',
                                                            'nama' => 'Nama Lengkap',
                                                            'no_ktp' => 'No KTP',
                                                            'tanggal_lahir' => 'Tanggal Lahir',
                                                            'email' => 'Email',
                                                            'no_hp' => 'No HP',
                                                            'jenis_kelamin' => 'Jenis Kelamin',
                                                            'alamat' => 'Alamat',
                                                            'alamat_ktp' => 'Alamat KTP',
                                                            'domisili' => 'Domisili',
                                                            'provinsi' => 'Provinsi',
                                                            'kota' => 'Kota',
                                                            'kecamatan' => 'Kecamatan',
                                                            'kelurahan' => 'Kelurahan',
                                                            'provinsi_mitra' => 'Provinsi Mitra',
                                                            'kota_mitra' => 'Kota Mitra',
                                                            'kecamatan_mitra' => 'Kecamatan Mitra',
                                                            'kelurahan_mitra' => 'Kelurahan Mitra',
                                                            'kode_pos' => 'Kode Pos',
                                                            'latitude' => 'Latitude',
                                                            'longitude' => 'Longitude',
                                                        ];
                                                    @endphp

                                                    @foreach ($fields as $field => $label)
                                                        <div class="row">
                                                            <label
                                                                class="col-sm-3 col-form-label">{{ $label }}</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly
                                                                    class="form-control-plaintext"
                                                                    value="{{ $mitr->$field }}">
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="row text-center my-5">
                                                        <div class="col-lg-6 col-md-12">
                                                            <label for="KTP" class="d-block fs-5">KTP</label>
                                                            <img src="{{ asset('storage/' . $mitr->upload_ktp) }}"
                                                                alt="KTP" width="200">
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <label for="Pas Photo" class="d-block fs-5">Pas Foto</label>
                                                            <img src="{{ asset('storage/' . $mitr->upload_foto) }}"
                                                                alt="Pas foto" width="200">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>

    <!-- DataTables with Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mitraTable').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 15, 20],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "→",
                        previous: "←"
                    },
                    zeroRecords: "Data tidak ditemukan",
                }
            });
        });
    </script>

    <!-- JavaScript -->
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            let isEditing = false;

            // Tombol Edit
            document.getElementById("editButton").addEventListener("click", function() {
                isEditing = !isEditing;
                const inputs = document.querySelectorAll(
                    "#mitraForm input, #mitraForm textarea, #mitraForm select");
                inputs.forEach(input => input.readOnly = !isEditing);

                document.getElementById("jenisKelamin").disabled = !isEditing;
                document.getElementById("saveButton").disabled = !isEditing;
            });

            // Tombol Simpan
            document.getElementById("mitraForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const mitraNomor = document.querySelector(".view-mitra[data-nomor]").getAttribute(
                    "data-nomor");

                fetch(`/ecommerce-potential-partners/update/${mitraNomor}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Gagal menyimpan data.");
                        return response.json();
                    })
                    .then(data => {
                        alert("Data berhasil disimpan.");
                        location.reload();
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Terjadi kesalahan saat menyimpan data.");
                    });
            });

            // Tombol View Mitra
            document.querySelectorAll(".view-mitra").forEach(element => {
                element.addEventListener("click", function() {
                    const mitraNomor = this.getAttribute("data-nomor");

                    fetch(`/ecommerce-potential-partners/${mitraNomor}`)
                        .then(response => {
                            if (!response.ok) throw new Error("Gagal mengambil data mitra");
                            return response.json();
                        })
                        .then(data => {
                            document.getElementById("namaLengkap").value = data
                                .nama_calon_mitra || "";
                            document.getElementById("tanggalLahir").value = data
                                .tanggal_lahir || "";
                            document.getElementById("email").value = data.email_calon_mitra ||
                                "";
                            document.getElementById("nomorHandphone").value = data
                                .no_hp_calon_mitra || "";
                            document.getElementById("jenisKelamin").value = data
                                .jenis_kelamin || "Wanita";
                            document.getElementById("domisili").value = data.domisili || "";
                            document.getElementById("alamatLengkap").value = data
                                .alamat_calon_mitra || "";
                            document.getElementById("kota").value = data.kota_calon_mitra || "";
                            document.getElementById("provinsi").value = data.provinsi || "";
                            document.getElementById("kodePos").value = data.kode_pos || "";
                            document.getElementById("negara").value = data.negara || "";
                            document.getElementById("latitude").value = data.latitude || "";
                            document.getElementById("longitude").value = data.longitude || "";

                            const formModal = new bootstrap.Modal(document.getElementById(
                                "FormModal"));
                            formModal.show();
                        })
                        .catch(error => {
                            console.error("Error fetching mitra data:", error);
                            alert("Gagal mengambil data mitra.");
                        });
                });
            });
        });
    </script> --}}
@endpush
