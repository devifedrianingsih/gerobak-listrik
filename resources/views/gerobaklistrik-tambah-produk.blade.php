@extends('layouts.app')
@section('title')
    Tambah Produk
@endsection

@section('content')
<x-page-title title="Produk" subtitle="Tambah Produk" />

<div class="card mt-4">
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="ProductName" class="form-label">Nama Produk</label>
                    <input type="text" name="ProductName" id="ProductName" class="form-control" value="{{ old('ProductName') }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ProductDescription" class="form-label">Deskripsi Produk</label>
                    <textarea name="ProductDescription" id="ProductDescription" class="form-control" rows="4">{{ old('ProductDescription') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Price" class="form-label">Harga</label>
                    <input type="number" name="Price" id="Price" class="form-control" value="{{ old('Price') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Stock" class="form-label">Stok</label>
                    <input type="number" name="Stock" id="Stock" class="form-control" value="{{ old('Stock') }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ProductImage" class="form-label">Gambar Produk</label>
                    <input type="file" name="ProductImage" id="ProductImage" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="CategoryID" class="form-label">Kategori</label>
                    <select name="CategoryID" id="CategoryID" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </form>
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
@endpush