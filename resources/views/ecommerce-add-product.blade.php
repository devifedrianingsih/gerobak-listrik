@extends('layouts.app')
@section('title')
    Tambah Produk
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Produk" subtitle="Tambah Produk" />

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Form untuk data produk -->
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="mb-3">Nama Produk</h5>
                            <input type="text" name="ProductName" class="form-control" placeholder="tuliskan nama produk di sini...." value="{{ old('ProductName') }}" required>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Deskripsi Produk</h5>
                            <textarea name="ProductDescription" class="form-control" cols="4" rows="6" placeholder="tuliskan deskripsi produk di sini...." required>{{ old('ProductDescription') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Persediaan</h5>
                            <div class="row g-3">
                                <div class="col-12 col-lg-3">
                                    <div class="nav flex-column nav-pills border rounded vertical-pills overflow-hidden">
                                        <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Pricing" type="button"><i class="bi bi-tag-fill me-2"></i>Harga</button>
                                        <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Restock" type="button"><i class="bi bi-box-seam-fill me-2"></i>Restock</button>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="Pricing">
                                            <div class="row g-3">
                                                <div class="col-12 col-lg-6">
                                                    <h6 class="mb-2">Harga Normal</h6>
                                                    <input name="Price" class="form-control" type="text" placeholder="Rp" value="{{ old('Price') }}" required>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <h6 class="mb-2">Harga Jual</h6>
                                                    <input name="SellingPrice" class="form-control" type="text" placeholder="Rp" value="{{ old('SellingPrice') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Restock">
                                            <h6 class="mb-3">Tambah Stok</h6>
                                            <div class="row g-3">
                                                <div class="col-sm-7">
                                                    <input name="Stock" class="form-control" type="number" placeholder="Jumlah" value="{{ old('Stock') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian kanan: Kategori, Gambar, Tombol -->
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Kategori</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <select name="CategoryID" class="form-select" id="AddCategory">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->CategoryID }}" {{ old('CategoryID') == $category->CategoryID ? 'selected' : '' }}>
                                            {{ $category->CategoryName }}
                                        </option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Gambar Produk</h5>
                        <input id="fancy-file-upload" type="file" name="ProductImage" accept=".jpg, .png, image/jpeg, image/png" {{ isset($product) ? '' : 'required' }}>
                    </div>
                </div>

                <!-- Tombol Batal, Simpan Draft, dan Publish -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3">
                            <a href="{{ route('product.index') }}" class="btn btn-outline-danger flex-fill"><i class="bi bi-x-circle me-2"></i>Batal</a>

                            <button type="submit" name="status" value="draft" class="btn btn-outline-success flex-fill">
                                <i class="bi bi-cloud-download me-2"></i>Simpan Draft
                            </button>

                            <button type="submit" name="status" value="publish" class="btn btn-outline-primary flex-fill">
                                <i class="bi bi-send me-2"></i>Publish
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </form>
@endsection

@push('script')
    <!--bootstrap js-->
    <script src="{{ URL::asset('build/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ URL::asset('build/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script>
        $('#fancy-file-upload').FancyFileUpload({
            params: {
                action: '/upload-product-image'  // Pastikan route untuk upload image sudah benar
            },
            maxfilesize: 1000000, // Ukuran file maksimum dalam byte
            onError: function(e, data) {
                console.error("The upload failed: " + data.responseText);
            }
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
