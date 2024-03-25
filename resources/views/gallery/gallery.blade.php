@extends('layouts.app')

@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Gallery</h1>
            </div>
        </div>
    </div>
</div>
@if (auth()->check() && auth()->user()->isAdmin())
    <a href="/manage" class="btn btn-outline-secondary">Kelola Gambar</a>
@endif
    <!-- Gallery -->
    <div class="container mt-5">
        <div class="row" >
            @foreach($galleries as $gambar)
            <div class="col-md-4 mb-3" >
                <div class="card" style="border-radius: 15px; overflow: hidden;">
                    <img src="{{ route('gallery.tampilkan', ['id' => $gambar->id]) }}" alt="Gambar {{ $gambar->id }}" class="card-img-top" style="border-radius: 15px 15px 0 0;">
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
