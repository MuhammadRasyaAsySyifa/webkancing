@extends('layouts.app')
@section('content')
    <div class="container">
        <h5 style="text-align: center;">Edit Gambar</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Gambar') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/gallery/{{ $gambar->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" name="gambar" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
