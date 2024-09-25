@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Promo</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="currentPhoto" class="form-label">Foto Promo Saat Ini</label>
                    <div class="mb-3">
                        <img src="{{ asset('storage/promos/' . $promo->photo) }}" alt="Current Promo Image" class="img-fluid rounded border" style="max-width: 200px;">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="photo" class="form-label">Ganti Foto Promo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    <div class="form-text text-muted">Format gambar yang diterima: jpeg, png, jpg, gif. Ukuran maksimal: 2MB.</div>
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('promo.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
