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
            // Inisialisasi peta
            var map = L.map('map').setView([-6.2, 106.816666], 11); // Default: Jakarta

            // Tambahkan tile layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Coba pakai lokasi pengguna
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;
                    map.setView([userLat, userLng], 13);

                    // Optional: Tambahkan marker lokasi pengguna
                    L.marker([userLat, userLng]).addTo(map)
                        .bindPopup("Lokasi Kamu Sekarang")
                        .openPopup();
                });
            }

            // Custom icon untuk mitra
            var mitraIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                iconSize: [30, 30],
                iconAnchor: [15, 30],
                popupAnchor: [0, -28]
            });

            // Data Mitra
            var mitraData = @json($calonMitra);
            var markers = L.markerClusterGroup();

            // Loop untuk menambahkan marker mitra
            mitraData.forEach(function(item) {
                if (item.latitude && item.longitude) {
                    var marker = L.marker([item.latitude, item.longitude], {
                        icon: mitraIcon
                    }).bindPopup(`
                        <b>${item.nama}</b><br>
                        <small><b>Alamat:</b> ${item.alamat}<br>
                        <b>Kota:</b> ${item.kota}<br>
                        <b>Kontak:</b> ${item.no_hp}</small>
                    `);

                    marker.on('click', function() {
                        map.setView(marker.getLatLng(), 15);
                    });

                    markers.addLayer(marker);
                }
            });

            map.addLayer(markers);

            // Menambahkan Label untuk Total Mitra
            var totalMitra = mitraData.length; // Menghitung total mitra
            var mitraLabel = L.control({ position: 'topleft' }); // Kontrol di pojok kiri atas

            mitraLabel.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'info legend');
                div.innerHTML = `<div style="background-color: white; border-radius: 5px; padding: 10px; font-size: 24px;"><b>Total Mitra:</b> ${totalMitra}</div>`; // Menampilkan total mitra
                return div;
            };

            mitraLabel.addTo(map);
        </script>

    @endpush
@endsection
