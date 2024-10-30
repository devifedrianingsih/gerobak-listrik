@extends('layouts.app')
@section('title')
    Peta Sebaran Cabang
@endsection
@section('content')
    <x-page-title title="Peta" subtitle="Peta Sebaran Cabang" />
    <h5 class="fw-bold mb-4">Peta Sebaran Cabang Franchise</h5>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" style="padding-top: 20px;">
                    <div id="marker-map" class="gmaps" style="height: 540px; z-index: 0;"></div>
                </div>                
            </div>
        </div>
    </div>

    <h5 class="fw-bold mb-4">List Cabang Franchise</h5>
    <div class="card mt-4">
        <div class="card-body">
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <style>
                        .dataTables_length {
                            margin-bottom: 20px; /* Menambahkan jarak bawah pada Show entries */
                        }

                        .dataTables_filter {
                            margin-bottom: 20px; /* Menambahkan jarak bawah pada Search */
                        }

                        #franchiseTable_wrapper .row {
                            margin-bottom: 20px; /* Menambahkan jarak bawah antara elemen Show entries/Search dengan tabel */
                        }
                    </style>
                    <table id="franchiseTable" class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID Franchise</th>
                                <th>Lokasi</th>
                                <th>Nama CP</th>
                                <th>Email CP</th>
                                <th>Contact Person</th>
                                <th>Terakhir Membeli</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR001</p>
                                    </a>
                                </td>
                                <td>Jl. Dalurung Raya, Kota Bogor</td>
                                <td>Shereen Alen</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>24 menit yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR002</p>
                                    </a>
                                </td>
                                <td>Mall BTM, Kota Bogor</td>
                                <td>Devi Fedrianingsih</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>50 menit yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR003</p>
                                    </a>
                                </td>
                                <td>RSUD Kota Bogor, Kota Bogor</td>
                                <td>Meilani Jesica</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>1 jam yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR004</p>
                                    </a>
                                </td>
                                <td>Terminal Laladon, Kab. Bogor</td>
                                <td>Ratu Hasna</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>2 jam yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR005</p>
                                    </a>
                                </td>
                                <td>Terminal Bubulak, Kota Bogor</td>
                                <td>Aliya Raihana</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>3 jam yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR006</p>
                                    </a>
                                </td>
                                <td>Taman Heulang, Kota Bogor</td>
                                <td>Evlyn Jane</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>1 hari yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR007</p>
                                    </a>
                                </td>
                                <td>Transmart Yasmin, Kota Bogor</td>
                                <td>Sevia Dwi</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>1 hari yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR008</p>
                                    </a>
                                </td>
                                <td>Bogor Square, Kota Bogor</td>
                                <td>Iqbal Fadhilah</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>2 hari yang lalu</td>
                            </tr>

                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR001</p>
                                    </a>
                                </td>
                                <td>Jl. Dalurung Raya, Kota Bogor</td>
                                <td>Shereen Alen</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>24 menit yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR002</p>
                                    </a>
                                </td>
                                <td>Mall BTM, Kota Bogor</td>
                                <td>Devi Fedrianingsih</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>50 menit yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR003</p>
                                    </a>
                                </td>
                                <td>RSUD Kota Bogor, Kota Bogor</td>
                                <td>Meilani Jesica</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>1 jam yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR004</p>
                                    </a>
                                </td>
                                <td>Terminal Laladon, Kab. Bogor</td>
                                <td>Ratu Hasna</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>2 jam yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR005</p>
                                    </a>
                                </td>
                                <td>Terminal Bubulak, Kota Bogor</td>
                                <td>Aliya Raihana</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>3 jam yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR006</p>
                                    </a>
                                </td>
                                <td>Taman Heulang, Kota Bogor</td>
                                <td>Evlyn Jane</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>1 hari yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR007</p>
                                    </a>
                                </td>
                                <td>Transmart Yasmin, Kota Bogor</td>
                                <td>Sevia Dwi</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>1 hari yang lalu</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="d-flex align-items-center gap-3" href="javascript:;">
                                        <p class="mb-0 customer-name fw-bold">BGR008</p>
                                    </a>
                                </td>
                                <td>Bogor Square, Kota Bogor</td>
                                <td>Iqbal Fadhilah</td>
                                <td>
                                    <a href="javascript:;" class="font-text1">abcexample.com</a>
                                </td>
                                <td>(+62) 123-456-789</td>
                                <td>2 hari yang lalu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--end row-->
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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#franchiseTable').DataTable({
                "order": [[ 0, "asc" ]], // Sort default by ID Franchise ascending
                "searching": true, // Enable search
                "paging": true, // Enable pagination
                "lengthChange": true, // Enable the ability to change the number of rows displayed
                "pageLength": 10, // Set default number of rows per page
            });

            // Map Initialization Code
            var map = L.map('marker-map').setView([-6.595038, 106.816635], 13); // Koordinat Kota Bogor

            // Add OSM layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Adding Markers
            L.marker([-6.5580351, 106.7675798]).addTo(map)
                .bindPopup('<b>Pabrik Pusat</b><br>Sekolah Tinggi Pariwisata Bogor</br>Kota Bogor').openPopup();

            L.circleMarker([-6.6063, 106.7976], {color: 'red', fillColor: 'red', fillOpacity: 1, radius: 8})
                .addTo(map).bindPopup('<b>Franchise Cabang Jl. Dalurung Raya</b><br>Kota Bogor').openPopup();

            // Add more markers as needed...

            // Location Functions
            function onLocationFound(e) {
                var radius = e.accuracy;
                var currentLocation = e.latlng;

                L.circle(currentLocation, { radius: radius }).addTo(map)
                    .bindPopup("Lokasi Anda berada dalam " + radius + " meter dari titik ini").openPopup();
            }

            function onLocationError(e) {
                alert(e.message);
            }

            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);

            map.locate({setView: true, maxZoom: 16});
        });
    </script>
@endpush
