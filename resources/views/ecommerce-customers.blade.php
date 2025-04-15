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
                                <td>Kode Mitra</td>
                                <td>Nama</td>
                                <td>No KTP</td>
                                <td>Tanggal Lahir</td>
                                <td>Email</td>
                                <td>No HP</td>
                                <td>Jenis Kelamin</td>
                                <td>Alamat</td>
                                <td>Alamat KTP</td>
                                <td>Domisili</td>
                                <td>Provinsi</td>
                                <td>Kota</td>
                                <td>Kecamatan</td>
                                <td>Kelurahan</td>
                                <td>Provinsi Mitra</td>
                                <td>Kota Mitra</td>
                                <td>Kecamatan Mitra</td>
                                <td>Kelurahan Mitra</td>
                                <td>Kode Pos</td>
                                <td>Latidue</td>
                                <td>Longitude</td>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aktif</th>
                                <th class="text-center">Lihat Detail dan Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mitra->isEmpty())
                                <tr>
                                    <td colspan="25" class="text-center">Tidak ada data mitra.</td>
                                </tr>
                            @else
                                @foreach ($mitra as $key => $mitr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $mitr->kode_mitra }} </td>
                                        <td>{{ $mitr->nama }} </td>
                                        <td>{{ $mitr->no_ktp }} </td>
                                        <td>{{ $mitr->tanggal_lahir }} </td>
                                        <td>{{ $mitr->email }} </td>
                                        <td>{{ $mitr->no_hp }} </td>
                                        <td>{{ $mitr->jenis_kelamin }} </td>
                                        <td>{{ $mitr->alamat }} </td>
                                        <td>{{ $mitr->alamat_ktp }} </td>
                                        <td>{{ $mitr->domisili }} </td>
                                        <td>{{ $mitr->provinsi }} </td>
                                        <td>{{ $mitr->kota }} </td>
                                        <td>{{ $mitr->kecamatan }} </td>
                                        <td>{{ $mitr->kelurahan }} </td>
                                        <td>{{ $mitr->provinsi_mitra }} </td>
                                        <td>{{ $mitr->kota_mitra }} </td>
                                        <td>{{ $mitr->kecamatan_mitra }} </td>
                                        <td>{{ $mitr->kelurahan_mitra }} </td>
                                        <td>{{ $mitr->kode_pos }} </td>
                                        <td>{{ $mitr->latitude }} </td>
                                        <td>{{ $mitr->longitude }} </td>
                                        <td class="text-center">{{ ucfirst($mitr->status) }}</td>
                                        <td class="text-center">{{ ucwords(str_replace('-', ' ', $mitr->aktif)) }}</td>
                                        <td class="text-center fs-3">
                                            <i class="fadeIn animated lni lni-eye text-secondary"
                                                onmouseover="this.classList.replace('text-secondary', 'text-primary')"
                                                onmouseout="this.classList.replace('text-primary', 'text-secondary')"
                                                data-bs-toggle="modal" data-bs-target="#uploadModal{{ $mitr->id }}"
                                                style="cursor: pointer">
                                            </i>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="uploadModal{{ $mitr->id }}" tabindex="-1"
                                        aria-labelledby="uploadModal{{ $mitr->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <form action="{{ route('mitra.update', ['id' => $mitr->id]) }}" method="POST">
                                                @csrf @method('POST')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="uploadModal{{ $mitr->id }}Label">
                                                            Detail Mitra</h1>
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
                                                            <div class="row mb-2">
                                                                <label
                                                                    class="col-sm-3 col-form-label">{{ $label }}</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        @if ($label == 'Kode Mitra') disabled @endif
                                                                        class="form-control"
                                                                        name="{{ str_replace(' ', '_', strtolower($field)) }}"
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
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS + Bootstrap5 adapter -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Buttons extension -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    <!-- JSZip untuk Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mitraTable').DataTable({
                dom: "<'row mb-3'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Export ke Excel',
                        className: 'btn btn-success mb-3',
                        exportOptions: {
                            columns: [
                                0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
                                10, 11, 12, 13, 14, 15, 16, 17,
                                18, 19, 20, 21, 22, 23
                            ]
                        }
                    },
                    {
                        extend: 'colvis',
                        text: 'Tampilkan/Sembunyikan Kolom',
                        className: 'btn btn-secondary mb-3'
                    }
                ],
                columnDefs: [{
                        targets: [3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
                            23
                        ],
                        visible: false
                    } // kolom disembunyikan
                ],
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
