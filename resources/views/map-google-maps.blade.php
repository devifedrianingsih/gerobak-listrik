@extends('layouts.app')

@section('title', 'Peta Sebaran Mitra')

@section('content')
    <x-page-title title="Peta" subtitle="Peta Sebaran Mitra" />

    <h5 class="fw-bold mb-4">Peta Sebaran Mitra</h5>

    <!-- Container untuk Peta -->
    <div class="card">
        <div class="card-body">
            <div id="map" style="height: 80vh;"></div>
        </div>
    </div>

    @push('script')
        <!-- Tambahkan CSS Leaflet & MarkerCluster -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />

        <!-- Tambahkan JS Leaflet & MarkerCluster -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>

        <script>
            // Inisialisasi peta di Jakarta
            var map = L.map('map').setView([-6.2, 106.816666], 11); // Jakarta

            // Tambahkan tile layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Custom icon
            var mitraIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                iconSize: [30, 30],
                iconAnchor: [15, 30],
                popupAnchor: [0, -28]
            });

            // Ambil data dari backend
            var mitraData = @json($calonMitra);

            // Cluster group biar marker bisa digabung
            var markers = L.markerClusterGroup();

            // Looping setiap mitra
            mitraData.forEach(function(item) {
                if (item.latitude && item.longitude) {
                    var marker = L.marker([item.latitude, item.longitude], {
                            icon: mitraIcon
                        })
                        .bindPopup(`
                    <b>${item.nama}</b><br>
                    <small><b>Alamat:</b> ${item.alamat}<br>
                    <b>Kota:</b> ${item.kota}<br>
                    <b>Kontak:</b> ${item.no_hp}</small>
                `);

                    // Zoom ke marker saat diklik
                    marker.on('click', function() {
                        map.setView(marker.getLatLng(), 15);
                    });

                    markers.addLayer(marker);
                }
            });

            // Tambahkan semua marker ke peta
            map.addLayer(markers);
        </script>
    @endpush
@endsection
