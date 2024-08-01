@extends('layouts.app')

@section('content')
<div class="container">
    <h5 style="text-align: center;">Tambah Gambar Baru</h5>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
