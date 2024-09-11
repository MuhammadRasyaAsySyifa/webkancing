<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.stg.midtrans.com/snap/snap.js"data-client-key="{{config('midtrans.client_key')}}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Studio Foto</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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


            .navbar-nav {
    display: flex;
    justify-content: center; 
    flex: 1;
    font-size: 15px;
}

.navbar-nav .nav-item {
    margin: 0 10px; 
}

.navbar-nav .nav-item:last-child {
    margin-left:10px; 
}

/* CSS */
.navbar-brand img {
    max-height: 110px; /* Sesuaikan ukuran yang diinginkan */
    position: relative; left: 35%;
}

.navbar {
    height: 70px; /* Tinggi navbar konstan */
}


            .nav-item .nav-link{
                color: black !important;
                font-weight: 500;
                font-size: 110%;
                position: relative;
                right: 90px;
            }
            .nav-item span {
                position: relative;
                left:150px;
            }
            
            .nav-icon{
                color: black !important;
                font-size: 130%;
                position: relative;
                right: 30px;
            }
            .nav-item.dropdown a.nav-link  {
            position: relative;
            left: 40px; /* Sesuaikan nilai ini dengan yang diinginkan */
            }

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
                position: relative;
                right: 10px;
                text-align: center;
                
            }
            .nav-link i {
                position: relative;
                right: 21px;
                left: auto;
                right: auto;
            }
            .nav-link span{
                position: relative;
                right: 20px; 
                left: auto;
            }
            .offcanvas-body .nav-item {
                margin: 0; 
            }
            .navbar-toggler {
                    position: relative;
                    right: 10px;
                    bottom: 15px;
            }

            .navbar-brand img {
                    max-height: 90px; 
                    width: 170px;
                    position: relative;
                    bottom: 15px;
                    left: auto;
            }
            .nav-item span{
                position: relative;
                left: 2px;
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
            text-align: left; /* Mengatur teks menjadi rata kiri */
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
    }
    </style>
</head>
<body>
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
    <script src="https://kit.fontawesome.com/b604af375e.js" crossorigin="anonymous"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
  <script>
    // Saat tombol "Bayar Sekarang" ditekan
    document.getElementById('pay-button').onclick = function(){
        // Panggil fungsi snap.pay() dengan token yang diperoleh sebelumnya
        snap.pay('{{$snapToken}}', {
            // Callback saat pembayaran selesai
            onSuccess: function(result){
                console.log('Pembayaran sukses: ', result);
                window.location.href = '/invoice/{{$order->id}}'
            },
            // Callback saat pembayaran gagal
            onPending: function(result){
                console.log('Pembayaran tertunda: ', result);
            },
            // Callback saat pembayaran dibatalkan
            onError: function(result){
                console.log('Pembayaran gagal: ', result);
            }
        });
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
