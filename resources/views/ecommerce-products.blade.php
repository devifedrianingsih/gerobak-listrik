@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Produk</h1>

    <!-- Tampilkan jumlah produk berdasarkan status -->
    <div class="mb-3">
        <strong>Total Produk:</strong> 
        <span class="badge bg-primary">Published: {{ $publishedCount }}</span>
        <span class="badge bg-secondary">Draft: {{ $draftCount }}</span>
    </div>

    <!-- Tabel daftar produk -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Harga Jual</th>
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
                <td>Rp {{ $product->SellingPrice ? number_format($product->SellingPrice, 0, ',', '.') : '-' }}</td>
                <td>{{ $product->Stock }}</td>
                <td>{{ $product->category->CategoryName ?? 'Tidak Ada' }}</td>
                <td>
                    @if($product->ProductImage)
                        <img src="{{ $product->ProductImage }}" alt="{{ $product->ProductName }}" width="100">
                    @else
                        Tidak Ada Gambar
                    @endif
                </td>
                <td>{{ ucfirst($product->status) }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">Tidak ada produk yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
