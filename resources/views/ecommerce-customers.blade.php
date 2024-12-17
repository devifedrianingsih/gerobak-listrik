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
                                    <!-- Pindahkan class="view-mitra" ke ID Mitra -->
                                    <td>
                                        <a href="javascript:void(0)" class="view-mitra" data-nomor="{{ $mitra->nomor }}">
                                            {{ $mitra->id_mitra }}
                                        </a>
                                    </td>
                                    <td>{{ $mitra->nama_mitra }}</td>
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
    <div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="FormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                    <h5 class="modal-title">Detail Mitra</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="mitraForm">
                        <div class="row">
                            <!-- Baris Kiri: Data Diri Mitra -->
                            <div class="col-md-6">
                                <h5>Data Diri Mitra</h5>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" name="nama_calon_mitra" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email_calon_mitra" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nomorHandphone" class="form-label">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="nomorHandphone" name="no_hp_calon_mitra" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenisKelamin" name="jenis_kelamin" disabled>
                                        <option value="Wanita">Wanita</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="domisili" class="form-label">Domisili</label>
                                    <input type="text" class="form-control" id="domisili" name="domisili" readonly>
                                </div>
                            </div>

                            <!-- Baris Kanan: Alamat Mitra -->
                            <div class="col-md-6">
                                <h5>Alamat Mitra</h5>
                                <div class="mb-3">
                                    <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamatLengkap" name="alamat_calon_mitra" rows="2" readonly></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" class="form-control" id="kota" name="kota_calon_mitra" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="kodePos" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="kodePos" name="kode_pos" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="negara" class="form-label">Negara</label>
                                    <input type="text" class="form-control" id="negara" name="negara" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id="editButton">Edit</button>
                            <button type="submit" class="btn btn-success" id="saveButton" disabled>Simpan</button>
                        </div>
                    </form>
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
        let isEditing = false;

        // Tombol Edit
        document.getElementById("editButton").addEventListener("click", function () {
            isEditing = !isEditing;
            const inputs = document.querySelectorAll("#mitraForm input, #mitraForm textarea, #mitraForm select");
            inputs.forEach(input => input.readOnly = !isEditing);

            document.getElementById("jenisKelamin").disabled = !isEditing;
            document.getElementById("saveButton").disabled = !isEditing;
        });

        // Tombol Simpan
        document.getElementById("mitraForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const mitraNomor = document.querySelector(".view-mitra[data-nomor]").getAttribute("data-nomor");

            fetch(`/ecommerce-potential-partners/update/${mitraNomor}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error("Gagal menyimpan data.");
                return response.json();
            })
            .then(data => {
                alert("Data berhasil disimpan.");
                location.reload();
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat menyimpan data.");
            });
        });

        // Tombol View Mitra
        document.querySelectorAll(".view-mitra").forEach(element => {
            element.addEventListener("click", function () {
                const mitraNomor = this.getAttribute("data-nomor");

                fetch(`/ecommerce-potential-partners/${mitraNomor}`)
                    .then(response => {
                        if (!response.ok) throw new Error("Gagal mengambil data mitra");
                        return response.json();
                    })
                    .then(data => {
                        document.getElementById("namaLengkap").value = data.nama_calon_mitra || "";
                        document.getElementById("tanggalLahir").value = data.tanggal_lahir || "";
                        document.getElementById("email").value = data.email_calon_mitra || "";
                        document.getElementById("nomorHandphone").value = data.no_hp_calon_mitra || "";
                        document.getElementById("jenisKelamin").value = data.jenis_kelamin || "Wanita";
                        document.getElementById("domisili").value = data.domisili || "";
                        document.getElementById("alamatLengkap").value = data.alamat_calon_mitra || "";
                        document.getElementById("kota").value = data.kota_calon_mitra || "";
                        document.getElementById("provinsi").value = data.provinsi || "";
                        document.getElementById("kodePos").value = data.kode_pos || "";
                        document.getElementById("negara").value = data.negara || "";
                        document.getElementById("latitude").value = data.latitude || "";
                        document.getElementById("longitude").value = data.longitude || "";

                        const formModal = new bootstrap.Modal(document.getElementById("FormModal"));
                        formModal.show();
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
