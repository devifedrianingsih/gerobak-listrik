@extends('layouts.app')
@section('title')
    Mitra
@endsection
@section('content')

    <x-page-title title="Mitra" subtitle="Daftar Mitra" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $mitras->count() }})</span></a>
    </div>

    <div class="row g-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="position-relative">
                <input id="searchInput" class="form-control px-5" type="search" placeholder="Cari Mitra">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
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
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="customer-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="mitraTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID Mitra</th>
                                <th>Nama Mitra</th>
                                <th>Alamat Mitra</th>
                                <th>Email Mitra</th>
                                <th>No HP Mitra</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mitras as $mitra)
                                <tr>
                                    <td>{{ $mitra->id_mitra }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="view-mitra" data-nomor="{{ $mitra->nomor }}">
                                            {{ $mitra->nama_mitra }}
                                        </a>
                                    </td>
                                    <td>{{ $mitra->alamat_mitra }}</td>
                                    <td>{{ $mitra->email_mitra }}</td>
                                    <td>{{ $mitra->no_hp_mitra }}</td>
                                    <td>{{ $mitra->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mitraModal" tabindex="-1" aria-labelledby="mitraModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mitraModalLabel">Data Diri Mitra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Data Diri Mitra</h5>
                    <p><strong>Nama Lengkap:</strong> <span id="namaLengkap"></span></p>
                    <p><strong>Tanggal Lahir:</strong> <span id="tanggalLahir"></span></p>
                    <p><strong>Email:</strong> <span id="email"></span></p>
                    <p><strong>Nomor Handphone:</strong> <span id="nomorHandphone"></span></p>
                    <p><strong>Jenis Kelamin:</strong> <span id="jenisKelamin"></span></p>
                    <p><strong>Domisili:</strong> <span id="domisili"></span></p><br>
    
                    <h5>Alamat Mitra</h5>
                    <p><strong>Alamat Lengkap:</strong> <span id="alamatLengkap"></span></p>
                    <p><strong>Kota:</strong> <span id="kota"></span></p>
                    <p><strong>Provinsi:</strong> <span id="provinsi"></span></p>
                    <p><strong>Kode Pos:</strong> <span id="kodePos"></span></p>
                    <p><strong>Negara:</strong> <span id="negara"></span></p>
                    <p><strong>Latitude:</strong> <span id="latitude"></span></p>
                    <p><strong>Longitude:</strong> <span id="longitude"></span></p>
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

    <!-- JavaScript -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".view-mitra").forEach(function (element) {
            element.addEventListener("click", function () {
                const mitraNomor = this.getAttribute("data-nomor");

                fetch(`/ecommerce-potential-partners/${mitraNomor}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Gagal mengambil data mitra");
                        }
                        return response.json();
                    })
                    .then((data) => {
                        console.log("Data diterima:", data); // Debug log untuk data
                        // Isi modal dengan data yang diterima
                        document.getElementById("namaLengkap").textContent = data.nama_calon_mitra || "Tidak ada";
                        document.getElementById("tanggalLahir").textContent = data.tanggal_lahir || "Tidak ada";
                        document.getElementById("email").textContent = data.email_calon_mitra || "Tidak ada";
                        document.getElementById("nomorHandphone").textContent = data.no_hp_calon_mitra || "Tidak ada";
                        document.getElementById("jenisKelamin").textContent = data.jenis_kelamin || "Tidak ada";
                        document.getElementById("domisili").textContent = data.domisili || "Tidak ada";
                        document.getElementById("alamatLengkap").textContent = data.alamat_calon_mitra || "Tidak ada";
                        document.getElementById("kota").textContent = data.kota_calon_mitra || "Tidak ada";
                        document.getElementById("provinsi").textContent = data.provinsi || "Tidak ada";
                        document.getElementById("kodePos").textContent = data.kode_pos || "Tidak ada";
                        document.getElementById("negara").textContent = data.negara || "Tidak ada";
                        document.getElementById("latitude").textContent = data.latitude || "Tidak ada";
                        document.getElementById("longitude").textContent = data.longitude || "Tidak ada";

                        const mitraModal = new bootstrap.Modal(document.getElementById("mitraModal"));
                        mitraModal.show();
                    })
                    .catch(error => {
                    console.error("Error fetching mitra data:", error);
                    alert("Gagal mengambil data mitra.");
                });
            });
        });
    });
    </script>
@endpush
