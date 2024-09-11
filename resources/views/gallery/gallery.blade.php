@extends('layouts.app')

@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Gallery</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Gallery -->
<div class="container mt-4">
    <div class="container-iframe">
    <iframe src="https://drive.google.com/embeddedfolderview?id=13K1mdyRcBMbT57kzfd9YVa5bcJSIuifK#grid" style="width:100%; height:800px; border:0;"></iframe>
</div>
    {{-- <div class="row">
        @foreach($galleries as $gambar)
        <div class="col-md-3 mb-2">
            <div class="card" style="border-radius: 15px; overflow: hidden;">
                <img src="{{ route('gallery.show', $gambar->id) }}" alt="Gambar {{ $gambar->id }}" class="card-img-top" style="border-radius: 15px 15px 0 0;">
            </div>
        </div>
        @endforeach
    </div> --}}
</div>
@endsection
<style>

</style>