<!-- resources/views/jadwal/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jadwal</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_jasa">Pilih Jasa:</label>
            <select name="id_jasa" id="id_jasa" class="form-control">
                @foreach($jasas as $jasa)
                    <option value="{{ $jasa->id }}" {{ $jadwal->id_jasa == $jasa->id ? 'selected' : '' }}>{{ $jasa->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $jadwal->tanggal }}" required>
        </div>

        <div class="form-group">
            <label for="jam">Jam:</label>
            <input type="time" name="jam" id="jam" class="form-control" value="{{ $jadwal->jam }}" required>
        </div>

        <div class="form-group">
            <label for="durasi">Durasi (Menit):</label>
            <input type="number" name="durasi" id="durasi" class="form-control" value="{{ $jadwal->durasi }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Jadwal</button>
    </form>
</div>
@endsection
