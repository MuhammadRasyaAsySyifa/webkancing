{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Foto</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="website icon" type="png" href="{{ asset('images/logo 1.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* Style untuk latar belakang header */
        body{
            font-family: 'Outfit';
        }
        .custom-header {
            background-color: #868686;
            padding: 10px;
            font-family: 'Outfit', sans-serif;
        }

        /* Style untuk container header */
        .header-container {
            height: 45px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Outfit', sans-serif;
        }

        /* Style untuk elemen "Call Us" dan nomor telepon */
        .call-us {
            color: #fff;
            font-family: 'Outfit', sans-serif;
        }

        .call-us {
            display: flex;
            align-items: center; /* Mengatur vertikal ke tengah */
        }

        .call-us i {
            margin-right: 10px; /* Mengatur jarak antara ikon dan teks */
        } 

        /* Style untuk elemen "Send Us Mail" dan alamat email */
        .send-us-mail {
            color: #fff;
            font-family: 'Outfit', sans-serif;
        }

        .send-us-mail {
            display: flex;
            align-items: center; /* Mengatur vertikal ke tengah */
        }

        .send-us-mail i {
            margin-right: 10px; /* Mengatur jarak antara ikon dan teks */
        }
        
        /* Style untuk elemen "Become a Seller" */
        .become-seller {
            background-color: #4E4B4B;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            position: relative ; left: 65px;
        }

        /* .navbar-nav .nav-link {
            color: black !important;
            text-align: center;
            margin-right: 30px;
            font-weight: 500;
            position: relative;
        }

        .navbar-nav .nav-icon {
            color: black !important;
            text-align: center;
            margin-right: 30px;
            position:relative ; right: 200px;
        } */

        /* Mengatur tata letak (layout) ikon telepon dan teks "Call Us" */
     

        /* Mengatur tata letak (layout) ikon email dan teks "Send Us Mail" */
        

          /* Style untuk konten di bawah navbar */
          .content-container {
            background-color: #D4D4D4;
            padding: 20px;
            font-family: 'Outfit', sans-serif;
            height: 560px;
        }
        
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;
            margin-right: 60px;
            
        }

        .content-text {
            max-width: 50%;
        }

        .content-text h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 50px;
        }

        .content-text p {
            font-size: 18px;
            line-height: 1.5;
            text-align: left; /* Mengatur teks menjadi rata kiri */
        }
        

        .content-image {
            max-width: 50%;
            padding: 20px;
        }

        .content-image img {
            max-width: 100%;
            border-radius: 10px;
        }
        .view-more {
            color: black !important;
            text-decoration: none; /* Menghapus garis bawah bawaan dari teks */
            border-bottom: 1px solid black; /* Properti untuk garis bawah */
            padding-bottom: 5px; /* Mengatur jarak vertikal dari bawah teks */
        }
        
        

        .col-md-6 img {
            max-width: 60%;
            height: 60%;
            object-fit: cover; /* Menjaga rasio aspek gambar */
            border-radius: 50px;
            margin-bottom: 20px ; 
            width: 300px;
        }
        

        .col-md-6{
            position: relative; left: 100px;
            font-family: 'Outfit';
            font-size: medium;
        }
        
        .background-container {
            background-image: url('{{ asset('images/Rectangle 17.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #000000; /* Warna teks pada latar belakang gelap */
            padding: 100px 0; /* Sesuaikan sesuai kebutuhan Anda */
            text-align: center;
        }

        .background-container h1 {
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .background-container p {
            font-size: 18px;
        }

        .instagram {
            background-color: #FAF4F4;
            padding: 10px 20px;
            border-radius: 30px;
            font-family: 'Outfit', sans-serif;
            display: inline-block;
            /* Mengatur lebar tombol */
            width: 200px; /* Ganti nilai ini sesuai dengan lebar yang Anda inginkan */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.6);
        }
        
        .instagram a {
            color: #000000; 
        }
        
        .menu {
            display: flex; /* Menggunakan flexbox untuk tata letak horizontal */
        }
        
        .menu a {
            margin-right: 90px; /* Mengatur jarak antara setiap elemen menu */
            position: relative; bottom: 140px; left: 319px;
            font-weight: bold;
            font-family: 'Outfit';
            font-size: large;
            color: #000000; 
        }

        .menu h4 {
            margin-right: 90px; /* Mengatur jarak antara setiap elemen menu */
            position: relative; bottom: 240px; left: 450px;
            font-weight: bold;
            font-family: 'Outfit';
            font-size: large;
        }
        .footer1-container{
            height: auto;
        }
        
        /* Gaya untuk pembatas */
.footer1-container hr {
    border: 1px solid #ddd; /* Warna dan gaya garis pembatas */
    margin-top: 20px; /* Jarak di atas garis pembatas */
}

.nav-item p{
        margin-right: 35px;
        text-align: center;
        margin-top: 15px;
        }
        .nav-item .nav-link{
            color: black !important;
            font-weight: 500;
            font-size: 110%;
        }
        .nav-item{
            position: relative;
            left: 70px;
        }
        .nav-item i{
            margin-left: 13px;
        }

        .nav-icon{
            color: rgb(0, 0, 0) !important;
            font-size: 130%;
            position: relative;
            right: 100px;
        }
        
/* CSS */
.navbar-brand img {
    max-height: 130px; /* Sesuaikan ukuran yang diinginkan */
    position: relative; left: 50%;
}

.navbar {
    height: 70px; /* Tinggi navbar konstan */
}

    </style>
</head>
<body>

<div class="custom-header">
    <div class="container header-container">
        <div class="header-elements call-us">
            <i class="fa-solid fa-phone"></i>
            Call Us: <br>+123456789
        </div>
        <div class="header-elements send-us-mail">
            <i class="fa-solid fa-inbox"></i>
            Send Us Mail:<br>example@example.com
        </div>
        <div class="header-elements become-seller">
            <a href="service" style="color:white; text-decoration:none;">See Our Service</a>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar navbar-dark" style="background-color: #D4D4D4;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo polos 2.png') }}" alt="Logo Anda" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto" style="position: relative; left: 26%;">
                <li class="nav-item">
                    <p><a class="nav-link" href="{{ url('/home') }}">Home</a></p>
                </li>
                <li class="nav-item">
                    <p><a class="nav-link" href="{{ url('/gallery') }}">Gallery</a></p>
                </li>
                <li class="nav-item">
                    <p><a class="nav-link" href="{{ url('/service')}}">Service</a></p>
                </li>
            </ul>

            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-icon" href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-regular fa-user"></i>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="text-align: center">
                            <a class="dropdown-item" href="{{ route('profile') }}"> Profile </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}
