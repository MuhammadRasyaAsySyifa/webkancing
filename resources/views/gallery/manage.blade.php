@extends('layouts.app')
@section('content')
    <div class="container">
        <h5 style="text-align: center;">Selamat datang dihalaman kelola Gambar</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Kelola Gambar') }}</div>
                    <div class="card-body">
                        <table class="table table-bordered" style="text-align: center">
                            <tr>
                                <td>ID Gambar</td>
                                <td>Gambar</td>
                                <td>Aksi</td>
                            </tr>
                            @foreach($galleries as $gambar)
                                <tr>
                                    <td>{{ $gambar->id }}</td>
                                    <td>
                                    <img src="{{ route('gallery.tampilkan', ['id' => $gambar->id]) }}" alt="Gambar {{ $gambar->id }}" width="80px" loading="lazy">
                                    </td>
                                    <td>
                                        <a href="/gallery/{{$gambar->id}}/edit" class="btn btn-outline-secondary">Edit</a><br>
                                        <form action="/gallery/{{$gambar->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-secondary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <a href="/gallery/create" class="btn btn-outline-secondary">Tambah Gambar</a>
                        <a href="/gallery" class="btn btn-outline-secondary">Kembali ke Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
