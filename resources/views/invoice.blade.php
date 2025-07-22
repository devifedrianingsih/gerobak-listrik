@extends('layouts.app')
@section('title')
    Faktur
@endsection
@section('content')
    <x-page-title title="Faktur" subtitle="Faktur" />

    <div class="card radius-10">
        <div class="card-header py-3">
            <div class="row align-items-center g-3">
                <div class="col-12 col-lg-6">
                    <h5 class="mb-0">PT Anugerah Eka Gemilang</h5>
                </div>
                <div class="col-12 col-lg-6 text-md-end">
                    <a href="javascript:;" class="btn btn-danger btn-sm me-2"><i
                            class="bi bi-file-earmark-pdf me-2"></i>Cetak sebagai PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-dark btn-sm"><i
                            class="bi bi-printer-fill me-2"></i>Cetak</a>
                </div>
            </div>
        </div>
        <div class="card-header py-2">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="">
                        <small>dari</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">PT Gerobak Listrik</strong><br>
                            Jl. Yasmin Raya No.16A<br>
                            Kota Bogor, 16113<br>
                            Phone: (123) 456-7890<br>
                            Fax: (123) 456-7890
                        </address>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <small>kepada</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Franchise Cabang Cibinong</strong><br>
                            Cibinong City Mall, Pakansari<br>
                            Kab. Bogor, 16915<br>
                            Phone: (123) 456-7890<br>
                            Fax: (123) 456-7890
                        </address>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <small>Faktur / Periode Bulan Juli</small>
                        <div class=""><b>25 Juli 2024</b></div>
                        <div class="invoice-detail">
                            #65897430006J<br>
                            Pembelian Produk
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>Deskripsi</th>
                            <th class="text-center" style="width: 10%;">Kategori</th>
                            <th class="text-center" style="width: 10%;">Jumlah</th>
                            <th class="text-right" style="width: 10%;">Harga</th>
                            <th class="text-right" style="width: 10%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="text-inverse">Paket Gerobak A</span><br>
                            </td>
                            <td class="text-right">Franchise</td>
                            <td class="text-center">2</td>
                            <td class="text-right">Rp 15.000.000</td>
                            <td class="text-right">Rp 30.000.000</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-inverse">Telur Puyuh</span><br>
                            </td>
                            <td class="text-right">Bahan Baku</td>
                            <td class="text-center">2</td>
                            <td class="text-right">Rp 59.000</td>
                            <td class="text-right">Rp 118.000</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-inverse">Telur Puyuh Balado</span><br>
                            </td>
                            <td class="text-right">Produk Jadi</td>
                            <td class="text-center">2</td>
                            <td class="text-right">Rp 70.000</td>
                            <td class="text-right">Rp 140.000</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-inverse">Diskon</span><br>
                            </td>
                            <td class="text-right"></td>
                            <td class="text-center"></td>
                            <td class="text-right"></td>
                            <td class="text-right">- Rp 48.000</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-inverse">Pajak</span><br>
                            </td>
                            <td class="text-right"></td>
                            <td class="text-center"></td>
                            <td class="text-right"></td>
                            <td class="text-right">Rp 156.700</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row bg-light align-items-center m-0">
                <div class="col col-auto p-4">
                    <p class="mb-0">SUBTOTAL</p>
                    <h4 class="mb-0">Rp 30.366.700</h4>
                </div>
                <div class="col col-auto p-4">
                    <i class="bi bi-plus-lg text-muted"></i>
                </div>
                <div class="col col-auto me-auto p-4">
                    <p class="mb-0">Biaya Pengiriman</p>
                    <h4 class="mb-0">Rp 50.000</h4>
                </div>
                <div class="col bg-primary col-auto p-4">
                    <p class="mb-0 text-white">TOTAL</p>
                    <h4 class="mb-0 text-white">Rp 30.416.700</h4>
                </div>
            </div><!--end row-->

            <hr>
            <!-- begin invoice-note -->
            <div class="my-3">
                * Bayar semua tagihan ke PT Gerobak Listrik<br>
                * Pembayaran jatuh tempo dalam waktu 24 jam<br>
                * Jika Anda memiliki pertanyaan tentang faktur ini, hubungi Admin di Info Kontak
            </div>
            <!-- end invoice-note -->
        </div>

        <div class="card-footer py-3 bg-transparent">
            <p class="text-center mb-2">
                TERIMA KASIH
            </p>
            <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                <span class=""><i class="bi bi-globe"></i> www.gerobaklistrik.com</span>
                <span class=""><i class="bi bi-telephone-fill"></i> T:+123-45678</span>
                <span class=""><i class="bi bi-envelope-fill"></i> gerobaklistrik.com</span>
            </p>
        </div>
    </div>
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush