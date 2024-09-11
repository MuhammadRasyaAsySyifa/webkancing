@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Jasa</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('servis.update', $jasa->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $jasa->nama) }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required>{{ old('deskripsi', $jasa->deskripsi) }}</textarea>

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsilayanan" class="col-md-4 col-form-label text-md-right">Deskripsi Layanan</label>
                        
                            <div class="col-md-6">
                                <textarea id="deskripsilayanan" class="form-control @error('deskripsilayanan') is-invalid @enderror" name="deskripsilayanan" rows="4" required>{{ old('Deskripsi Layanan', $jasa->deskripsilayanan) }}</textarea>
                                @error('deskripsilayanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $jasa->harga) }}" required>

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="include" class="col-md-4 col-form-label text-md-right">Include</label>
                        
                            <div class="col-md-6">
                                <textarea id="include" class="form-control @error('include') is-invalid @enderror" name="include" rows="6">{{ old('include', $jasa->include ?? "-\n-\n-\n-\n-") }}</textarea>
                        
                                @error('include')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="penting" class="col-md-4 col-form-label text-md-right">Penting</label>
                        
                            <div class="col-md-6">
                                <textarea id="penting" class="form-control @error('penting') is-invalid @enderror" name="penting" rows="4">{{ old('penting', $jasa->penting) }}</textarea>
                        
                                @error('penting')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>
                        
                            <div class="col-md-6">
                                <select id="kategori" class="form-select @error('kategori') is-invalid @enderror" name="kategori">
                                    <option value="" selected>Pilih Kategori</option>
                                    <option value="Self Photo Studio" {{ old('kategori') == 'Self Photo Studio' ? 'selected' : '' }}>Self Photo Studio</option>
                                    <option value="Photo Studio" {{ old('kategori') == 'Photo Studio' ? 'selected' : '' }}>Photo Studio</option>
                                </select>
                        
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="gambar" class="col-md-4 col-form-label text-md-right">Gambar</label>

                            <div class="col-md-6">
                                <input id="gambar" type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar">

                                @if($jasa->gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/' . $jasa->gambar) }}" alt="Gambar Jasa" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif

                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
