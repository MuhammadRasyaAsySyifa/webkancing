@extends('layouts.app')

@section('content')
<style>
    .form-group.row{
        margin-bottom:15px;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Jasa</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('servis.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

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
                                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>

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
                                <textarea id="deskripsilayanan" class="form-control @error('deskripsilayanan') is-invalid @enderror" name="deskripsilayanan" rows='10' required>{{ old('deskripsi Layanan') }}</textarea>

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
                                <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Masukkan harga">
                                
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <!-- Form Input Baru -->
                        <div class="form-group row">
                            <label for="include" class="col-md-4 col-form-label text-md-right">Include</label>
                        
                            <div class="col-md-6">
                                <textarea id="include" class="form-control @error('include') is-invalid @enderror" name="include" rows="8">{{ old('include',"-\n-\n-\n-\n-") }}</textarea>
                        
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
                                <textarea id="penting" class="form-control @error('penting') is-invalid @enderror" name="penting" rows="4">{{ old('penting') }}</textarea>
                        
                                @error('penting')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="durasi" class="col-md-4 col-form-label text-md-right">Durasi (Menit):</label>

                            <div class="col-md-6">
                                <input type="number" name="durasi" id="durasi" class="form-control" required>

                                @error('durasi')
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
                                    <option value="" {{ $jasa->kategori == '' ? 'selected' : '' }}>Pilih Kategori</option>
                                    <option value="Self Photo Studio" {{ $jasa->kategori == 'Self Photo Studio' ? 'selected' : '' }}>Self Foto Studio</option>
                                    <option value="Photo Studio" {{ $jasa->kategori == 'Photo Studio' ? 'selected' : '' }}>Foto Studio</option>
                                    <option value="Photo Strip" {{ $jasa->kategori == 'Photo Strip' ? 'selected' : '' }}>Foto Strip</option>
                                    <option value="Polaroid" {{ $jasa->kategori == 'Polaroid' ? 'selected' : '' }}>Polaroid</option>
                                    <option value="other" {{ $jasa->kategori == 'other' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                        
                                <input type="text" id="kategori_lainnya" class="form-control mt-2 @error('kategori') is-invalid @enderror" placeholder="Masukkan kategori lain" style="display: none;" value="{{ old('kategori_lainnya', $jasa->kategori == 'other' ? $jasa->kategori_lainnya : '') }}">
                        
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
                                <input id="gambar" type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" required>

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
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const kategoriSelect = document.getElementById('kategori');
    const kategoriLainnyaInput = document.getElementById('kategori_lainnya');
    const form = kategoriSelect.closest('form');

    kategoriSelect.addEventListener('change', function () {
        if (kategoriSelect.value === 'other') {
            kategoriLainnyaInput.style.display = 'block';
            kategoriLainnyaInput.setAttribute('name', 'kategori'); // Set input name to 'kategori'
        } else {
            kategoriLainnyaInput.style.display = 'none';
            kategoriLainnyaInput.removeAttribute('name'); // Remove name attribute when not needed
        }
    });

    // Show the input if "other" is pre-selected (for example during form validation)
    if (kategoriSelect.value === 'other') {
        kategoriLainnyaInput.style.display = 'block';
        kategoriLainnyaInput.setAttribute('name', 'kategori'); // Ensure the name is set if "other" is selected on page load
    }
});

</script>
@endsection
