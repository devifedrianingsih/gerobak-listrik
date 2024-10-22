@extends('layouts.app')
@section('title')
    Tooltips
@endsection
@section('content')
    <x-page-title title="Components" subtitle="Tooltips" />

    <div class="card">
        <div class="card-body">
            <h5 class="mb-0">Basic Popovers</h5>
            <hr>
            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title"
                data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle
                popover</button>
        </div>
        <div class="card-body">
            <h5 class="mb-0">Four Directions</h5>
            <hr>
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top"
                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on top</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="right"
                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on
                        right</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="bottom"
                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on
                        bottom</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="left"
                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on left</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="mb-0">Tooltips Examples</h5>
            <hr>
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Tooltip on top">Tooltip on top</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Tooltip on right">Tooltip on right</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Tooltip on bottom">Tooltip on bottom</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Tooltip on left">Tooltip on left</button>
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
        $(function() {
            $('[data-bs-toggle="popover"]').popover();
            $('[data-bs-toggle="tooltip"]').tooltip();
        })
    </script>
@endpush
