{{-- ecommerce-customers.show.blade --}}
@extends('layouts.app')

@section('content')
    <h1>Detail Mitra</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID Mitra</th>
            <td>{{ $mitra->id_mitra }}</td>
        </tr>
        <tr>
            <th>Nama Mitra</th>
            <td>{{ $mitra->nama_mitra }}</td>
        </tr>
        <tr>
            <th>Alamat Mitra</th>
            <td>{{ $mitra->alamat_mitra }}</td>
        </tr>
        <tr>
            <th>Email Mitra</th>
            <td>{{ $mitra->email_mitra }}</td>
        </tr>
        <tr>
            <th>No HP Mitra</th>
            <td>{{ $mitra->no_hp_mitra }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ ucfirst($mitra->kategori) }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($mitra->status) }}</td>
        </tr>
    </table>

    <a href="{{ route('mitra.index') }}" class="btn btn-secondary">Kembali ke Daftar Mitra</a>
@endsection
