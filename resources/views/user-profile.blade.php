@extends('layouts.app')
@section('title')
    Profil Admin
@endsection
@section('content')

    <x-page-title title="Profil" subtitle="Profil Admin" />

    <div class="card rounded-4">
        <div class="card-body p-4">
            <div class="position-relative mb-5">
                <img src="https://placehold.co/1920x500/png" class="img-fluid rounded-4 shadow" alt="">
                <div class="profile-avatar position-absolute top-100 start-50 translate-middle">
                    <img src="{{ URL::asset('assets/images/profile.png') }}" class="img-fluid rounded-circle p-1 bg-grd-danger shadow"
                        width="170" height="170" alt="">
                </div>
            </div>
            <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                <div class="">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p class="mb-0">Admin di Gerobak Listrik<br>
                        Bogor, Jawa Barat</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Edit Profil</h5>
                        </div>
                    </div>
                    <form class="row g-4">
                        <div class="col-md-6">
                            <label for="input1" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" id="input1" placeholder="Nama Depan">
                        </div>
                        <div class="col-md-6">
                            <label for="input2" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" id="input2" placeholder="Nama Belakang">
                        </div>
                        <div class="col-md-12">
                            <label for="input3" class="form-label">No Handphone</label>
                            <input type="text" class="form-control" id="input3" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label for="input4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="input4">
                        </div>
                        <div class="col-md-12">
                            <label for="input5" class="form-label">Password</label>
                            <input type="password" class="form-control" id="input5">
                        </div>
                        <div class="col-md-12">
                            <label for="input11" class="form-label">Alamat</label>
                            <textarea class="form-control" id="input11" placeholder="Alamat" rows="4" cols="4"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="button" class="btn btn-primary px-4">Perbarui Profil</button>
                                <button type="button" class="btn btn-light px-4">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Tentang</h5>
                        </div>
                    </div>
                    <div class="full-info">
                        <div class="info-list d-flex flex-column gap-3">
                            <div class="info-list-item d-flex align-items-center gap-3"><span
                                    class="material-icons-outlined">account_circle</span>
                                <p class="mb-0" >Nama: {{ Auth::user()->name }}</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3"><span
                                    class="material-icons-outlined">done</span>
                                <p class="mb-0">Status: aktif</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3"><span
                                    class="material-icons-outlined">code</span>
                                <p class="mb-0">Jabatan: Admin</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3"><span
                                    class="material-icons-outlined">flag</span>
                                <p class="mb-0">Alamat: Bogor, Jawa Barat</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3"><span
                                    class="material-icons-outlined">send</span>
                                <p class="mb-0">Email: devifedrianingsih@gmail.com</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3"><span
                                    class="material-icons-outlined">call</span>
                                <p class="mb-0">No Handphone: (124) 895-6724</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Akun</h5>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Edit</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Hapus</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="account-list d-flex flex-column gap-4">
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('build/images/apps/05.png') }}" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Google</h6>
                                <p class="mb-0">Events and Reserch</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('build/images/apps/06.png') }}" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Instagram</h6>
                                <p class="mb-0">Social Network</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('build/images/apps/17.png') }}" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Facebook</h6>
                                <p class="mb-0">Social Network</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('build/images/apps/11.png') }}" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Paypal</h6>
                                <p class="mb-0">Social Network</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
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
