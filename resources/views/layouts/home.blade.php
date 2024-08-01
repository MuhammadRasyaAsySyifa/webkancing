<!doctype html>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="website icon" type="png" href="{{ asset('images/logo 1.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
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
        
        .background-container {
                background-image: url('{{ asset('images/gallery.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                color: #000000; /* Warna teks pada latar belakang gelap */
                padding: 100px ; /* Sesuaikan sesuai kebutuhan Anda */
                text-align: center;
            }
    
            .background-container h1 {
                font-size: 40px;
                font-family: 'Outfit';
                font-weight: bold;
                margin-bottom: 20px;
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
            color: black !important;
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
    <div id="app">
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
                            <p><a class="nav-link" href="{{ url('/') }}">Home</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="nav-link" href="{{ url('/gallery') }}">Gallery</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="nav-link" href="{{ url('/service')}}">Service</a></p>
                        </li>
                    </ul>
        
                    
                    <!-- Right Side Of Navbar -->
                    <div class="" style="position: relative; right:125px">
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
            </div>
        </nav>
        
        <main>
            @yield('content')
        </main>
        <div class="footer mt-5">
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
    </div>
        <footer class="d-flex flex-column align-items-center justify-content-center">
            <hr> <!-- Pembatas -->
            <p>&copy; 2023 Kancing Production. All Rights Reserved.</p>
        </footer>
        
    </div>
    {{-- <script>
        let gambar = document.getElementById('gambar');
        let gambarArray = ['https://i.pinimg.com/564x/f9/60/25/f9602594b6e78819980cc9bddf7054c2.jpg', 'https://i.pinimg.com/564x/fa/3c/f1/fa3cf1a93c535769a37c9aa64e9a8332.jpg', 'https://i.pinimg.com/564x/f8/1d/71/f81d71a1f6a75144ebbc69ffbbc1cc1f.jpg', 'https://i.pinimg.com/564x/4e/b0/70/4eb07000929786c800dc8eda61106f15.jpg'];
        let index = 0;
    
        setInterval(function() {
            index = (index + 1) % gambarArray.length;
            gambar.src = gambarArray[index];
        }, 3000);
        gambar.style.width = '300px';
        gambar.style.height = '450px'; 
    </script> --}}
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
    </script>
    
    
    
    
    <script src="https://kit.fontawesome.com/b604af375e.js" crossorigin="anonymous"></script>

</body>
</html>
