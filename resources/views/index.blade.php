@extends('layouts.app')
@section('title')
    Beranda
@endsection
@section('content')
    
    <x-page-title title="Beranda" subtitle="Beranda" />

    <div class="row">
        <div class="col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
                <div class="card-body position-relative p-4">
                    <div class="row">
                        <div class="col-12 col-sm-7">
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <img src="https://placehold.co/110x110/png" class="rounded-circle bg-grd-info p-1"
                                    width="60" height="60" alt="user">
                                <div class="">
                                    <p class="mb-0 fw-semibold">Selamat datang kembali</p>
                                    <h4 class="fw-semibold fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">Rp165.400.000<i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Penjualan Bulan Ini</p>
                                    <div class="progress mb-0" style="height:5px;">
                                        <div class="progress-bar bg-grd-success" role="progressbar" style="width: 60%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="vr"></div>
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">78.4%<i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Tingkat Pertumbuhan</p>
                                    <div class="progress mb-0" style="height:5px;">
                                        <div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5">
                            <div class="welcome-back-img pt-4">
                                <img src="{{ URL::asset('build/images/gallery/welcome-back-3.png') }}" height="225" alt="">
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-1">
                        <div class="">
                            <h5 class="mb-0">3.2K</h5>
                            <p class="mb-0">Pelanggan Aktif</p>
                        </div>
                    </div>
                    <div class="chart-container2">
                        <div id="chart1"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12">400 pelanggan meningkat dari bulan lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0">10.8K</h5>
                            <p class="mb-0">Total Order</p>
                        </div>
                    </div>
                    <div class="chart-container2">
                        <div id="chart2"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12"><span class="text-success me-1">52.5%</span> order meningkat dari bulan lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="text-left">
                        <h5 class="mb-0">Pendapatan Bulanan</h5>
                    </div>
                    <div class="mt-4" id="chart5"></div>
                    <p>Rerata Penjualan Bulanan</p>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="">
                            <h1 class="mb-0 text-primary">68.9%</h1>
                        </div>
                        <div class="d-flex align-items-center align-self-end">
                            <p class="mb-0 text-success">31.1%</p>
                            <span class="material-icons-outlined text-success">expand_less</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-center">
                                <h5 class="mb-0">Top Franchise</h5>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="piechart-legend">
                                <h2 class="mb-1">48%</h2>
                                <h6 class="mb-0">Gerobak B</h6>
                            </div>
                            <div id="chart6"></div>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                        class="material-icons-outlined fs-6 text-primary">shopping_cart</span>Gerobak A</p>
                                <div class="">
                                    <p class="mb-0">27%</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                        class="material-icons-outlined fs-6 text-danger">shopping_cart</span>Gerobak B</p>
                                <div class="">
                                    <p class="mb-0">48%</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                        class="material-icons-outlined fs-6 text-success">shopping_cart</span>Gerobak C</p>
                                <div class="">
                                    <p class="mb-0">25%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="row">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-1">
                                <div class="">
                                    <h5 class="mb-0">1K</h5>
                                    <p class="mb-0">Total Franchise Baru</p>
                                </div>
                            </div>
                            <div class="chart-container2">
                                <div id="chart3"></div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> meningkat dari bulan lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-1">
                                <div class="">
                                    <h5 class="mb-0">5.2K</h5>
                                    <p class="mb-0">Total Franchise</p>
                                </div>
                            </div>
                            <div class="chart-container2">
                                <div id="chart4"></div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> meningkat dari bulan lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="">
                            <h3 class="mb-0">10.4K</h3>
                        </div>
                        <div class="flex-grow-0">
                            <p
                                class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                                <span class="material-icons-outlined fs-6">arrow_upward</span>22.5%
                            </p>
                        </div>
                    </div>
                    <p class="mb-0">Produk Dilihat</p>
                    <div id="chart7"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="{{ URL::asset('build/js/dashboard1.js') }}"></script>
    <script>
        new PerfectScrollbar(".user-list")
    </script>
@endpush
