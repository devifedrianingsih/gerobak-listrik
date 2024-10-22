@extends('layouts.guest', ['bodyClass' => 'bg-reset-password'])
@section('title')
    Reset Password
@endsection
@section('content')
    <!--authentication-->
    <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
        <div class="container my-5 my-lg-0">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                    <div class="card rounded-4 mb-0 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-5">
                            <img src="{{ URL::asset('build/images/logo1.png') }}" class="mb-4" width="145" alt="">
                            <h4 class="fw-bold">Membuat Kata Sandi Baru</h4>
                            <p class="mb-0">Kami menerima permintaan pengaturan ulang kata sandi Anda. Silakan masukkan kata sandi baru Anda!</p>
                            <div class="form-body mt-4">
                                <form class="row g-4">
                                    <div class="col-12">
                                        <label class="form-label" for="NewPassword">Kata Sandi Baru</label>
                                        <input type="text" class="form-control" id="NewPassword"
                                            placeholder="Masukkan kata sandi baru">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="ConfirmPassword">Konfirmasi Kata Sandi</label>
                                        <input type="text" class="form-control" id="ConfirmPassword"
                                            placeholder="Ketik ulang kata sandi">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-grd-info">Ganti Kata Sandi</button>
                                            <a href="{{ url('/auth-basic-login') }}" class="btn btn-grd-royal">Kembali Masuk Akun</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
    <!--authentication-->

@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>
@endpush
