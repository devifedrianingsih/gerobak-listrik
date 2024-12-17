@extends('layouts.app')

@section('title', 'Peta Sebaran Mitra')

@section('content')
    <x-page-title title="Peta" subtitle="Peta Sebaran Mitra" />

    <h5 class="fw-bold mb-4">Peta Sebaran Mitra</h5>

    <!-- Container untuk Peta -->
    <div class="card">
        <div class="card-body">
            <div id="map" style="height: 540px;"></div>
        </div>
    </div>

    @push('script')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Inisialisasi Peta
        var map = L.map('map').setView([-6.595038, 106.816635], 13);

        // Tambahkan Tile Layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Data Mitra dari Database
        var mitraData = @json($calonMitra);

        // Looping untuk Menambahkan Marker ke Peta
        mitraData.forEach(function (item) {
            if (item.latitude && item.longitude) {
                L.marker([item.latitude, item.longitude])
                    .addTo(map)
                    .bindPopup(`
                        <b>${item.nama_calon_mitra}</b><br>
                        Lokasi: ${item.alamat_calon_mitra}<br>
                        Kota: ${item.kota_calon_mitra}<br>
                        Kontak: ${item.no_hp_calon_mitra}
                    `);
            }
        });
    </script>
    @endpush
@endsection
