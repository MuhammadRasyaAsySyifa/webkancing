@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Kelola Jasa</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jasas as $jasa)
                            <tr>
                                <td>{{ $jasa->id }}</td>
                                <td><img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" style="max-width: 100px;"></td>
                                <td>{{ $jasa->nama }}</td>
                                <td>{{ $jasa->deskripsi }}</td>
                                <td>Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('servis.edit', $jasa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('servis.destroy', $jasa->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jasa ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/servis/create" class="btn btn-outline-secondary">Tambah Jasa</a>
                    <a href="/service" class="btn btn-outline-secondary">Kembali ke halaman</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
