@extends('layouts.app')

@section('title')
    Daftar Calon Mitra
@endsection

@section('content')
    <x-page-title title="Calon Mitra" subtitle="Daftar Calon Mitra" />

    <div class="card mt-4">
        <div class="card-body">
            <div class="calon_mitra-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="calon_mitraTable">
                        <thead class="table-light">
                            <tr>
                                <th class="dt-no-sort">No</th>
                                <th>Waktu</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>Disetujui</th>
                                <th>Detail</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @if ($calonMitra->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data calon mitra.</td>
                                </tr>
                            @else
                                @foreach ($calonMitra as $key => $calon)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($calon->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $calon->nama }}</td>
                                        <td>{{ $calon->no_hp }}</td>
                                        <td>{{ $calon->alamat }}</td>                                        
                                        <td>{{ $calon->kota }}</td>      
                                        <td>{{ ucfirst($calon->status) }}</td>
                                        <td>{{ $calon->approvedBy->name ?? '-' }}</td>
                                        <td class="text-left fs-3">
                                            <i class="fadeIn animated lni lni-eye text-secondary"
                                                onmouseover="this.classList.replace('text-secondary', 'text-primary')"
                                                onmouseout="this.classList.replace('text-primary', 'text-secondary')"
                                                data-bs-toggle="modal" data-bs-target="#uploadModal{{ $calon->id }}"
                                                style="cursor: pointer">
                                            </i>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="uploadModal{{ $calon->id }}" tabindex="-1" aria-labelledby="uploadModal{{ $calon->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('calon-mitra.proses', $calon->id) }}" method="POST" id="prosesMitra{{ $calon->id }}">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="uploadModal{{ $calon->id }}Label">
                                                            Detail Mitra</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach ($fields as $field => $label)
                                                            @if ($field !== 'kode_mitra')
                                                                <div class="row">
                                                                    <label class="col-sm-3 col-form-label">{{ $label }}</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" readonly class="form-control-plaintext" value="{{ $calon->$field }}">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        
                                                        <div class="row text-center my-5">
                                                            <div class="col-lg-6 col-md-12">
                                                                <label for="KTP" class="d-block fs-5">KTP</label>
                                                                <img src="{{ asset('storage/' . $calon->upload_ktp) }}" alt="KTP" width="200">
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <label for="Pas Photo" class="d-block fs-5">Pas Foto</label>
                                                                <img src="{{ asset('storage/' . $calon->upload_foto) }}" alt="Pas foto" width="200">
                                                            </div>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input
                                                                @if ($calon->status == 'ditolak') disabled @endif
                                                                name="whatsapp"
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                id="sendToWhatsapp-{{ $calon->id }}"
                                                                value="1"
                                                            >
                                                            <label class="form-check-label" for="sendToWhatsapp-{{ $calon->id }}">Kirim notifikasi ke WhatsApp?</label>
                                                        </div>

                                                        <div class="form-floating">
                                                            <textarea
                                                                class="form-control catatan-field"
                                                                placeholder="Ketik catatan di sini"
                                                                id="catatan-{{ $calon->id }}"
                                                                name="catatan"
                                                                style="height: 150px"
                                                                disabled
                                                            >{{ $calon->catatan_approver }}</textarea>
                                                            <label for="catatan-{{ $calon->id }}">Catatan</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            class="btn btn-success btn-terima"
                                                            type="submit"
                                                            name="action"
                                                            value="diterima"
                                                            data-id="{{ $calon->id }}"
                                                            form="prosesMitra{{ $calon->id }}"
                                                        >
                                                            Terima
                                                        </button>
                                                        <!-- Tombol Tolak awal -->
                                                        <button
                                                            type="button"
                                                            class="btn btn-danger btn-show-konfirmasi"
                                                            data-id="{{ $calon->id }}"
                                                            id="btnTolak-{{ $calon->id }}"
                                                        >
                                                            Tolak
                                                        </button>

                                                        <!-- Tombol Konfirmasi Tolak (disembunyikan awalnya) -->
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger d-none"
                                                            name="action"
                                                            value="ditolak"
                                                            id="btnKonfirmasiTolak-{{ $calon->id }}"
                                                            form="prosesMitra{{ $calon->id }}"
                                                        >
                                                            Konfirmasi Tolak
                                                        </button>
                                                    </div>
                                                </form>
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

@push('style')
    <style>
        table thead th {
            text-transform: capitalize;
            font-weight: bold;
        }
        table td, table th {
            white-space: nowrap;
            font-size: 0.875rem;
        }
    </style>
@endpush

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
            var t = $('#calon_mitraTable').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 15, 20],
                columnDefs: [
                    { orderable: false, targets: 0 } // Disable sorting untuk kolom No
                ],
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
                    api.column(0, { search: 'applied', order: 'applied', page: 'current' })
                    .nodes()
                    .each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }
            });

            // Aktifkan/Nonaktifkan catatan saat tombol diklik
            $('.btn-tolak').on('click', function(e) {
                let id = $(this).data('id');
                $('#catatan-' + id).prop('disabled', false);
            });

            $('.btn-terima').on('click', function(e) {
                let id = $(this).data('id');
                $('#catatan-' + id).prop('disabled', true);
            });

            // Saat tombol Tolak diklik
            $('.btn-show-konfirmasi').on('click', function () {
                const id = $(this).data('id'); // Ambil ID calon

                // 1. Aktifkan textarea catatan
                $('#catatan-' + id).prop('disabled', false).focus();

                // 2. Sembunyikan tombol "Tolak"
                $('#btnTolak-' + id).addClass('d-none');

                // 3. Tampilkan tombol "Konfirmasi Tolak"
                $('#btnKonfirmasiTolak-' + id).removeClass('d-none');
            });
        });
    </script>
@endpush
