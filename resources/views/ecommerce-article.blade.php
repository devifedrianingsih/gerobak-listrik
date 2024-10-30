@extends('layouts.app')
@section('title')
    Artikel
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Artikel" subtitle="Daftar Artikel" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">(100)</span></a>
        <a href="javascript:;"><span class="me-1">Publik</span><span class="text-secondary">(97)</span></a>
        <a href="javascript:;"><span class="me-1">Draft</span><span class="text-secondary">(3)</span></a>
    </div>

    <div class="row g-3">
        <div class="col-auto">
            <div class="position-relative">
                <input class="form-control px-5" type="search" placeholder="Cari Artikel">
                <span
                    class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
        </div>
        <div class="col-auto flex-grow-1 overflow-auto">
            <div class="btn-group position-static">
                <div class="btn-group position-static">
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Draft</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Publik</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Semua</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <a href="ecommerce-add-article" class="btn btn-primary px-4">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Artikel</a>
            </div>
        </div>
    </div><!--end row-->
    
    <br>

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="https://placehold.co/800x500/png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Lorem ipsum?</h5>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <button class="btn btn-primary w-100 raised">Edit</button>
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