
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
<style>
    body{
        /* background: #efefef; */
        background: whitesmoke;
    }
    .view-more {
                color: black !important;
                text-decoration: none; /* Menghapus garis bawah bawaan dari teks */
                border-bottom: 1px solid black; /* Properti untuk garis bawah */
                padding-bottom: 5px; /* Mengatur jarak vertikal dari bawah teks */
            }
            
            

            .col-md-5 img {
                max-width: 60%;
                height: 80%;
                object-fit: cover; /* Menjaga rasio aspek gambar */
                border-radius: 30px;
                margin-bottom: 20px ; 
                width: 300px;
            }
            

            .col-md-5{
                font-family: 'Outfit';
                font-size: medium;
                margin-bottom: 60px ; 
            }
            .custom-carousel-img-wrapper {
    background-color: #bbbbbb; /* Warna background putih */
    width: 100%; /* Lebar kontainer penuh */
    height: 450px; /* Tinggi kontainer seperti banner */
    display: flex; /* Flexbox untuk menempatkan gambar di tengah */
    justify-content: center; /* Mengeset gambar di tengah secara horizontal */
    align-items: center; /* Mengeset gambar di tengah secara vertikal */
}

.custom-carousel-img {
    max-height: 100%; /* Mengatur tinggi maksimal gambar */
    max-width: 100%; /* Mengatur lebar maksimal gambar */
    object-fit: contain; /* Menjaga proporsi asli gambar */
}


    .content-container {
        padding: 20px 0; /* Add some padding around the carousel */
    }
/* Warna untuk tombol kontrol carousel */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: black; /* Mengatur warna latar belakang ikon */
}

/* Mengatur warna ikon itu sendiri menjadi putih jika perlu */
.carousel-control-prev-icon::before,
.carousel-control-next-icon::before {
    color: white; /* Warna ikon */
}

/* Warna saat hover atau fokus */
.carousel-control-prev:hover,
.carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
    background-color: rgba(0, 0, 0, 0.5); /* Ganti dengan warna yang Anda inginkan untuk hover */
}

    @media (max-width: 768px) {
    .content-container{
        height: auto;
    }
    .custom-carousel-img-wrapper {
        height: auto; /* Mengatur tinggi kontainer otomatis sesuai dengan gambar */
        padding: 10px; /* Padding untuk memberi jarak di sekitar gambar (opsional) */
        }
        .view-more {
        display: inline-block;
        margin-top: 10px; /* Adjust as needed */
    }
    }
</style>
<div class="content-container">
    <div class="container">
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($promos as $index => $promo)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="custom-carousel-img-wrapper">
                            <img src="{{ asset('storage/promos/' . $promo->photo) }}" class="custom-carousel-img" alt="Promo Image {{ $loop->iteration }}">
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <div class="custom-carousel-img-wrapper">
                            <img src="https://via.placeholder.com/800x400" class="custom-carousel-img" alt="No Promo Available">
                        </div>
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden" >Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>



        {{-- <div class="row content">
            <div class="col-md-6 content-text">
                <h1><span style="color: #616161;">Studio Foto</span><br> Kancing Production</h1>
                <p class="justified-text">
                    Kancing Production adalah studio foto yang membantu Anda membuat kenangan indah dengan layanan fotografi yang berkualitas. Simpan momen-momen berharga Anda bersama kami!
                </p>
            </div>
            
            <div class="col-md-6 content-image">
                    @if($jasa)
                        <img src="{{ asset('images/' . $jasa->gambar) }}" alt="Gambar Anda" id="gambar" class="img-fluid" style="border-radius: 35px;">
                    @endif
                </div>
        </div> --}}
    </div>
</div>

<!-- "Our Service" section -->
<div class="container mt-4 text-center">
    <h1 class="display-6">Layanan Kami</h1>
    <div class="row justify-content-center">
        @foreach ($jasas as $index => $jasa)
        <div class="col-md-5 col-11 mt-5 d-flex flex-column align-items-center">
            <img src="{{ asset('storage/images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}"  class="img-fluid mb-3">
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
<style>
    
</style>