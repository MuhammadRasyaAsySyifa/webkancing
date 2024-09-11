
@extends('layouts.home')
@section('content')
@if (session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}'
        });
    });
</script>
@endif

<!-- Konten Utama -->
<div class="content-container">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 content-text">
                <h1><span style="color: #616161;">Studio Foto</span><br> Kancing Production</h1>
                <p>Kancing Production adalah studio foto yang membantu Anda membuat kenangan indah dengan layanan fotografi yang berkualitas. Simpan momen-momen berharga Anda bersama kami!</p>
            </div>
            <div class="col-md-6 content-image">
                    @if($jasa)
                        <img src="{{ asset('images/' . $jasa->gambar) }}" alt="Gambar Anda" id="gambar" class="img-fluid" style="border-radius: 35px;">
                    @endif
                </div>
        </div>
    </div>
</div>

<!-- "Our Service" section -->
<div class="container mt-3 text-center">
    <h1 class="display-6">Layanan Kami</h1>
    <div class="row" style="position: relative; right:100px;">
        @foreach ($jasas as $index => $jasa)
        <div class="col-md-6 mt-5">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid">
            <h4>{{ $jasa->nama }}</h4>
            <a href="/service" class="view-more" style="text-decoration:none;">Lihat lebih banyak</a>
        </div>
        @if($index == 1)
            @break
        @endif
        @endforeach
    </div>
    
</div>

<!-- Tambahkan kontainer baru dengan background image -->
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="color: #ffffff">
                <h1>Instagram Kami</h1>
                <p>Ikuti toko kami di Instagram</p>
                <div class="instagram">
                    <a href="https://www.instagram.com/kancingproduction/" style="text-decoration: none;">Follow Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let gambar = document.getElementById('gambar');
    let gambarArray = [
        @foreach($jasas as $jasa)
            '{{ asset('images/' . $jasa->gambar) }}',
        @endforeach
    ];
    let index = 0;

    setInterval(function() {
        index = (index + 1) % gambarArray.length;
        gambar.src = gambarArray[index];
    }, 3000);
    gambar.style.width = '400px';
    gambar.style.height = '450px'; 

    function toggleMap() {
var map = document.getElementById("map");
if (map.style.display === "none") {
  map.style.display = "block";
} else {
  map.style.display = "none";
}
}

</script>
@endsection
