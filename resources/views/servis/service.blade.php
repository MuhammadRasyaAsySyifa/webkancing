{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studio Foto</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="website icon" type="png" href="{{ asset('images/logo 1.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Style untuk latar belakang header */
        body{
            font-family: 'Outfit';
        }
        
        .navbar-nav .nav-link {
            color: black !important;
            text-align: center;
            margin-right: 30px;
            font-weight: 500;
        }

        .navbar-nav .nav-icon {
            color: black !important;
            text-align: center;
            margin-right: 30px;
            position:relative ; right: 200px;
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
        
        

        .col-md-5 img {
            max-width: 60%;
            height: 60%;
            object-fit: cover; /* Menjaga rasio aspek gambar */
            border-radius: 50px;
            margin-bottom: 20px ; 
            width: 300px;
        }
        

        .col-md-5{
            position: relative; left: 180px;
            font-family: 'Outfit';
            font-size: medium;
        }
        
        .background-container {
            background-image: url('https://i.pinimg.com/564x/9b/7b/79/9b7b794ebd0ac4b1003e5d1bd1fd304b.jpg');
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

.background-container {
                background-image: url('{{ asset('images/gallery.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                color: #000000; /* Warna teks pada latar belakang gelap */
                padding: 100px ; /* Sesuaikan sesuai kebutuhan Anda */
                text-align: center;
            }
    </style> --}}


    
{{-- <nav class="navbar navbar-expand-lg navbar-light custom-navbar navbar-dark" style="background-color: #D4D4D4; height: 70px;">
    <a class="navbar-brand" href="#">
        <img src="images/logo polos 2.png" height="110px;" width="100px;" style="position:relative; left: 150px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/gallery') }}">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/service') }}">Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://wa.me/6288744891217">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-icon" href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
            </li>
        </ul>
    </div>
</nav> --}}
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
    <div class="row" style="position: relative; left:30px;">
        <!-- Gambar pertama dengan teks formal -->
        <div class="col-md-5">
            <img src="https://i.pinimg.com/564x/79/34/71/79347187c66ac5fc7e375b71edb0d12f.jpg" alt="Gambar Group" class="img-fluid">
            <h4>Foto Group</h4>
            <p>Berfoto dengan <br> teman teman mu dengan seru!</p>
            <a href="/pemesanan" class="view-more" style="text-decoration: none;">Rp. 50.000</a>
        </div>
        <!-- Gambar kedua dengan teks semi-formal -->
        <div class="col-md-5">
            <img src="https://i.pinimg.com/564x/88/0e/5d/880e5d932652cbb7c2e4e5efb1111491.jpg" alt="Gambar Semi-Formal" class="img-fluid">
            <h4>Foto Dengan Keluarga</h4>
            <p>Ayo foto dengan keluarga<br> agar mendapat kenangan yang bagus!</p>
            <a href="/pemesanan" class="view-more" style="text-decoration: none;">Rp. 50.000</a>
        </div>

        <div class="col-md-5">
            <img src="https://i.pinimg.com/564x/08/2e/7a/082e7aed2283966464e28fe923e022c5.jpg" alt="Gambar Group" class="img-fluid">
            <h4>Foto Sendirian</h4>
            <p>Berfoto sendirian dengan<br>  harga yang terjangkau</p>
            <a href="/pemesanan" class="view-more" style="text-decoration: none;">Rp. 50.000</a>
        </div>
        <!-- Gambar kedua dengan teks semi-formal -->
        <div class="col-md-5">
            <img src="https://i.pinimg.com/564x/cb/94/d2/cb94d2e7a87e480d7aa6ebdc33d426fd.jpg" alt="Gambar Semi-Formal" class="img-fluid">
            <h4>Foto untuk bisnis</h4>
            <p>Foto untuk produk bisnis anda<br> atau keperluan bisnis lainnya</p>
            <a href="/pemesanan" class="view-more" style="text-decoration: none;">Rp. 50.000</a>
        </div>
    </div>
</div>
@endsection

{{-- 
<div class="footer1-container">
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
</footer>


<!-- Include Bootstrap JS and jQuery -->
<script src="https://kit.fontawesome.com/b604af375e.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --}}
