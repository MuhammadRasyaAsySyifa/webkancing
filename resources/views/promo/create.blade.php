@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Promo</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('promo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Foto Promo</label>
                    <input type="file" name="photo" id="photo" class="form-control" required>
                    <div class="form-text text-muted">Format gambar yang diterima: jpeg, png, jpg, gif. Ukuran maksimal: 2MB.</div>
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">Upload</button>
                    <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
    /* Desktop styles */
    @media (min-width: 768px) {
        .form-control {
            max-width: 33%; /* Limits the width of the input file on desktop */
        }
    }

    /* Mobile styles */
    @media (max-width: 767.98px) {
        .form-control {
            width: 100%; /* Makes sure input takes full width on mobile devices */
            max-width: none; /* Removes any maximum width constraints */
        }
        
        .d-flex {
            flex-direction: column; /* Stacks buttons vertically on small screens */
        }
        
        .btn {
            margin-bottom: 10px; /* Adds spacing between stacked buttons */
        }
    }
</style>
