@extends('layouts.app')

@section('title', 'Daftar Calon Mitra')

@section('content')
    <x-page-title title="Calon Mitra" subtitle="Daftar Calon Mitra" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $mitras->count() }})</span></a>
    </div>

    <div class="row g-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <!-- Search input di kiri -->
            <div class="position-relative">
                <input id="searchInput" class="form-control px-5" type="search" placeholder="Cari Customer">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
            <!-- Dropdown Show entries di kanan -->
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
    </div><!--end row-->

    <div class="card mt-4">
        <div class="card-body">
            <div class="mitras-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="calonmitraTable">
                        <thead class="table-light">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Berkas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mitras as $mitra)
                                <tr>
                                    <td>{{ $mitra->nomor }}</td>
                                    <td>{{ $mitra->nama }}</td>
                                    <td>{{ $mitra->no_hp }}</td>
                                    <td>{{ $mitra->alamat }}</td>
                                    <td>{{ $mitra->berkas }}</td>
                                    <td>{{ $mitra->status }}</td>
                                    <td>
                                        <!-- Aksi Terima dan Tolak -->
                                        <form action="{{ route('calon-mitra.terima', $mitra->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Terima</button>
                                        </form>
                                        <form action="{{ route('calon-mitra.tolak', $mitra->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Tolak</button>
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
@endsection
