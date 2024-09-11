<!-- resources/views/jadwal/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jasa</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->id }}</td>
                <td>{{ $jadwal->jasa->nama }}</td>
                <td>{{ $jadwal->tanggal }}</td>
                <td>{{ $jadwal->jam }}</td>
                <td>{{ $jadwal->durasi}}</td>
                <td>
                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <a href="/jadwal/create" class="btn btn-outline-secondary">Tambah</a>
        </tbody>

    </table>
</div>
@endsection
