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
                                <th>No</th>
                                <th>Kode Mitra</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Kota</th>
                                <th>Alamat</th>
                                <th class="text-center">Lihat Detail</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
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
                                        <td>{{ $calon->kode_mitra }}</td>
                                        <td>{{ $calon->nama }}</td>
                                        <td>{{ $calon->email }}</td>
                                        <td>{{ $calon->no_hp }}</td>
                                        <td>{{ $calon->kota }}</td>
                                        <td>{{ $calon->alamat }}</td>
                                        <td class="text-center fs-3">
                                            <i class="fadeIn animated lni lni-eye text-secondary"
                                                onmouseover="this.classList.replace('text-secondary', 'text-primary')"
                                                onmouseout="this.classList.replace('text-primary', 'text-secondary')"
                                                data-bs-toggle="modal" data-bs-target="#uploadModal{{ $calon->id }}"
                                                style="cursor: pointer">
                                            </i>
                                        </td>
                                        <td class="text-center">{{ ucfirst($calon->status) }}</td>

                                        @if ($calon->status != 'ditolak')
                                            <td class="text-center">
                                                <form id="formTerima" action="{{ route('calon-mitra.terima', $calon->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success"
                                                        {{ $calon->status === 'terima' ? 'disabled' : '' }}
                                                        onclick="return confirm('Yakin ingin menerima calon mitra ini?')"><i
                                                            class="lni lni-checkmark"></i></button>
                                                </form>
                                                <form id="formTolak" action="{{ route('calon-mitra.tolak', $calon->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin ingin menolak calon mitra ini?')"><i
                                                            class="lni lni-close"></i></button>
                                                </form>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <button type="submit" class="btn btn-success" disabled><i class="lni lni-checkmark"></i></button>
                                                <button type="submit" class="btn btn-danger" disabled><i class="lni lni-close"></i></button>
                                            </td>
                                        @endif
                                    </tr>

                                    <div class="modal fade" id="uploadModal{{ $calon->id }}" tabindex="-1"
                                        aria-labelledby="uploadModal{{ $calon->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="uploadModal{{ $calon->id }}Label">
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
                                                                    value="{{ $calon->$field }}">
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="row text-center my-5">
                                                        <div class="col-lg-6 col-md-12">
                                                            <label for="KTP" class="d-block fs-5">KTP</label>
                                                            <img src="{{ asset('storage/' . $calon->upload_ktp) }}"
                                                                alt="KTP" width="200">
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <label for="Pas Photo" class="d-block fs-5">Pas Foto</label>
                                                            <img src="{{ asset('storage/' . $calon->upload_foto) }}"
                                                                alt="Pas foto" width="200">
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input @if ($calon->status == 'ditolak') disabled @endif name="whatsapp" class="form-check-input" type="checkbox" id="sendToWhatsapp" value="1">
                                                        <label class="form-check-label" for="sendToWhatsapp">Kirim notifikasi ke WhatsApp?</label>
                                                    </div>

                                                    <div class="form-floating">
                                                        <textarea @if ($calon->status == 'ditolak') disabled @endif class="form-control" placeholder="Ketik catatan di sini" id="catatan" name="catatan" style="height: 150px">{{ $calon->catatan_approver }}</textarea>
                                                        <label for="catatan">Catatan</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="formTolak" action="{{ route('calon-mitra.tolak', $calon->id) }}" method="POST" style="display:inline; margin: 0;">
                                                        @csrf
                                                        <input type="hidden" name="whatsapp">
                                                        <input type="hidden" name="catatan_approver">
                                                        <button @if ($calon->status == 'ditolak') disabled @endif type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak calon mitra ini?')">Tolak</button>
                                                    </form>
                                                    <form id="formTerima" action="{{ route('calon-mitra.terima', $calon->id) }}" method="POST" style="display:inline; margin: 0;">
                                                        @csrf
                                                        <input type="hidden" name="whatsapp">
                                                        <input type="hidden" name="catatan_approver">
                                                        <button @if ($calon->status == 'ditolak') disabled @endif type="submit" class="btn btn-success" {{ $calon->status === 'terima' ? 'disabled' : '' }} onclick="return confirm('Yakin ingin menerima calon mitra ini?')">Terima</button>
                                                    </form>
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
            $('#calon_mitraTable').DataTable({
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const catatan = document.getElementById("catatan");
            const catatanApprovers = document.querySelectorAll("input[name='catatan_approver']");

            const checkbox = document.getElementById("sendToWhatsapp");
            const whatsappInputs = document.querySelectorAll("input[name='whatsapp']");

            // Mirror textarea ke input catatan_approver
            catatan.addEventListener("input", function () {
                catatanApprovers.forEach(input => {
                    input.value = catatan.value;
                });
            });

            // Mirror checkbox ke input whatsapp
            checkbox.addEventListener("change", function () {
                whatsappInputs.forEach(input => {
                    input.value = checkbox.checked ? "1" : "";
                });
            });

            // Set initial value waktu load halaman
            catatanApprovers.forEach(input => {
                input.value = catatan.value;
            });

            whatsappInputs.forEach(input => {
                input.value = checkbox.checked ? "1" : "";
            });
        });
    </script>

    <!-- JavaScript untuk fitur pencarian, sort, dan show entries -->
    {{-- <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('calon_mitraTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = 'none';

                td = tr[i].getElementsByTagName('td');
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = '';
                            break;
                        }
                    }
                }
            }
        });

        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("calon_mitraTable");
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        document.getElementById('entriesCount').addEventListener('change', function() {
            var selectedValue, table, tr, i;
            selectedValue = parseInt(this.value);
            table = document.getElementById('calon_mitraTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = '';
            }

            for (i = selectedValue + 1; i < tr.length; i++) {
                tr[i].style.display = 'none';
            }
        });

        document.getElementById('entriesCount').dispatchEvent(new Event('change'));
    </script> --}}
@endpush
