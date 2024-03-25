@extends('layouts.app')
<style>
    /* Style untuk latar belakang header */
    body{
        font-family: 'Outfit';
    }
      /* Style untuk konten di bawah navbar */
      .nav-item a {
    display: flex;
    align-items: center;
}

.nav-item i {
    margin-left: 10px; /* Atur jarak ikon dari teks */
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
    

    .col-md-6{
        position: relative; left: 100px;
        font-family: 'Outfit';
        font-size: medium;
    }
    
    .col-md-5{
        position: relative; left:15%;
        font-family: 'Outfit';
        font-size: medium;
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

/* Gaya untuk teks hak cipta */

</style>
@section('content')
<!-- Konten Utama -->
<div class="content-container">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 content-text">
                <h1><span style="color: #616161;">Kancing</span> Production</h1>
                <p>Selamat datang di Kancing Production, sumber inspirasi terbaik untuk fotografer dan videografer. Studio kami menawarkan layanan dalam fotografi dan videografi. Dengan pengalaman dan keahlian kami, kami siap membantu Anda menciptakan hasil terbaik untuk proyek Anda. Terus kunjungi Kancing Production untuk inspirasi dan informasi terbaru dalam dunia fotografi dan videografi.</p>
            </div>
            <div class="col-md-6 content-image">
                <img src="https://i.pinimg.com/564x/f9/60/25/f9602594b6e78819980cc9bddf7054c2.jpg" alt="Gambar Anda" class="img-fluid" style="border-radius: 35px;">
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan kontainer baru di bawah konten utama -->
<div class="container mt-5">
    <div class="row">
        <!-- Gambar pertama dengan teks formal -->
        <div class="col-md-5">
            <img src="https://i.pinimg.com/564x/79/34/71/79347187c66ac5fc7e375b71edb0d12f.jpg" alt="Gambar Group" class="img-fluid">
            <h4>Foto Group</h4>
            <p>Berfoto dengan <br> teman teman mu dengan seru!</p>
            <a href="#" class="view-more">View More</a>
        </div>
        <!-- Gambar kedua dengan teks semi-formal -->
        <div class="col-md-5">
            <img src="https://i.pinimg.com/564x/88/0e/5d/880e5d932652cbb7c2e4e5efb1111491.jpg" alt="Gambar Semi-Formal" class="img-fluid">
            <h4>Foto Dengan Keluarga</h4>
            <p>Ayo foto dengan keluarga<br> agar mendapat kenangan yang bagus!</p>
            <a href="#" class="view-more">View More</a>
        </div>
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
