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
    <div class="row mx-auto" style="position: relative; left: 4%;">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center" style="position: relative; left: 50%;">
                <div class="text-left" >
                    <h4 style="font-size: 24px;">Akun Profile</h4> <!-- Menambahkan font-size di sini -->
                    <p style="font-size: 18px;">Logout</p> <!-- Menambahkan font-size di sini -->
                    <p style="font-size: 18px;">Detail akun</p> <!-- Menambahkan font-size di sini -->
                    <p style="font-size: 18px;">Riwayat pemesanan</p> <!-- Menambahkan font-size di sini -->
                    <p style="font-size: 18px;">Kamu belum membuat pemesanan</p> <!-- Menambahkan font-size di sini -->
                </div>
                <div class="text-right">
                    <p style="font-size: 18px;">Muhammad Rasya Asy-Syifa</p> <!-- Menambahkan font-size di sini -->
                    <p style="font-size: 18px;">Jalan Mangga Kecil No.13, RT 09 RW 03,<br>Kelurahan Besi Tua, Kecamatan Sukaraja,<br> Kab. Binjai, Sumatera Utara.</p> <!-- Menambahkan font-size di sini -->
                    <a href="/editprofile" class="btn btn-secondary ml-2" style="color: white;">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection