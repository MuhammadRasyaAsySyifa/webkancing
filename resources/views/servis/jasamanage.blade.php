@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card" style="padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 1200px; margin: 0 auto;">
                <div class="card-header" style="font-size: 1.5rem; font-weight: bold;">Kelola Jasa</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Deskripsi Layanan</th>
                                <th>Include</th>
                                <th>Penting</th>
                                <th>Durasi</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jasas as $jasa)
                            <tr>
                                <td>{{ $jasa->id }}</td>
                                <td><img src="{{ asset('storage/images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" style="max-width: 200px;"></td>
                                <td>{{ $jasa->nama }}</td>
                                <td>Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</td>
                                <td>{{ $jasa->deskripsi }}</td>
                                <td>{{ $jasa->deskripsilayanan }}</td>
                                <td>{{ $jasa->include }}</td>
                                <td>{{ $jasa->penting }}</td>
                                <td>{{ $jasa->durasi  }}Menit</td>
                                <td>{{ $jasa->kategori}}</td>
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
                    <a href="/adminmanage" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
