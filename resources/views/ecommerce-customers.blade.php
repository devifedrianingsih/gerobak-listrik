@extends('layouts.app')
@section('title')
    Pelanggan
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Pelanggan" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $customers->count() }})</span></a>
        <a href="javascript:;"><span class="me-1">Baru</span><span class="text-secondary">(145)</span></a>
        <a href="javascript:;"><span class="me-1">Dibeli</span><span class="text-secondary">(89)</span></a>
    </div>

    <div class="row g-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <!-- Search input di kiri -->
            <div class="position-relative">
                <input id="searchInput" class="form-control px-5" type="search" placeholder="Cari Pelanggan">
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
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th onclick="sortTable(0)">Pelanggan</th>
                                <th onclick="sortTable(1)">Email</th>
                                <th onclick="sortTable(2)">Pesanan</th>
                                <th onclick="sortTable(3)">Total</th>
                                <th onclick="sortTable(4)">Lokasi</th>
                                <th onclick="sortTable(5)">Terakhir Terlihat</th>
                                <th onclick="sortTable(6)">Terakhir Membeli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>
                                        <a class="d-flex align-items-center gap-3" href="javascript:;">
                                            <div class="customer-pic">
                                                <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                    width="40" height="40" alt="Customer Image">
                                            </div>
                                            <p class="mb-0 customer-name fw-bold">{{ $customer->CustomerName }}</p>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $customer->CustomerEmail }}" class="font-text1">{{ $customer->CustomerEmail }}</a>
                                    </td>
                                    <td>{{ $customer->orders->count() }}</td>
                                    <td>{{ number_format($customer->orders->sum('total'), 0, ',', '.') }}k</td>
                                    <td>{{ $customer->CustomerAddress }}</td>
                                    <td>{{ $customer->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if($customer->orders->isNotEmpty())
                                            {{ $customer->orders->last()->created_at->format('M d, H:i T') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
            table = document.getElementById('customerTable');
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
            table = document.getElementById("customerTable");
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
            table = document.getElementById('customerTable');
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
