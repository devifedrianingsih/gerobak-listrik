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
                                <th class="dt-no-sort">No</th>
                                <th>Kode Mitra</th>
                                <th>Nama</th>
                                <th>No KTP</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Alamat KTP</th>
                                <th>Domisili</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Provinsi Mitra</th>
                                <th>Kota Mitra</th>
                                <th>Kecamatan Mitra</th>
                                <th>Kelurahan Mitra</th>
                                <th>Kode Pos</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aktif</th>
                                <th class="text-center">Lihat Detail dan Edit</th>
                                <th class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mitra->isEmpty())
                                <tr>
                                    <td colspan="27" class="text-center">Tidak ada data mitra.</td>
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
                                        <td class="text-center align-middle">
                                            <form method="POST" action="{{ route('mitra.delete', ['id' => $mitr->id]) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus?');"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger d-flex justify-content-center align-items-center"
                                                        style="width: 38px; height: 38px; padding: 0;"
                                                        title="Hapus">
                                                    <i class="bx bx-trash fs-5 text-white m-0 p-0"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="uploadModal{{ $mitr->id }}" tabindex="-1"
                                        aria-labelledby="uploadModal{{ $mitr->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <form action="{{ route('mitra.update', ['id' => $mitr->id]) }}" method="POST" enctype="multipart/form-data">
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
                                                                <label for="ktp-{{ $mitr->id }}" class="d-block fs-5">
                                                                    KTP <br>
                                                                    <div class="position-relative d-inline-block upload-wrapper">
                                                                        <img src="{{ asset('storage/' . $mitr->upload_ktp) }}" alt="KTP"
                                                                            id="ktp-preview-{{ $mitr->id }}" width="200" class="rounded" style="cursor: pointer;">
                                                                        <div class="edit-icon">
                                                                            <i class="lni lni-pencil-alt"></i>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                <input type="file" name="ktp" class="d-none" id="ktp-{{ $mitr->id }}" accept="image/*">
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <label for="pas-{{ $mitr->id }}" class="d-block fs-5">
                                                                    Pas Foto <br>
                                                                    <div class="position-relative d-inline-block upload-wrapper">
                                                                        <img src="{{ asset('storage/' . $mitr->upload_foto) }}" alt="Pas foto"
                                                                            id="pas-preview-{{ $mitr->id }}" width="200" class="rounded" style="cursor: pointer;">
                                                                        <div class="edit-icon">
                                                                            <i class="lni lni-pencil-alt"></i>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                <input type="file" name="pas" class="d-none" id="pas-{{ $mitr->id }}" accept="image/*">
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
<style>
    .upload-wrapper {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .edit-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 10px;
        border-radius: 50%;
        display: none;
        z-index: 10;
        font-size: 18px;
        cursor: pointer;
    }

    .upload-wrapper:hover .edit-icon {
        display: block;
        cursor: pointer;
    }

    table thead th {
        text-transform: capitalize;
        font-weight: bold;
    }
    
    table td, table th {
        white-space: nowrap;
        font-size: 0.875rem;
    }
</style>


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
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Export ke Excel',
                        className: 'btn btn-success mb-3',
                        filename: 'Data_Mitra_' + new Date().toLocaleString('sv-SE').replace(/[: ]/g, '-'),
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9,
                                    10, 11, 12, 13, 14, 15, 16, 17,
                                    18, 19, 20, 21, 22, 23]
                        }
                    },
                    {
                        extend: 'colvis',
                        text: 'Tampilkan/Sembunyikan Kolom',
                        className: 'btn btn-secondary mb-3'
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: 0 }, // disable sort kolom No
                    {
                        targets: [3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
                        visible: false
                    }
                ],
                order: [[1, 'asc']], // default urut berdasarkan kolom kedua (Kode Mitra)
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
                },
                drawCallback: function(settings) {
                    var api = this.api();
                    var pageInfo = api.page.info();
                    api.column(0, { search: 'applied', order: 'applied', page: 'current' }).nodes().each(function(cell, i) {
                        cell.innerHTML = pageInfo.start + i + 1;
                    });
                }
            });
        });

        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function (e) {
                const targetId = this.id.replace('ktp-', 'ktp-preview-').replace('pas-', 'pas-preview-');
                previewImage(e, targetId);
            });
        });

        document.querySelectorAll('[id^="ktp-preview-"]').forEach(img => {
            img.addEventListener('click', function () {
                const id = this.id.split('ktp-preview-')[1];
            });
        });

        document.querySelectorAll('[id^="pas-preview-"]').forEach(img => {
            img.addEventListener('click', function () {
                const id = this.id.split('pas-preview-')[1];
            });
        });

        function previewImage(event, targetId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById(targetId).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
