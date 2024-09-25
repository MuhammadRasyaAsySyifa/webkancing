@extends('layouts.app')
@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<div class="container mt-5">
    <div class="row justify-content-center"> <!-- Menggunakan Bootstrap Grid untuk responsif -->
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-start"> <!-- Flexbox untuk tampilan horizontal -->
                <div class="text-left mb-3">
                    <h4 class="profile-title">Akun Profile</h4>
                    @auth
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <p class="logout-text">Logout</p>
                        </a>
                        <!-- Form untuk logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <p class="user-info">{{ Auth::user()->address }}</p>
                        @if (auth()->check() && auth()->user()->isAdmin())
                            <a href="/adminmanage" class="btn btn-outline-secondary">Halaman Admin</a>
                        @endif
                    @else
                        <p class="user-info">Silakan login untuk melihat profil Anda.</p>
                    @endauth
                </div>
                <div class="text-right">
                    @auth
                        <p class="user-info">Detail akun</p>
                        <p class="user-info">{{ Auth::user()->name }}</p>
                        <p class="user-info">{{ Auth::user()->email }}</p>
                        <a href="/editprofile" class="btn btn-secondary ml-2">Edit Profile</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary ml-2">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .profile-title {
        font-size: 24px;
    }

    .logout-text {
        font-size: 18px;
        color: black !important;
    }

    .user-info {
        font-size: 18px;
    }

    /* Responsif untuk layar kecil, tetap horizontal */
    @media (max-width: 768px) {
        .profile-title {
            font-size: 20px; /* Sesuaikan ukuran font untuk layar kecil */
        }

        .logout-text, .user-info {
            font-size: 16px; /* Ukuran font lebih kecil pada layar kecil */
        }

        .d-flex {
            flex-wrap: wrap; /* Gunakan wrap agar elemen tidak menumpuk di layar kecil */
            justify-content: space-between; /* Memastikan jarak antara elemen */
        }

        .text-left, .text-right {
            flex: 1; /* Membuat kedua kolom memakan ruang yang sama */
            text-align: left; /* Tetap kiri, bukan pusat */
            margin-bottom: 10px; /* Tambahkan margin jika diperlukan */
        }

        .text-right {
            text-align: right; /* Tetap rata kanan */
        }
    }
</style>
