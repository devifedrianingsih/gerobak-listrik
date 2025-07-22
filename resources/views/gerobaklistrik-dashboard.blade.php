@extends('layouts.app')
@section('title')
    Beranda
@endsection
@section('content')
    <x-page-title title="Beranda" subtitle="Beranda" />

    <div class="row">
        <div class="col-xl-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
                <div class="card-body position-relative p-4">
                    <div class="row">
                        <div class="col-12 col-sm-7">
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <img src="{{ URL::asset('assets/images/profile.png') }}" class="rounded-circle bg-grd-primary p-1"
                                    width="60" height="60" alt="user">
                                <div class="">
                                    <p class="mb-0 fw-semibold">Selamat datang kembali</p>
                                    <h4 class="fw-semibold fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">
                                        Rp{{ number_format($topCard['monthly_revenue_sum'], 0, ',', '.') }}
                                        <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Penjualan Bulan Ini</p>
                                </div>
                                <div class="vr"></div>
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">
                                        {{ $topCard['monthly_success_order_count'] }}
                                        <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Total Order</p>
                                </div>
                                <div class="vr"></div>
                                <div class="">
                                    <h4 class="mb-1 fw-semibold d-flex align-content-center">
                                        {{ $topCard['monthly_order_count'] }}
                                        <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h4>
                                    <p class="mb-3">Order Sukses</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 text-center">
                            <img src="{{ URL::asset('build/images/gallery/welcome-back-3.png') }}" height="175"
                                alt="">
                            <div class="welcome-back-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-1">
                        <div class="">
                            <h5 class="mb-0">Total Mitra Tahun Ini</p>
                                <h5 class="mb-0">{{ array_sum($secondCard['mitra_per_month']) }}</h5>
                        </div>
                    </div>
                    <div class="chart-mitra mb-2">
                        <div id="chart3"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 font-12">Pendaftaran mitra tahun ini</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="text-left">
                        <h5 class="mb-0">Pendapatan Bulanan</h5>
                    </div>
                    <div class="mt-4" id="chart5"></div>
                    <p>Rerata Penjualan Bulanan: Rp {{ number_format($thirdCard['monthly_income_average'], 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-6 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-center">
                                <h5 class="mb-0">Top Mitra Persentase Penjualan</h5>
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-4 align-items-center justify-content-between mt-4">
                            <!-- Kiri: Donut Chart + Legend Tengah -->
                            <div class="position-relative" style="width: 50%;">
                                <div class="piechart-legend text-center position-absolute top-50 start-50 translate-middle">
                                    <h2 class="mb-1" id="donut-percentage">0%</h2>
                                    <h6 class="mb-0" id="donut-label">Mitra</h6>
                                </div>
                                <div id="chart6"></div>
                            </div>

                            <!-- Kanan: List Persentase per Mitra -->
                            <div class="d-flex flex-column gap-3 w-50">
                                @foreach ($fifthCard as $sale)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mb-0 d-flex align-items-center gap-2">
                                            <span class="material-icons-outlined fs-6 text-primary">shopping_cart</span>
                                            {{ $sale->mitra->kode_mitra }}
                                        </p>
                                        <p class="mb-0">{{ number_format($sale->percentage, 0) }}%</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script>
        new PerfectScrollbar(".user-list")
    </script>

    {{-- Chart Mitra --}}
    <script>
        var options = {
            series: [{
                name: "Total Mitra",
                data: @json($secondCard['mitra_per_month'])
            }],
            chart: {
                height: 120,
                type: 'bar',
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: false // ini penting supaya xaxis muncul
                },
                zoom: {
                    enabled: false
                },
                foreColor: "#9ba7b2"
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                curve: 'smooth'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#00b09b'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            colors: ["#96c93d"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 4,
                    columnWidth: '40%'
                }
            },
            grid: {
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.1)',
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            tooltip: {
                theme: "dark",
                y: {
                    formatter: function(val) {
                        return val + " mitra";
                    }
                }
            }
        };

        new ApexCharts(document.querySelector("#chart3"), options).render();
    </script>


    {{-- Chart Order --}}
    <script>
        var options = {
            series: [{
                name: "Pendapatan",
                data: @json($thirdCard['monthly_income']) // Inject data dari backend
            }],
            chart: {
                foreColor: "#9ba7b2",
                height: 280,
                type: 'bar',
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: false
                },
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 4,
                    columnWidth: '45%',
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#009efd'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                },
            },
            colors: ["#2af598"],
            grid: {
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.1)',
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            tooltip: {
                theme: "dark",
                y: {
                    formatter: function(val) {
                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(val);
                    }
                },
                marker: {
                    show: false
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart5"), options);
        chart.render();
    </script>

    {{-- Mitra Order Chart --}}
    <script>
        var options = {
            series: @json($fourthCard->pluck('percentage')->toArray()), // Ambil persentase dari data Laravel
            chart: {
                height: 290,
                type: 'donut',
            },
            legend: {
                position: 'bottom',
                show: !1
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#ee0979', '#17ad37', '#ec6ead'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                },
            },
            colors: ["#ff6a00", "#98ec2d", "#3494e6"], // Bisa disesuaikan
            dataLabels: {
                enabled: !1
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "85%"
                    }
                }
            },
            labels: @json($labels), // Menambahkan labels yang berisi kode_mitra
            tooltip: {
                theme: "dark",
                y: {
                    formatter: function(val, opts) {
                        var mitraIndex = opts.seriesIndex;
                        var mitraCode = @json($labels)[mitraIndex];

                        // Update isi tengah
                        document.getElementById('donut-percentage').innerText = val.toFixed(0) + '%';
                        document.getElementById('donut-label').innerText = mitraCode;

                        return val.toFixed(0) + "%";
                    }
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 270
                    },
                    legend: {
                        position: 'bottom',
                        show: !1
                    }
                }
            }],
        };

        var chart = new ApexCharts(document.querySelector("#chart6"), options);
        chart.render();
    </script>
@endpush
