@extends('layouts.app')

@section('title', 'Daftar Calon Mitra')

@section('content')
    <h1>Daftar Calon Mitra</h1>
    <div class="table-responsive mt-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mitras as $mitra)
                    <tr>
                        <td>{{ $mitra->nomor }}</td>
                        <td>{{ $mitra->nama }}</td>
                        <td>{{ $mitra->no_hp }}</td>
                        <td>{{ $mitra->alamat }}</td>
                        <td>{{ $mitra->berkas }}</td>
                        <td><button>{{ $mitra->status }}</button></td>
                        <td>
                        <form action="{{ route('calon-mitra.terima', $mitra->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Terima</button>
                        </form>
                        <form action="{{ route('calon-mitra.tolak', $mitra->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
@endsection