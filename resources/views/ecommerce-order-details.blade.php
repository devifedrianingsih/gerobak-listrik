@extends('layouts.app')
@section('title')
    Detail Pesanan
@endsection
@section('content')

    <x-page-title title="Ecommerce" subtitle="Detail Pesanan" />
    <h5 class="fw-bold mb-4">Detail Pembelian</h5>
    <div class="card">
        <div class="card-body">
            <div
                class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">
                <div class="flex-grow-1">
                    <h4 class="fw-bold">Pesanan #849</h4>
                    <p class="mb-0">ID Pembeli : <a href="javascript:;">6589743</a></p>
                </div>
                <div class="overflow-auto">
                    <div class="btn-group position-static">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Pengembalian Dana
                        </button>
                    </div>
                    <div class="btn-group position-static">
                        <div class="btn-group position-static">
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-printer-fill me-2"></i>Cetak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row g-3 row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Nama Pembeli</h6>
                            <a href="javascript:;" class="mb-0">Jhon Maxwell</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Email</h6>
                            <a href="javascript:;" class="mb-0">abcexample.com</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Phone</h6>
                            <a href="javascript:;" class="mb-0">+62 85XXXXXXX</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Tanggal Pengiriman</h6>
                            <p class="mb-0">15 Dec, 2022</p>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-house-door-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Alamat Pengiriman</h6>
                            <p class="mb-0">198 Street Name, City, Inited States of America</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start gap-3 border p-3 rounded">
                        <div class="detail-icon fs-5">
                            <i class="bi bi-truck-front-fill"></i>
                        </div>
                        <div class="detail-info">
                            <h6 class="fw-bold mb-1">Status Pengiriman</h6>
                            <p class="mb-0">Sedang dalam perjalanan</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>



    <div class="row">
        <div class="col-12 col-lg-8 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="mb-3 fw-bold">Pesanan<span class="fw-light ms-2">(3)</span></h5>
                    <div class="product-table">
                        <div class="table-responsive white-space-nowrap">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box">
                                                    <img src="https://placehold.co/200x150/png" width="70"
                                                        class="rounded-3" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:;" class="product-title">Paket Gerobak A</a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>Franchise</td>
                                        <td>2</td>
                                        <td>Rp 15.000.000</td>
                                        <td>Rp 30.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box">
                                                    <img src="https://placehold.co/200x150/png" width="70"
                                                        class="rounded-3" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:;" class="product-title">Telur Puyuh</a> 
                                                </div>
                                            </div>
                                        </td>
                                        <td>Bahan Baku</td>
                                        <td>2</td>
                                        <td>Rp 59.000</td>
                                        <td>Rp 118.000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-box">
                                                    <img src="https://placehold.co/200x150/png" width="70"
                                                        class="rounded-3" alt="">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:;" class="product-title">Telur Puyuh Balado</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Produk Jadi</td>
                                        <td>2</td>
                                        <td>Rp 70.000</td>
                                        <td>Rp 140.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 fw-bold">Total Pesanan:</p>
                        <p class="mb-0 fw-bold">Rp 30.258.000</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex">
            <div class="w-100">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 fw-bold">Ringkasan</h4>
                        <div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Item subtotal :</p>
                                <p class="fw-semi-bold">Rp 30.258.000</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Diskon :</p>
                                <p class="text-danger fw-semi-bold">Rp 48.000</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Pajak :</p>
                                <p class="fw-semi-bold">Rp 156.700</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Subtotal :</p>
                                <p class="fw-semi-bold">Rp 30.366.700</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-semi-bold">Harga Pengiriman :</p>
                                <p class="fw-semi-bold">Rp 50.000</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-4">
                            <h5 class="mb-0 fw-bold">Total :</h5>
                            <h5 class="mb-0 fw-bold">Rp 30.416.700</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->




@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush