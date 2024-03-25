<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outfit Inspire</title>
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
        
        

        .col-md-6 img {
            max-width: 60%;
            height: 90%;
            object-fit: cover; /* Menjaga rasio aspek gambar */
            border-radius: 50px;
            margin-bottom: 20px ; 
            width: 300px;
            position: relative; top: 80px;
            position: relative; left: 300px;
        }
        

        .col-md-6{
            position: relative; left: 290px;
            font-family: 'Outfit';
            font-size: medium;
        }
        .col-md-3{
            position: relative; top: 100px;
            position: relative; right: 250px;


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
            margin-top:10%;
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
    </style>
    <title>.</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar navbar-dark" style="background-color: #D4D4D4; height: 70px;">
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
</nav>

<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Profile</h1>
            </div>
        </div>
    </div>
</div>
<!-- Konten Utama -->
<div class="container mt-5">
    <div class="row">
        <!-- Gambar -->
        <div class="col-md-6">
            <img src="images/logo polos 2.png" alt="Gambar Group" class="img-fluid">
        </div>
        <!-- Deskripsi -->
        <div class="col-md-3">
            <h4>Isi Data Anda</h4>
            <p>Nama Lengkap <input type="text" placeholder="Masukkan Nama Lengkap" style="border: 1px solid #ccc; border-radius: 5px;"></p> <!-- Menambahkan properti border dan border-radius -->
            <p>Alamat: <br><textarea placeholder="Masukkan Alamat" rows="4" cols="25" style="border: 1px solid #ccc; border-radius: 5px;"></textarea></p> <!-- Menambahkan properti border dan border-radius -->
            <p>Gmail: <input type="text" placeholder="Masukkan Gmail" style="border: 1px solid #ccc; border-radius: 5px;"></p> <!-- Menambahkan properti border dan border-radius -->
            <a href="/profile" class="btn btn-secondary ml-2" style="color: white;">Ubah</a>
        </div>
    </div>
</div>


<!-- Tambahkan kontainer baru di bawah konten utama -->



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
</html>
