@extends('layouts.app')
@section('title')
    Detail Mitra
@endsection
@section('content')
    <x-page-title title="Mitra" subtitle="Detail Mitra" />

    <div class="row">
        <div class="col-12 col-lg-4 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="position-relative">
                        <img src="https://placehold.co/800x500/png" class="img-fluid rounded" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle">
                            <img src="https://placehold.co/110x110/png" width="100" height="100"
                                class="rounded-circle raised p-1 bg-white" alt="">
                        </div>
                    </div>
                    <div class="text-center mt-5 pt-4">
                        <h4 class="mb-1">Devi Fedrianingsih</h4>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-top">
                        <b>Alamat</b>
                        <br>
                        Jl. Dalurung Raya, Kota Bogor
                    </li>
                    <li class="list-group-item">
                        <b>Email</b>
                        <br>
                        devi@gmail.com
                    </li>
                    <li class="list-group-item">
                        <b>Telepon</b>
                        <br>
                        Fax (123) 472-796
                        <br>
                        Mobile : +12-34567890
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-8 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="mb-3">Lokasi Cabang Franchise</h5>
                    <hr>
                    <div class="card">
                        <div class="card-body" style="padding-top: 20px;">
                            <div id="marker-map" class="gmaps" style="z-index: 0;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div><!--end row-->

    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Pesanan<span class="fw-light ms-2">(98)</span></h5>
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle table-datatable"> <!-- Tambahkan class ini -->
                        <thead class="table-light">
                            <tr>
                                <th>Id Pesanan</th>
                                <th>Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Status Pesanan</th>
                                <th>Jenis Pembayaran</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:;">#2415</a>
                                </td>
                                <td>Rp200.000</td>
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
                                <td><span
                                    class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                                class="bi bi-info-circle ms-2"></i></span></td>
                                    <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                        class="bi bi-info-circle ms-2"></i></span></td>
                                    <td>Transfer Bank</td>
                                    <td>Nov 12, 10:45 WIB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="mb-3 fw-bold">Peringkat dan Ulasan<span class="fw-light ms-2">(96)</span></h5>
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Peringkat</th>
                                <th>Ulasan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:;" class="product-title">Paket Franchise Gerobak A</a>
                                </td>
                                <td>
                                    <div class="product-rating text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </td>
                                <td class="review-desc">Pengiriman sangat cepat, gerobak yang sampai bagus tanpa lecet sama sekali!</td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Selesai<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td>26 Juli 2024</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" class="product-title">Paket Franchise Gerobak B</a>
                                </td>
                                <td>
                                    <div class="product-rating text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </td>
                                <td class="review-desc">Barang sampai cepat dan packaging rapi. Terima kasih banyak!</td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td>18 Juli 2024</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" class="product-title">Paket Franchise Gerobak C</a>
                                </td>
                                <td>
                                    <div class="product-rating text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </td>
                                <td class="review-desc">Kualitas produk bagus dan sesuai deskripsi.</td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td>12 Juli 2024</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" class="product-title">Paket Franchise Gerobak D</a>
                                </td>
                                <td>
                                    <div class="product-rating text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </td>
                                <td class="review-desc">Pengiriman terlalu lama, namun barang sesuai deskripsi.</td>
                                <td><span
                                        class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Menunggu<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                <td>5 Juli 2024</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:;" class="product-title">Paket Franchise Gerobak E</a>
                                </td>
                                <td>
                                    <div class="product-rating text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </td>
                                <td class="review-desc">Barang cepat sampai dan kualitasnya bagus sekali.</td>
                                <td><span
                                        class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Selesai<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                <td>1 Juli 2024</td>
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
    
    <!-- plugin gmaps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async
        defer></script>
    <script src="{{ URL::asset('build/plugins/gmaps/map-custom-script.js') }}"></script>


    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta
            var map = L.map('marker-map').setView([-6.595038, 106.816635], 13); // Koordinat Kota Bogor
    
            // Tambahkan layer tile dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
    
            // Tambahkan marker untuk Jl. Dalurung Raya, Kota Bogor
            var markerDalurung = L.marker([-6.6063, 106.7976]).addTo(map)
                .bindPopup('<b> Franchise Cabang Jl. Dalurung Raya</b><br>Kota Bogor').openPopup();
    
            // Fungsi untuk mendapatkan lokasi saat ini dan menampilkan penanda bulat
            function onLocationFound(e) {
                var radius = e.accuracy;
                var currentLocation = e.latlng;
    
                L.circle(currentLocation, { radius: radius }).addTo(map)
                    .bindPopup("Lokasi Anda berada dalam " + radius + " meter dari titik ini").openPopup();
            }
    
            // Fungsi untuk menangani kesalahan dalam mendapatkan lokasi
            function onLocationError(e) {
                alert(e.message);
            }
    
            // Minta akses lokasi pengguna
            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);
    
            map.locate({setView: true, maxZoom: 16});
        });
    </script>
    
    <!-- Tambahkan link ke DataTables CSS dan JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // Inisialisasi DataTables untuk tabel "Pesanan"
            $('.table-datatable').DataTable({
                "pageLength": 10, // Mengatur jumlah entries yang ditampilkan
                "searching": true, // Mengaktifkan fitur pencarian
            });
        });
    </script>
@endpush
