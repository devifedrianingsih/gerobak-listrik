@extends('layouts.app')
@section('title')
    Tambah Artikel
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Artikel" subtitle="Tambah Artikel" />

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="mb-3">Judul Artikel</h5>
                        <input type="text" class="form-control" placeholder="tuliskan judul artikel di sini....">
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Isi Artikel</h5>
                        <textarea class="form-control" cols="4" rows="6" placeholder="tuliskan isi artikel di sini...."></textarea>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Gambar Artikel</h5>
                        <input id="fancy-file-upload" type="file" name="files"
                            accept=".jpg, .png, image/jpeg, image/png" multiple>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn btn-outline-danger flex-fill"><i
                                class="bi bi-x-circle me-2"></i>Batalkan</button>
                        <button type="button" class="btn btn-outline-success flex-fill"><i
                                class="bi bi-cloud-download me-2"></i>Simpan Draft</button>
                        <button type="button" class="btn btn-outline-primary flex-fill"><i
                                class="bi bi-send me-2"></i>Terbitkan</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Publikasi</h5>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="Tags" class="form-label">Penulis Artikel</label>
                            <input type="text" class="form-control" id="Tags" placeholder="Nama Penulis">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tanggal dan Waktu Terbit</label>
                            <input type="text" class="form-control date-time" placeholder="Tanggal dan Waktu Terbit">
                        </div>
                        <div class="col-12">
                            <label for="AddCategory" class="form-label">Kategori Artikel</label>
                            <select class="form-select" id="AddCategory">
                                <option value="0">Artikel Ilmiah</option>
                                <option value="1">Artikel Ilmiah</option>
                                <option value="2">Artikel Ilmiah</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="Tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="Tags" placeholder="Tags">
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Artikel <i
                                        class="bi bi-x"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Bisnis <i
                                        class="bi bi-x"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Franchise <i
                                        class="bi bi-x"></i></a>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </div><!--end row-->
    
@endsection
@push('script')
    <!--bootstrap js-->
    <script src="{{ URL::asset('build/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ URL::asset('build/js/jquery.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script>
        $('#fancy-file-upload').FancyFileUpload({
            params: {
                action: 'fileuploader'
            },
            maxfilesize: 1000000
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".date-time").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
@endpush