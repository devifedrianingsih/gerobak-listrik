@extends('layouts.app')

@section('title')
    Produk
@endsection

@section('content')

    <x-page-title title="eCommerce" subtitle="Produk" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $products->count() }})</span></a>
        <a href="javascript:;"><span class="me-1">Publik</span><span class="text-secondary">(56242)</span></a>
        <a href="javascript:;"><span class="me-1">Draft</span><span class="text-secondary">(17)</span></a>
        <a href="javascript:;"><span class="me-1">Diskon</span><span class="text-secondary">(88754)</span></a>
    </div>

    <div class="row g-3">
        <div class="col-auto">
            <div class="position-relative">
                <input class="form-control px-5" id="searchInput" type="search" placeholder="Cari Produk">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
        </div>
        <div class="col-auto flex-grow-1 overflow-auto">
            <div class="btn-group position-static">
                <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Kategori
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:;">Franchise</a></li>
                    <li><a class="dropdown-item" href="javascript:;">Bahan Baku</a></li>
                    <li><a class="dropdown-item" href="javascript:;">Produk Jadi</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:;">Semua</a></li>
                </ul>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary px-4">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Produk</a>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="card-body">
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <input class="form-check-input" id="selectAllCheckbox" type="checkbox">
                                </th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Bintang</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <input class="form-check-input product-checkbox" type="checkbox">
                                    </td>
                                    <td>{{ $product->ProductName }}</td>
                                    <td>Rp {{ number_format($product->Price, 0, ',', '.') }}</td>
                                    <td>{{ $product->category->CategoryName ?? 'N/A' }}</td>
                                    <td>
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill text-warning me-2"></i><span>{{ $product->ProductRating }}</span>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($product->LatestUpdate)->format('d M, H:i A') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret"
                                                type="button" data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('product.edit', $product->id) }}"><i
                                                            class="bi bi-pencil me-2"></i>Edit</a>
                                                </li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0);" onclick="event.preventDefault();
                                                        document.getElementById('delete-form-{{ $product->id }}').submit();">
                                                        <i class="bi bi-trash-fill me-2"></i>Hapus</a>
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
