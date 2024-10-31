@extends('layouts.app')
@section('title')
    Laporan Penjualan
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <x-page-title title="Laporan" subtitle="Laporan Penjualan" />

    <h5 class="mb-0 text-uppercase">Laporan Penjualan</h5>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id Pembeli</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Bulan</th>
                            <th>Total Pendapatan</th>
                            <th>Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SA122</td>
                            <td>Shereen Alen</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>DV234</td>
                            <td>Devi Fedrianingsih</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>MN122</td>
                            <td>Meilani Jesica</td>
                            <td>Bogor</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>SA122</td>
                            <td>Shereen Alen</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>DV234</td>
                            <td>Devi Fedrianingsih</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>MN122</td>
                            <td>Meilani Jesica</td>
                            <td>Bogor</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>SA122</td>
                            <td>Shereen Alen</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>DV234</td>
                            <td>Devi Fedrianingsih</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>MN122</td>
                            <td>Meilani Jesica</td>
                            <td>Bogor</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                        <tr>
                            <td>SA122</td>
                            <td>Shereen Alen</td>
                            <td>Jakarta</td>
                            <td>Juli</td>
                            <td>Rp 12.000.000</td>
                            <td><a href="{{ url('download?file=Laporan%20Juli.pdf') }}" download="Laporan_Juli.pdf">Download</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush