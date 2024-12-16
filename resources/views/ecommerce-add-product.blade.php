@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Produk</h1>
    
    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Produk -->
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Laravel CSRF Protection -->

        <div class="mb-3">
            <label for="ProductName" class="form-label">Nama Produk</label>
            <input type="text" name="ProductName" id="ProductName" 
                class="form-control @error('ProductName') is-invalid @enderror"
                value="{{ old('ProductName') }}">
            @error('ProductName')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ProductDescription" class="form-label">Deskripsi Produk</label>
            <textarea name="ProductDescription" id="ProductDescription" 
                class="form-control @error('ProductDescription') is-invalid @enderror"
                rows="4">{{ old('ProductDescription') }}</textarea>
            @error('ProductDescription')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="SellingPrice" class="form-label">Harga Jual</label>
            <input type="number" name="SellingPrice" id="SellingPrice" 
                class="form-control @error('SellingPrice') is-invalid @enderror"
                value="{{ old('SellingPrice') }}">
            @error('SellingPrice')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Stock" class="form-label">Stok</label>
            <input type="number" name="Stock" id="Stock" 
                class="form-control @error('Stock') is-invalid @enderror"
                value="{{ old('Stock') }}">
            @error('Stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="CategoryID" class="form-label">Kategori</label>
            <select name="CategoryID" id="CategoryID" 
                class="form-select @error('CategoryID') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->CategoryID }}" 
                        {{ old('CategoryID') == $category->CategoryID ? 'selected' : '' }}>
                        {{ $category->CategoryName }}
                    </option>
                @endforeach
            </select>
            @error('CategoryID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ProductImage" class="form-label">Gambar Produk</label>
            <input type="file" name="ProductImage" id="ProductImage" 
                class="form-control @error('ProductImage') is-invalid @enderror">
            @error('ProductImage')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" 
                class="form-select @error('status') is-invalid @enderror">
                <option value="">-- Pilih Status --</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
