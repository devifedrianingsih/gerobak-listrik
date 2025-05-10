@extends('layouts.app')

@section('title', 'Peta Sebaran Mitra')

@section('content')
    <x-page-title title="Peta" subtitle="Peta Sebaran Mitra" />

    <h5 class="fw-bold mb-4">Peta Sebaran Mitra</h5>

    <!-- Container untuk Peta -->
    <div class="card" style="overflow: visible">
        <div class="card-body p-0" style="overflow: visible">
            <div id="map" style="height: 70vh; width: 100%;"></div>
        </div>
    </div>
@endsection

@push('script')
    <!-- CSS Leaflet & Plugin -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css" />

    <!-- JS Leaflet & Plugin -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
    <script src="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js"></script>
    <script src="https://unpkg.com/leaflet-easyprint@2.1.9/dist/bundle.js"></script>

    <style>
        .leaflet-container:fullscreen {
            height: 100% !important;
        }

        .total-mitra-box {
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 6px 10px;
            margin-top: 10px;
            margin-left: 10px;
            font-size: 16px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.3);
            white-space: nowrap;
        }

        #map {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
        }

        .leaflet-control-locate {
            width: 26px;
            height: 26px;
            line-height: 26px;
            background-color: #fff;
            border-top: 1px solid #ccc;
            text-align: center;
            display: block;
            text-decoration: none;
        }

        .leaflet-control-locate:hover {
            background-color: #f4f4f4;
        }

        .leaflet-control-locate::before {
            content: '';
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #007bff;
        }
    </style>

    <script>
        var map = L.map('map', {
            center: [-6.2, 106.816666],
            zoom: 11,
            zoomControl: false
        });

        // Tambahkan tombol zoom di kanan bawah
        L.control.zoom({ position: 'bottomright' }).addTo(map);

        // Tambahkan tombol fullscreen di kanan atas
        L.control.fullscreen({ position: 'topright' }).addTo(map);

        // Tombol ke Lokasi Saya (di bawah fullscreen)
        var locateControl = L.control({ position: 'topright' });
        locateControl.onAdd = function(map) {
            var container = L.DomUtil.create('div', 'leaflet-bar');
            var button = L.DomUtil.create('a', '', container);
            button.href = '#';
            button.title = 'Ke Lokasi Saya';
            button.classList.add('leaflet-control-locate');

            button.onclick = function (e) {
                e.preventDefault();
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;
                        map.setView([lat, lng], 14);

                        L.marker([lat, lng], {
                            icon: L.divIcon({
                                html: '<div style="width:12px;height:12px;border-radius:50%;background:#007bff;border:2px solid white"></div>',
                                className: '',
                                iconSize: [16, 16]
                            })
                        }).addTo(map).bindPopup('Lokasi Kamu Sekarang').openPopup();
                    });
                }
            };

            return container;
        };
        locateControl.addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Icon khusus untuk mitra (pakai gambar gerobak)
        var mitraIcon = L.icon({
            iconUrl: '{{ asset("storage/icons/gerobak.png") }}',
            iconSize: [90, 90],
            iconAnchor: [30, 60],
            popupAnchor: [0, -55]
        });

        var mitraData = @json($calonMitra);
        var markers = L.markerClusterGroup();

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

        var totalMitra = mitraData.length;
        var mitraLabel = L.control({ position: 'topleft' });

        mitraLabel.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'leaflet-bar total-mitra-box');
            div.innerHTML = `<b>Total Mitra:</b> ${totalMitra}`;
            return div;
        };

        mitraLabel.addTo(map);
    </script>
@endpush
