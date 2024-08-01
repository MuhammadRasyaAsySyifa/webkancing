@extends('layouts.app')

@section('content')
<div class="container">
    <h5 style="text-align: center;">Manajemen Gambar</h5>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary mb-3">Tambah Gambar Baru</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->id }}</td>
                                <td><img src="{{ route('gallery.show', $gallery->id) }}" alt="Gambar" style="max-width: 100px; max-height: 100px;"></td>
                                <td>
                                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/adminmanage" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
