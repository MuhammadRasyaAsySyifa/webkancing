@extends('layouts.servis')
@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Service</h1>
            </div>
        </div>
    </div>
</div>
<!-- Konten Utama -->

<!-- Tambahkan kontainer baru di bawah konten utama -->
<div class="container mt-5">
    @if (auth()->check() && auth()->user()->isAdmin())
    <a href="/servis" class="btn btn-outline-secondary">Kelola Jasa</a>
    @endif
    <div class="row" style="position: relative; left:50px;">
        @foreach ($jasas as $jasa)
        <div class="col-md-5"  style="margin-bottom: 60px;">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" style="max-width: 250px; height:400px;">
            <h4>{{ $jasa->nama }}</h4>
            <div style="max-width: 270px; overflow: hidden;">
                <p>{{ $jasa->deskripsi }}</p>
            </div>
            <a href="/pemesanan/{{ $jasa->id }}" class="view-more" style="text-decoration: none;">Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection