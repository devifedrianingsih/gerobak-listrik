@extends('layouts.app')
@section('title')
    Pesanan
@endsection
@section('content')

    <x-page-title title="Pesanan" subtitle="Daftar Pesanan" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">(85472)</span></a>
        <a href="javascript:;"><span class="me-1">Menunggu Pembayaran</span><span class="text-secondary">(86)</span></a>
        <a href="javascript:;"><span class="me-1">Belum Selesai</span><span class="text-secondary">(76)</span></a>
        <a href="javascript:;"><span class="me-1">Selesai</span><span class="text-secondary">(8759)</span></a>
        <a href="javascript:;"><span class="me-1">Pengembalian</span><span class="text-secondary">(769)</span></a>
        <a href="javascript:;"><span class="me-1">Gagal</span><span class="text-secondary">(42)</span></a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="position-relative">
            <input class="form-control px-5" id="searchInput" type="search" placeholder="Cari Produk">
            <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
        </div>
        <div>
            <label for="entriesCount">Show </label>
            <select id="entriesCount" class="form-select d-inline-block w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <label> entries</label>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="orderTable">
                        <thead class="table-light">
                            <tr>
                                <th onclick="sortTable(0)">Id Pesanan</th>
                                <th onclick="sortTable(1)">Harga</th>
                                <th onclick="sortTable(2)">Pembeli</th>
                                <th onclick="sortTable(3)">Status Pembayaran</th>
                                <th onclick="sortTable(4)">Status Pesanan</th>
                                <th onclick="sortTable(5)">Jenis Pembayaran</th>
                                <th onclick="sortTable(6)">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:;">#2415</a>
                                </td>
                                <td>Rp200.000</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <div class="customer-pic">
                                            <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 customer-name fw-bold">Shereen Alen</p>
                                    </a>
                                </td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Dalam Perjalanan<i
                                    class="bi bi-info-circle ms-2"></i></span></td>
                                <td>Bayar di Tempat</td>
                                <td>Nov 12, 10:45 WIB</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;">#7845</a>
                                </td>
                                <td>Rp110.000</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <div class="customer-pic">
                                            <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 customer-name fw-bold">Devi Fedrianingsih</p>
                                    </a>
                                </td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                    class="bi bi-info-circle ms-2"></i></span></td>
                                <td>Transfer Bank</td>
                                <td>Nov 12, 10:45 WIB</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;">#5674</a>
                                </td>
                                <td>Rp90.000</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <div class="customer-pic">
                                            <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 customer-name fw-bold">Meilani Jesica</p>
                                    </a>
                                </td>
                                <td><span
                                    class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                    class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                        class="bi bi-check2 ms-2"></i></span></td>
                                <td>Bayar di Tempat</td>
                                <td>Nov 12, 10:45 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;">#2415</a>
                                        </td>
                                        <td>Rp200.000</td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="javascript:;">
                                                <div class="customer-pic">
                                                    <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                        width="40" height="40" alt="">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">Shereen Alen</p>
                                            </a>
                                        </td>
                                        <td><span
                                                class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                                    class="bi bi-check2 ms-2"></i></span></td>
                                        <td><span
                                            class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Dalam Perjalanan<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                        <td>Bayar di Tempat</td>
                                        <td>Nov 12, 10:45 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;">#7845</a>
                                        </td>
                                        <td>Rp110.000</td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="javascript:;">
                                                <div class="customer-pic">
                                                    <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                        width="40" height="40" alt="">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">Devi Fedrianingsih</p>
                                            </a>
                                        </td>
                                        <td><span
                                                class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                                    class="bi bi-info-circle ms-2"></i></span></td>
                                        <td><span
                                            class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                        <td>Transfer Bank</td>
                                        <td>Nov 12, 10:45 WIB</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;">#5674</a>
                                        </td>
                                        <td>Rp90.000</td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="javascript:;">
                                                <div class="customer-pic">
                                                    <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                        width="40" height="40" alt="">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">Meilani Jesica</p>
                                            </a>
                                        </td>
                                        <td><span
                                            class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                        class="bi bi-check2 ms-2"></i></span></td>
                                <td>Bayar di Tempat</td>
                                <td>Nov 12, 10:45 WIB</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;">#2415</a>
                                </td>
                                <td>Rp200.000</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <div class="customer-pic">
                                            <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 customer-name fw-bold">Shereen Alen</p>
                                    </a>
                                </td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Dalam Perjalanan<i
                                    class="bi bi-info-circle ms-2"></i></span></td>
                                <td>Bayar di Tempat</td>
                                <td>Nov 12, 10:45 WIB</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;">#7845</a>
                                </td>
                                <td>Rp110.000</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <div class="customer-pic">
                                            <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 customer-name fw-bold">Devi Fedrianingsih</p>
                                    </a>
                                </td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                    class="bi bi-info-circle ms-2"></i></span></td>
                                <td>Transfer Bank</td>
                                <td>Nov 12, 10:45 WIB</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;">#5674</a>
                                </td>
                                <td>Rp90.000</td>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <div class="customer-pic">
                                            <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                                width="40" height="40" alt="">
                                        </div>
                                        <p class="mb-0 customer-name fw-bold">Meilani Jesica</p>
                                    </a>
                                </td>
                                <td><span
                                    class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                    class="bi bi-check2 ms-2"></i></span></td>
                                <td><span
                                    class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Berhasil<i
                                        class="bi bi-check2 ms-2"></i></span></td>
                                <td>Bayar di Tempat</td>
                                <td>Nov 12, 10:45 WIB</td>
                            </tr>
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

<script>
    document.getElementById('entriesCount').addEventListener('change', function() {
        var select, entriesCount, table, tr;
        select = document.getElementById("entriesCount");
        entriesCount = parseInt(select.value);
        table = document.getElementById("orderTable");
        tr = table.getElementsByTagName("tr");

        // Hide all rows initially
        for (var i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
        }

        // Show only the first 'entriesCount' rows
        for (var i = 1; i <= entriesCount && i < tr.length; i++) {
            tr[i].style.display = "";
        }
    });

    // Initialize with the default value
    document.getElementById('entriesCount').dispatchEvent(new Event('change'));

    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input, filter, table, tr, td, i, txtValue, visibleCount = 0, entriesCount;
        input = document.getElementById("searchInput");
        filter = input.value.toLowerCase();
        table = document.getElementById("orderTable");
        tr = table.getElementsByTagName("tr");
        entriesCount = parseInt(document.getElementById("entriesCount").value);

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        if (visibleCount < entriesCount) {
                            tr[i].style.display = "";
                            visibleCount++;
                        }
                        break;
                    }
                }
            }
        }
    });

    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("orderTable");
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
</script>
@endpush
