@extends('layouts.app')

@section('title')
    Daftar Calon Mitra
@endsection

@section('content')
    <x-page-title title="Calon Mitra" subtitle="Daftar Calon Mitra" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $calonMitra->count() }})</span></a>
    </div>

    <div class="row g-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <!-- Search input di kiri -->
            <div class="position-relative">
                <input id="searchInput" class="form-control px-5" type="search" placeholder="Cari Calon Mitra">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
            <!-- Dropdown Show entries di kanan -->
            <div>
                <label for="entriesCount">Show</label>
                <select id="entriesCount" class="form-select d-inline-block" style="width: auto;">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <label for="entriesCount">entries</label>
            </div>
        </div>
    </div><!--end row-->

    <div class="card mt-4">
        <div class="card-body">
            <div class="calon_mitra-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="calon_mitraTable">
                        <thead class="table-light">
                            <tr>
                                <th>NO</th>
                                <th>NAMA CALON MITRA</th>
                                <th>EMAIL CALON MITRA</th>
                                <th>NO HP CALON MITRA</th>
                                <th>KOTA CALON MITRA</th>
                                <th>ALAMAT CALON MITRA</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($calonMitra->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data calon mitra.</td>
                                </tr>
                            @else
                                @foreach($calonMitra as $key => $calon)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $calon->nama_calon_mitra }}</td>
                                        <td>{{ $calon->email_calon_mitra }}</td>
                                        <td>{{ $calon->no_hp_calon_mitra }}</td>
                                        <td>{{ $calon->kota_calon_mitra }}</td>
                                        <td>{{ $calon->alamat_calon_mitra }}</td>
                                        <td>{{ ucfirst($calon->status) }}</td>
                                        <td>
                                            <form action="{{ route('calon-mitra.terima', $calon->nomor) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success" {{ $calon->status === 'terima' ? 'disabled' : '' }} onclick="return confirm('Yakin ingin menerima calon mitra ini?')"><i class="lni lni-checkmark"></i></button>
                                            </form>
                                            <form action="{{ route('calon-mitra.tolak', $calon->nomor) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak calon mitra ini?')"><i class="lni lni-close"></i></button>
                                            </form>
                                        </td>
                                    </tr>
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

    <!-- JavaScript untuk fitur pencarian, sort, dan show entries -->
    <script>
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
    </script>
@endpush

