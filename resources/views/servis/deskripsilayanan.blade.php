@extends('layouts.servis')

@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Deskripsi Layanan</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 font-weight-bold">{{ $jasa->nama }}</h2>
                    <hr class="mb-4">

                    <!-- Image and Service Details Side-by-Side -->
                    <div class="row">
                        <div class="col-md-5 text-center">
                            <!-- Image Display -->
                            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid" style="border-radius: 20px; max-width: 100%; height: auto; position:relative; right:250px;">
                        </div>

                        <div class="col-md-7">
                            <div class="service-details">
                                <p><strong>Deskripsi Layanan</strong> <br> {{ $jasa->deskripsilayanan }}</p>
                                <p><strong>Harga:</strong> <span class="text-success font-weight-bold">Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</span></p>

                                <div class="include-section mt-4">
                                    <h5 class="font-weight-bold">Include:</h5>
                                    <ul class="list-unstyled">
                                        {!! nl2br(e($jasa->include)) !!}
                                    </ul>
                                </div>

                                <div class="important-info mt-4">
                                    <h5 class="font-weight-bold text-danger">Penting:</h5>
                                    <p>{!! nl2br(e($jasa->penting)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="/deskripsilayanan/{{ $jasa->id }}/isiwaktu" class="btn btn-primary" style="text-decoration: none; position: relative; left:10px;">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hero-section {
        background-color: rgba(0, 0, 0, 0.6);
        background-blend-mode: overlay;
    }

    .service-details p {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .include-section ul {
        padding-left: 20px;
        list-style-type: disc;
    }

    .important-info p {
        font-size: 1rem;
        line-height: 1.5;
    }

    .btn-primary {
        background-color: #808080;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #535353;
    }
</style>
@endsection