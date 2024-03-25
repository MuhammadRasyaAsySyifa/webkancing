@extends('layouts.app')
@section('content')
    <div class="container">
        <h5 style="text-align: center;">Tambah Gambar</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Gambar') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/gallery" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" name="gambar" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
