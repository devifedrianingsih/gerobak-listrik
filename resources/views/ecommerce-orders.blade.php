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
                                <th class="text-center">INVOICE</th>
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
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="view-invoice text-primary" data-id="{{ $order->id }}" title="Lihat Invoice">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>
                                    </td>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Styled Header -->
                <div class="modal-header border-bottom-0 py-3 bg-grd-info text-white">
                    <h5 class="modal-title" id="orderModalLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Data Pembeli -->
                    <h5 class="text-primary mb-3">Data Pembeli</h5>
                    <div class="mb-4">
                        <p><strong>ID Pesanan:</strong> <span id="orderId"></span></p>
                        <p><strong>Tanggal:</strong> <span id="tanggal"></span></p>
                        <p><strong>Nama:</strong> <span id="nama"></span></p>
                        <p><strong>Alamat:</strong> <span id="alamat"></span></p>
                        <p><strong>No Telepon:</strong> <span id="noTelepon"></span></p>
                        <p><strong>Kategori:</strong> <span id="kategori"></span></p><hr>
                    </div>

                    <!-- Produk -->
                    <h5 class="text-primary mb-3">Produk</h5>
                    <div id="produkList" class="mb-4">
                        <!-- Produk akan ditambahkan di sini -->
                    </div>
                    <p><strong>Total Harga:</strong> <span id="totalHarga" class="text-danger fw-bold"></span></p><hr>

                    <!-- Pembayaran dan Pengambilan -->
                    <h5 class="text-primary mb-3">Pembayaran dan Pengambilan</h5>
                    <p><strong>Jenis Pembayaran:</strong> <span id="jenisPembayaran"></span></p>
                    <p><strong>Metode Pengambilan:</strong> <span id="metodePengambilan"></span></p>
                    <p><strong>Bukti Bayar:</strong> <a href="javascript:void(0)" id="lihatBukti" class="text-primary">Lihat Bukti</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Bukti Bayar -->
    <div class="modal fade" id="buktiBayarModal" tabindex="-1" aria-labelledby="buktiBayarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Styled Header -->
                <div class="modal-header border-bottom-0 py-3 bg-grd-info text-white">
                    <h5 class="modal-title" id="buktiBayarModalLabel">Bukti Bayar</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="buktiBayarImage" src="" alt="Bukti Bayar" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Invoice -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Body -->
                <div class="modal-body" id="invoiceContent">
                    <!-- Konten faktur dimuat lewat AJAX -->
                </div>
                <!-- Footer dengan Tombol Print -->
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-primary" onclick="printInvoice()">Print <i class="bi bi-printer"></i></button>
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
                    .then((response) => response.json())
                    .then((data) => {
                        // Populate basic order information
                        document.getElementById("orderId").textContent = data.order_id || "-";
                        document.getElementById("tanggal").textContent = data.tanggal || "-";
                        document.getElementById("nama").textContent = data.name || "-";
                        document.getElementById("alamat").textContent = data.address || "-";
                        document.getElementById("noTelepon").textContent = data.phone || "-";
                        document.getElementById("kategori").textContent = capitalizeFirstLetter(data.category || "-");
                        document.getElementById("jenisPembayaran").textContent = data.payment_method
                            ? data.payment_method.toUpperCase()
                            : "-";
                        document.getElementById("metodePengambilan").textContent = capitalizeFirstLetter(
                            data.pickup_method || "-"
                        );
                        document.getElementById("totalHarga").textContent =
                            "Rp " + new Intl.NumberFormat("id-ID").format(data.total || 0);

                        // Populate product list with numbering
                        const produkList = document.getElementById("produkList");
                        produkList.innerHTML = ""; // Clear previous content

                        if (data.produk && data.produk.length > 0) {
                            data.produk.forEach((produk, index) => {
                                const produkElement = document.createElement("div");
                                produkElement.classList.add("mb-3");

                                produkElement.innerHTML = `
                                    <p><strong>Nomor:</strong> ${index + 1}</p>
                                    <p><strong>Nama Produk:</strong> ${produk.nama_produk}</p>
                                    <p><strong>Kuantitas:</strong> ${produk.kuantitas}</p>
                                    <p><strong>Harga Produk:</strong> Rp ${new Intl.NumberFormat("id-ID").format(produk.harga_produk)}</p>
                                    <hr>
                                `;
                                produkList.appendChild(produkElement);
                            });
                        } else {
                            produkList.innerHTML = "<p>Data produk tidak tersedia.</p>";
                        }

                        // Handle Bukti Bayar
                        const lihatBukti = document.getElementById("lihatBukti");
                        lihatBukti.setAttribute("data-url", data.bukti_bayar_url || "#");

                        const modal = new bootstrap.Modal(document.getElementById("orderModal"));
                        modal.show();
                    })
                    .catch((error) => {
                        console.error("Error fetching order detail:", error);
                        alert("Gagal mengambil detail pesanan.");
                    });
            });
        });

        // Handle Bukti Bayar modal display
        document.getElementById("lihatBukti").addEventListener("click", function () {
            const buktiBayarUrl = this.getAttribute("data-url");

            if (buktiBayarUrl && buktiBayarUrl !== "#") {
                document.getElementById("buktiBayarImage").src = buktiBayarUrl;

                const buktiModal = new bootstrap.Modal(document.getElementById("buktiBayarModal"));
                buktiModal.show();
            } else {
                alert("Bukti bayar tidak tersedia.");
            }
        });

        // Capitalize the first letter of strings
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Load Invoice Modal
        document.querySelectorAll(".view-invoice").forEach(function (element) {
            element.addEventListener("click", function () {
                const orderId = this.getAttribute("data-id");

                fetch(`/order-invoice/${orderId}`)
                    .then(response => response.json())
                    .then(data => {
                        const invoiceContent = `
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Gerobak Listrik Angkringan</strong><br>
                                    Jl. Yasmin Raya No.16A<br>
                                    Kota Bogor, 16113<br>
                                    Phone: (123) 456-7890
                                </div>
                                <div class="col-md-6 text-end">
                                    <strong>Invoice ID</strong><br>
                                    <b>${data.order_id}</b><br>
                                    Tanggal: ${data.tanggal}
                                </div>
                            </div>
                            <hr>
                            <h5>Detail Produk</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${data.produk.map(produk => `
                                        <tr>
                                            <td>${produk.nama_produk}</td>
                                            <td>${produk.kuantitas}</td>
                                            <td>Rp ${new Intl.NumberFormat('id-ID').format(produk.harga_produk)}</td>
                                            <td>Rp ${new Intl.NumberFormat('id-ID').format(produk.total_harga)}</td>
                                        </tr>`).join('')}
                                </tbody>
                            </table>
                            <hr>
                            <h5 class="text-end">Total: Rp ${new Intl.NumberFormat('id-ID').format(data.total)}</h5>
                        `;
                        document.getElementById("invoiceContent").innerHTML = invoiceContent;

                        const invoiceModal = new bootstrap.Modal(document.getElementById("invoiceModal"));
                        invoiceModal.show();
                    })
                    .catch(error => {
                        console.error("Error loading invoice:", error);
                        alert("Gagal memuat invoice.");
                    });
            });
        });
    });

    // Fungsi Print Invoice
    function printInvoice() {
        const printContents = document.getElementById('invoiceContent').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        window.location.reload();
    }

</script>
@endpush
