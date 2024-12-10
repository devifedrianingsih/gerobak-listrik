@extends('layouts.app')
@section('title')
    Pesanan
@endsection
@section('content')

    <x-page-title title="Pesanan" subtitle="Daftar Pesanan" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $orders->count() }})</span></a>
        <a href="javascript:;"><span class="me-1">Menunggu</span><span class="text-secondary">({{ $orders->where('status', 'menunggu')->count() }})</span></a>
        <a href="javascript:;"><span class="me-1">Sudah diambil</span><span class="text-secondary">({{ $orders->where('status', 'sudah diambil')->count() }})</span></a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="position-relative">
            <input class="form-control px-5" id="searchInput" type="search" placeholder="Cari Pesanan">
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
                                <th>ID PESANAN</th>
                                <th>TANGGAL</th>
                                <th>NAMA</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>METODE PENGAMBILAN</th>
                                <th>STATUS PESANAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <a href="javascript:void(0)" class="view-order" data-id="{{ $order->id }}">
                                            {{ $order->order_id }}
                                        </a>
                                    </td>
                                    <td>{{ $order->tanggal ? \Carbon\Carbon::parse($order->tanggal)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ ucfirst($order->category) }}</td>
                                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td>{{ ucfirst($order->pickup_method) }}</td>
                                    <td>
                                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="form-select" onchange="this.form.submit()">
                                                <option value="menunggu" {{ $order->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                <option value="sudah diambil" {{ $order->status === 'sudah diambil' ? 'selected' : '' }}>Sudah diambil</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Detail Pesanan -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID Pesanan:</strong> <span id="orderId"></span></p>
                    <p><strong>Tanggal:</strong> <span id="tanggal"></span></p>
                    <p><strong>Nama:</strong> <span id="nama"></span></p>
                    <p><strong>Alamat:</strong> <span id="alamat"></span></p>
                    <p><strong>No Telepon:</strong> <span id="noTelepon"></span></p>
                    <p><strong>Kategori:</strong> <span id="kategori"></span></p>
                    <p><strong>Jenis Pembayaran:</strong> <span id="jenisPembayaran"></span></p>
                    <p><strong>Metode Pengambilan:</strong> <span id="metodePengambilan"></span></p>
                    <p><strong>Total Harga:</strong> <span id="totalHarga"></span></p>
                    <p><strong>Bukti Bayar:</strong> <a href="javascript:void(0)" id="lihatBukti" class="text-primary">Lihat Bukti</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Bukti Bayar -->
    <div class="modal fade" id="buktiBayarModal" tabindex="-1" aria-labelledby="buktiBayarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiBayarModalLabel">Bukti Bayar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="buktiBayarImage" src="" alt="Bukti Bayar" style="max-width: 100%; max-height: 400px;">
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
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".view-order").forEach(function (element) {
            element.addEventListener("click", function () {
                const orderId = this.getAttribute("data-id");

                fetch(`/order-detail/${orderId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("orderId").textContent = data.order_id || '-';
                        document.getElementById("tanggal").textContent = data.tanggal || '-';
                        document.getElementById("nama").textContent = data.name || '-';
                        document.getElementById("alamat").textContent = data.address || '-';
                        document.getElementById("noTelepon").textContent = data.phone || '-';
                        document.getElementById("kategori").textContent = capitalizeFirstLetter(data.category || '-');
                        document.getElementById("jenisPembayaran").textContent = data.payment_method ? data.payment_method.toUpperCase() : '-';
                        document.getElementById("metodePengambilan").textContent = capitalizeFirstLetter(data.pickup_method || '-');
                        document.getElementById("totalHarga").textContent = 'Rp ' + new Intl.NumberFormat().format(data.total || 0);

                        const lihatBukti = document.getElementById("lihatBukti");
                        lihatBukti.setAttribute("data-url", data.bukti_bayar_url || '#');

                        const modal = new bootstrap.Modal(document.getElementById("orderModal"));
                        modal.show();
                    })
                    .catch(error => {
                        console.error("Error fetching order detail:", error);
                        alert("Gagal mengambil detail pesanan.");
                    });
            });
        });

        document.getElementById("lihatBukti").addEventListener("click", function () {
            const buktiBayarUrl = this.getAttribute("data-url");

            if (buktiBayarUrl && buktiBayarUrl !== '#') {
                document.getElementById("buktiBayarImage").src = buktiBayarUrl;

                const buktiModal = new bootstrap.Modal(document.getElementById("buktiBayarModal"));
                buktiModal.show();
            } else {
                alert("Bukti bayar tidak tersedia.");
            }
        });
        
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
        }
    });
    
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