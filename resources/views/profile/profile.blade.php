@extends('layouts.app')
@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>User Profile</h1>
            </div>
        </div>
    </div>
</div>
<br><br>    
<div class="container mt-5">
    <div class="row mx-auto" style="position: relative; left: 5%;">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center" style="position: relative; left: 40%;">
                <div class="text-left">
                    <h4 style="font-size: 24px;">Akun Profile</h4> <!-- Menambahkan font-size di sini -->
                    @auth
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <p style="font-size: 18px; color: black !important;">Logout</p>
                        </a>
                        <!-- Form untuk logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <p style="font-size: 18px;">  
                            <p style="font-size: 18px;">{{ Auth::user()->address }}</p> <!-- Menambahkan font-size di sini -->
                            @if (auth()->check() && auth()->user()->isAdmin())
                                <a href="/adminmanage" class="btn btn-outline-secondary">Halaman Admin</a>
                            @endif</p>
                    @else
                        <p style="font-size: 18px;">Silakan login untuk melihat profil Anda.</p>
                    @endauth
                </div>
                <div class="text-right">
                    @auth
                        <p style="font-size: 18px;">Detail akun</p> <!-- Menambahkan font-size di sini -->
                        <p style="font-size: 18px;">{{ Auth::user()->name }}</p> <!-- Menambahkan font-size di sini -->
                        <p style="font-size: 18px;">{{ Auth::user()->email }}</p> <!-- Menambahkan font-size di sini -->
                        <a href="/editprofile" class="btn btn-secondary ml-2" style="color: white;">Edit Profile</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary ml-2" style="color: white;">Login</a>
                    @endauth
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection