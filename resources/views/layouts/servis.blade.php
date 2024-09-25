<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Studio Foto</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


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

        
         
        .background-container {
        background-image: url('{{ asset('images/banner.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        color: #000000; /* Warna teks pada latar belakang gelap */
        padding: 100px; /* Sesuaikan sesuai kebutuhan Anda */
        text-align: center;
        height: 220px; /* Tinggi area latar belakang */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .heading {
        background-color: #6A5D5D; /* Background color kotak */
        padding: 10px; /* Jarak dalam kotak */
        display: inline-block; /* Agar kotak mengikuti ukuran teks */
        position: relative;
        top: 60px;
    }
    
    .heading h1 {
        color: white; /* Warna teks putih */
        font-size: 30px; /* Ukuran font h1 */
        font-family: 'Outfit'; /* Font yang digunakan */
        margin: 0; /* Menghilangkan margin default pada h1 */
    }


            .content-container {
                background-color: #D4D4D4;
                padding: 20px;
                font-family: 'Outfit', sans-serif;
                height: 560px;
                position: relative;bottom: 
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
            /* text-align: left;  */
        }  
        .col-md-5 img {
            max-width: 60%;
            height: 60%;
            object-fit: cover; /* Menjaga rasio aspek gambar */
            border-radius: 10px;
            margin-bottom: 20px ; 
            width: 300px;
        }
        

        .col-md-5{
            /* position: relative; left: 250px; */
            font-family: 'Outfit';
            font-size: medium;
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
/* Navbar container */
.navbar {
    height: 70px; /* Fixed height for the navbar */
    position: relative; /* Make navbar the positioning context for absolute elements */
}

/* Center the menu items */
.navbar-nav {
    display: flex;
    justify-content: center; 
    flex: 1;
    font-size: 15px;
}

/* Adjust margins for nav items */
.navbar-nav .nav-item {
    margin: 0 10px; 
}

.navbar-nav .nav-item:last-child {
    margin-left: 10px; 
}

/* Navbar brand positioning */
.navbar-brand {
    position: absolute; /* Position the logo absolutely */
    left: 200px; /* Adjust this value to move the logo to the right */
    top: 50%; /* Center vertically */
    transform: translateY(-50%); /* Center vertically */
}

/* Navbar brand image */
.navbar-brand img {
    max-height: 110px; /* Adjust size as needed */
}

/* Profile positioning */
.profile {
    position: absolute; /* Use absolute positioning */
    right: 200px; /* Align to the right */
    top: 50%;
    transform: translateY(-50%); /* Center vertically */
}

/* Styling for nav links */
.nav-item .nav-link {
    color: black !important;
    font-weight: 500;
    font-size: 110%;
}

/* Styling for nav icons */
.nav-icon {
    color: black !important;
    font-size: 130%;
}

/* Adjustments for dropdown menu items */
.nav-item.dropdown a.nav-link {
    position: relative;
    left: 40px;
}

/* Mobile view adjustments */
@media (max-width: 767.98px) {
    .offcanvas-end {
        width: 190px !important; 
    }

    .offcanvas-body {
        padding: 1rem; 
    }

    .offcanvas-body .nav-link {
        font-size: 1.25rem; 
        padding: 1rem 0; 
        text-align: center;
    }

    .nav-link i {
        position: relative;
        right: 0;
    }

    .profile {
        position: relative;
        left: auto;
        right: auto;
        top: 20px;
    }

    .offcanvas-body .nav-item {
        margin: 0; 
    }

    .navbar-toggler {
        position: absolute;
        right: 10px; /* Align toggler to the right */
        top: 50%;
        transform: translateY(-50%); /* Center vertically */
    }

    .navbar-brand img {
        height: 210px;
        width: 240px;
        position: relative;
        right: 180px;
    }

    .nav-item span {
        position: relative;
        left: 2px;
    }

    .navbar {
        height: 100px;
    }
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light custom-navbar navbar-dark" style="background-color: #D4D4D4;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo polos 2.png') }}" alt="Logo Anda">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Sidebar for mobile -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/gallery') }}">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/service')}}">Service</a>
                            </li>
                            <div class="profile">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-regular fa-user"></i> <span>Masuk</span></a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile') }}">
                                        <i class="fa-solid fa-user" style="margin-right: 8px;"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                            @endguest
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        {{-- <div class="footer mt-5">
        <div class="footer1-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
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
    </div> --}}
        <footer class="d-flex flex-column align-items-center justify-content-center">
            <hr> <!-- Pembatas -->
            <p>&copy; 2023 Kancing Production. All Rights Reserved.</p>
        </footer>
        
    </div>
    <script src="https://kit.fontawesome.com/b604af375e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
