@extends('layouts.app')

@section('title')
    Daftar Konfirmasi Pembayaran
@endsection

@section('content')
    <x-page-title title="Pembayaran" subtitle="Daftar Konfirmasi Pembayaran" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-bold flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $payments->count() }})</span></a>
    </div>

    <div class="row g-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <!-- Search input di kiri -->
            <div class="position-relative">
                <input id="searchInput" class="form-control px-5" type="search" placeholder="Cari Data Pembayaran">
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
            <div class="konfirmasi_pembayaran-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle" id="konfirmasi_pembayaranTable">
                        <thead class="table-light">
                            <tr>
                                <th>TANGGAL</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>NO TELEPON</th>
                                <th>JENIS PEMBAYARAN</th>
                                <th>METODE PENGAMBILAN</th>
                                <th>TOTAL HARGA</th>
                                <th>BUKTI BAYAR</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->created_at->format('d-m-Y') }}</td>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->manual_address }}</td>
                                <td>{{ $payment->phone }}</td>
                                <td>{{ strtoupper($payment->payment_method) }}</td>
                                <td>{{ ucwords ($payment->payment_method) }}</td>
                                <td>Rp {{ number_format($payment->total, 0, ',', '.') }}</td>
                                <td>
                                    @if ($payment->upload_bukti)
                                        <a href="javascript:void(0)" class="view-proof" data-bs-toggle="modal" data-bs-target="#proofModal" data-image="{{ asset('storage/' . $payment->upload_bukti) }}">
                                            <i class="lni lni-eye" style="font-size: 1.3rem;"></i>
                                        </a>
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td>
                                    @if ($payment)
                                        <form action="{{ route('admin.payments.approve', $payment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Yakin ingin menerima pembayaran ini?')"><i class="lni lni-checkmark"></i></button>
                                        </form>
                                        <form action="{{ route('admin.payments.reject', $payment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak pembayaran ini?')"><i class="lni lni-close"></i></button>
                                        </form>
                                    @else
                                        {{ ucfirst($payment->status) }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="proofModal" tabindex="-1" aria-labelledby="proofModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proofModalLabel">Bukti Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="proofImage" src="" alt="Bukti Transfer" class="img-fluid">
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
        document.addEventListener("DOMContentLoaded", function() {
            const proofModal = document.getElementById('proofModal');
            const proofImage = document.getElementById('proofImage');

            // Tangkap klik pada ikon "eye"
            document.querySelectorAll('.view-proof').forEach(function(element) {
                element.addEventListener('click', function() {
                    const imageUrl = this.getAttribute('data-image'); // Ambil URL dari atribut data-image
                    proofImage.setAttribute('src', imageUrl); // Setel URL gambar ke modal
                });
            });
        });
    </script>
@endpush
