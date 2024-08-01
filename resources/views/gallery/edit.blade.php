@extends('layouts.app')

@section('content')
<div class="container">
    <h5 style="text-align: center;">Edit Gambar</h5>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gallery.update', $gambar->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src="{{ route('gallery.show', $gambar->id) }}" alt="Gambar Saat Ini" style="max-width: 300px; max-height: 300px;">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Pilih Gambar Baru</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
