@extends('layouts.app')
@section('title')
    Produk
@endsection

@section('content')
<x-page-title title="Produk" subtitle="Daftar Produk" />

<div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
    <a href="javascript:;"><span class="me-1">Semua</span><span class="text-secondary">({{ $products->count() }})</span></a>
    <a href="javascript:;"><span class="me-1">Published</span><span class="text-secondary">({{ $products->where('status', 'published')->count() }})</span></a>
    <a href="javascript:;"><span class="me-1">Draft</span><span class="text-secondary">({{ $products->where('status', 'draft')->count() }})</span></a>
</div>
<div class="row g-3">
    <div class="col-auto">
        <div class="position-relative">
            <input class="form-control px-5" type="search" placeholder="Cari Produk">
            <span
                class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
        </div>
    </div>
    <div class="col-auto flex-grow-1 overflow-auto">
        <div class="btn-group position-static">
            <div class="btn-group position-static">
                <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Status
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:;">Published</a></li>
                    <li><a class="dropdown-item" href="javascript:;">Draft</a></li>
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
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Tambah Produk</a>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->ProductName }}</td>
                        <td>{{ Str::limit($product->ProductDescription, 50) }}</td>
                        <td>Rp {{ number_format($product->Price, 0, ',', '.') }}</td>
                        <td>{{ $product->Stock }}</td>
                        <td>{{ $product->category->CategoryName ?? 'Tidak Ada' }}</td>
                        <td class="text-center">
                            @if($product->ProductImage)
                                <a href="javascript:void(0);" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#imageModal" 
                                   data-image="{{ $product->ProductImage }}" 
                                   class="view-image text-primary" 
                                   title="Lihat Gambar">
                                    <i class="bi bi-eye fs-4"></i>
                                </a>
                            @else
                                <span>Tidak Ada Gambar</span>
                            @endif
                        </td>
                        <td>{{ ucfirst($product->status) }}</td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm edit-product" 
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->ProductName }}"
                                    data-description="{{ $product->ProductDescription }}"
                                    data-price="{{ $product->Price }}"
                                    data-stock="{{ $product->Stock }}"
                                    data-category="{{ $product->CategoryID }}"
                                    data-status="{{ $product->status }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editProductModal">
                                <i class="bx bx-pencil"></i>
                            </button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('product.destroy', $product->ProductID) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada produk yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk Gambar Produk -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Gambar Produk" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Produk -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editProductForm" method="GET" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editProductId" name="id">
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Nama Produk</label>
                        <input type="text" name="ProductName" id="editProductName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductDescription" class="form-label">Deskripsi</label>
                        <textarea name="ProductDescription" id="editProductDescription" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Harga</label>
                        <input type="number" name="Price" id="editProductPrice" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductStock" class="form-label">Stok</label>
                        <input type="number" name="Stock" id="editProductStock" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductCategory" class="form-label">Kategori</label>
                        <select name="CategoryID" id="editProductCategory" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editProductStatus" class="form-label">Status</label>
                        <select name="status" id="editProductStatus" class="form-select">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
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
<script>
    // Handle klik ikon "eye" untuk menampilkan gambar
    document.addEventListener("DOMContentLoaded", function() {
        const imageModal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");

        document.querySelectorAll(".view-image").forEach(item => {
            item.addEventListener("click", function() {
                const imageUrl = this.getAttribute("data-image");
                modalImage.src = imageUrl; // Set src gambar modal
            });
        });

        // Clear image ketika modal ditutup
        imageModal.addEventListener("hidden.bs.modal", function () {
            modalImage.src = "";
        });
    });

    // Isi data modal edit ketika tombol edit ditekan
    document.querySelectorAll('.edit-product').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const description = this.getAttribute('data-description');
            const price = this.getAttribute('data-price');
            const stock = this.getAttribute('data-stock');
            const category = this.getAttribute('data-category');
            const status = this.getAttribute('data-status');

            document.getElementById('editProductForm').action = `/ecommerce-products/${id}`;
            document.getElementById('editProductId').value = id;
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductDescription').value = description;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductStock').value = stock;
            document.getElementById('editProductCategory').value = category;
            document.getElementById('editProductStatus').value = status;
        });
    });
</script>
@endpush