@extends('layouts.home')
@section('content')
    
<!-- Konten Utama -->
<div class="content-container">
    <div class="container">
        <div class="row content">
            {{-- @if (auth()->check() && auth()->user()->isAdmin())
            <a href="/homemanage" class="btn btn-outline-secondary">Kelola Konten</a>
        @endif --}}
            <div class="col-md-6 content-text">
                <h1><span style="color: #616161;">Studio Foto</span><br> Kancing Production</h1>
                <p>Selamat datang di Kancing Production, Layanan terbaik untuk fotografer. Studio kami menawarkan layanan dalam fotografi. Dengan pengalaman dan keahlian kami, kami siap membantu Anda menciptakan hasil terbaik untuk Anda. Terus kunjungi Kancing Production untuk Layanan dan informasi untuk fotografi.</p>
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
<div class="container mt-5 text-center">
    <h1 class="display-4">Our Service</h1>
    <div class="row" style="position: relative; right:100px;">
        @foreach($jasas->slice(0, 2) as $jasa)
        <div class="col-md-6 mt-5">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid">
            <h4>{{ $jasa->nama }}</h4>
            <p>{{ $jasa->deskripsi }}</p>
            <a href="/service" class="view-more" style="text-decoration:none;">View More</a>
        </div>
        @endforeach
    </div>
</div>

<!-- Tambahkan kontainer baru dengan background image -->
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Instagram</h1>
                <p>Follow our store on Instagram</p>
                <div class="instagram">
                    <a href="https://www.instagram.com/rasyasyff/">Follow Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <div class="footer1-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <img src="images/logo polos 2.png" width="350px">
                <div class="contact-info ml-4">
                    <h4>Lokasi Kami</h4>
                    <p>Jl. Brig Jend. Hasan Basri No.6,<br> Sungai Miai, Kec. Banjarmasin Utara,<br>Kota Banjarmasin, Kalimantan Selatan 70124</p>
                    <p>Senin - Jum'at 08:00 - 11.00</p>
                    <p>Telp: +62 811-5134-34</p>
                    <p>Email    :kancingproduction@gmail.com</p>
                </div> 
            </div>
        </div>
    </div>
</div>
<footer class="d-flex flex-column align-items-center justify-content-center">
    <hr> <!-- Pembatas -->
    <p>&copy; 2023 Kancing Production. All Rights Reserved.</p>
</footer> --}}



{{-- 
<!-- Include Bootstrap JS and jQuery -->
<script src="https://kit.fontawesome.com/b604af375e.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --}}
