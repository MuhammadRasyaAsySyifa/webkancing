{{-- @extends('layouts.servis')
@section('content')
<style>
    .container2 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Sesuaikan tinggi container sesuai kebutuhan */
    }

    .col-md-6 {
    flex: 1; /* Agar foto memenuhi setengah lebar container */
    padding-right: 100px; /* Beri padding kanan untuk memberi jarak antara gambar dan form input */
}


    .col-md-3 {
        flex: 1; /* Agar form input memenuhi setengah lebar container */
    }

    /* Gaya tambahan untuk mempercantik tampilan */
    .col-md-3 {
        padding: 0 20px; /* Beri padding untuk memberi jarak antara elemen */
    }

    input[type="date"],
    input[type="time"],
    textarea  {
        width: calc(50% - 22px); /* Agar input memenuhi lebar container */
        margin-bottom: 10px; /* Beri jarak antar input */
        padding: 5px; /* Beri padding untuk tampilan yang lebih baik */
        box-sizing: border-box; /* Agar padding tidak menambah lebar input */
    }

    input[type="text"],
    textarea {
        width: calc(100% - 22px); /* Agar input memenuhi lebar container */
        margin-bottom: 10px; /* Beri jarak antar input */
        padding: 5px; /* Beri padding untuk tampilan yang lebih baik */
        box-sizing: border-box; /* Agar padding tidak menambah lebar input */
    }

    .jumlah-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: calc(88% + 20px);
    }

    .jumlah-container button {
        padding: 5px 10px;
        font-size: 16px;
        cursor: pointer;
        background-color: #5d5d5d;
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .jumlah-container input {
        width: 150px;
        text-align: center;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

</style>
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Check Out</h1>
            </div>
        </div>
    </div>
</div>
<div class="container2">
    <form action="{{ route('checkout2') }}" method="POST" class="row">
        @csrf
        <!-- Input tersembunyi untuk mengirim ID Jasa dan waktu -->
        <input type="hidden" name="date" value="{{ session('booking_data')['date'] }}">
        <input type="hidden" name="time" value="{{ session('booking_data')['time'] }}">
        <input type="hidden" name="durasi" value="{{ $durasi }}">
        <input type="hidden" name="unique_code" value="{{ 'ORD-' . strtoupper(Str::random(10)) }}">

        <!-- Gambar -->
        <div class="col-md-6">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid" style="max-width: 520px; height:600px; border-radius:40px;">
        </div>

        <!-- Deskripsi -->
        <div class="col-md-3">
            <h4>{{ $jasa->nama }}</h4>
            <input type="hidden" name="nama_jasa" value="{{ $jasa->nama }}">
            <input type="hidden" name="total_price" value="{{ $jasa->harga }}">
            <p>Harga: Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</p>
            <p>Nama Lengkap <input type="text" name="name" placeholder="Masukkan Nama Lengkap" required></p>
            <p>Nomor Telepon: <input type="text" name="phone" placeholder="Masukkan Nomor Telepon" required></p>
            <p>Instagram <input type="text" name="instagram" placeholder="Masukkan Instagram Kamu" required></p>
            <p>Email<input type="text" name="email" placeholder="Masukkan Email" required></p>
            <button type="submit" class="btn btn-secondary ml-2">Periksa</button>
            <a href="/service" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection --}}
@extends('layouts.servis')
@section('content')
<style>
    body{
        background-color: #D4D4D4;
    }
    .container2 {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 50px;
        margin: 0px 200px 100px 200px;
        border-radius: 20px;
    }

    .background-container {
        padding: 100px;
        margin-bottom: 50px;
        text-align: center;
    }

    .col-md-6 {
        flex: 1;
        padding-right: 50px;
    }

    .col-md-3 {
        flex: 5;
    }

    .col-md-3 {
        padding: 0 20px;
    }

    input[type="date"],
    input[type="time"],
    textarea {
        width: calc(50% - 20px);
        margin-bottom: 10px;
        padding: 7px;
        box-sizing: border-box;
        border-radius: 5px;
    }

    input[type="text"],
    textarea {
        width: calc(100% - 22px);
        margin-bottom: 10px;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 5px; 
        height: 50px;
        border-width: 0px;
        font-size: 15px;
    }

    .detail-pemesanan {
        margin-top: 20px;
    }

    .detail-pemesanan p {
        margin: 5px 0;
        line-height: 1.4;
        font-size: 15px;
    }

    .button-container {
        text-align: right;
        margin-top: 20px;
    }

    .btn-primary {
        background-color: #adadad;
        border-color: #5c5c5c;
        font-weight: bold;
        padding: 0.75rem 1.5rem;
        border-radius: 0.25rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: bold;
        padding: 0.75rem 1.5rem;
        border-radius: 0.25rem;
        position: relative;
        right: 23px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .horizontal-line {
        border: none;
        border-top: 2px solid #000;
        margin: 0px;
        width: 180px;
    }

    body, h1, h4, p, input{
        color: #5e5e5e;
    }
</style>
<div class="background-container mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Pemesanan</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container2">
    <form action="{{ route('checkout2') }}" method="POST" class="row">
        @csrf
        <!-- Input tersembunyi untuk mengirim ID Jasa dan waktu -->
        <input type="hidden" name="date" value="{{ session('booking_data')['date'] }}">
        <input type="hidden" name="time" value="{{ session('booking_data')['time'] }}">
        <input type="hidden" name="durasi" value="{{ $durasi }}">
        <input type="hidden" name="unique_code" value="{{ 'CODE Unik-' . strtoupper(Str::random(10)) }}">
        <a href="/deskripsilayanan/{{ $jasa->id }}/isiwaktu" style="text-decoration: none; color: #000; font-size: 18px; display: flex; align-items: center; margin-bottom:40px;">
            <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" style="margin-right: 8px; transform: scaleX(-1);">
                <path d="M8.22083109,4 C8.51380539,3.70718788 8.9886791,3.70731936 9.28149122,4.00029365 L17.2763084,12 L9.28047689,19.9997063 C8.98766478,20.2926806 8.51279106,20.2928121 8.21981676,20 C7.92684246,19.7071879 7.92671099,19.2323142 8.21952311,18.9393399 L15.1555752,12 L8.22053744,5.06066013 C7.92772532,4.76768583 7.92785679,4.29281212 8.22083109,4 Z"></path>
            </svg>
            Kembali
        </a>
        <!-- Gambar dan Detail Pemesanan -->
        <div class="col-md-6">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid" style="max-width: 350px; height:400px; border-radius:10px;">
            <div class="detail-pemesanan">
                <h4>Detail Pemesanan</h4>
                <hr class="horizontal-line" style="margin-bottom:10px;">
                <h5><strong>{{ $jasa->nama }}</strong></h5>
                <p><strong>{{ date('j F Y', strtotime(session('booking_data')['date'])) }} {{ session('booking_data')['time'] }} WITA</strong></p>
                <p>{{ $durasi }} Menit</p>
                <p><strong>Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</strong></p>
            </div>
        </div>

        <!-- Deskripsi dan Detail Klien -->
        <div class="col-md-3">
            <h4>Detail Klien</h4>
            <hr class="horizontal-line">
            <input type="hidden" name="nama_jasa" value="{{ $jasa->nama }}">
            <input type="hidden" name="total_price" value="{{ $jasa->harga }}">
            <p>Tolong diisi dengan benar!</p>
            <p>Nama Lengkap <input type="text" name="name" placeholder="Masukkan Nama Lengkap" required></p>
            <p>Nomor Telepon: <input type="text" name="phone" placeholder="Masukkan Nomor Telepon" required></p>
            <p>Instagram <input type="text" name="instagram" placeholder="Masukkan Instagram Kamu" value="@"></p>
            <p>Email <input type="text" name="email" placeholder="Masukkan Email" required></p>
            <div class="button-container">
                <button type="submit"class="btn btn-secondary btn-block">Pesan</button>
                <a href="/service" class="btn btn-secondary btn-block">Batal</a>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.querySelector('input[name="email"]');
        
        emailInput.addEventListener('input', function() {
            const emailValue = emailInput.value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (emailValue && !emailPattern.test(emailValue)) {
                emailInput.setCustomValidity("Format email tidak valid. Pastikan email Anda benar.");
            } else {
                emailInput.setCustomValidity("");
            }
        });
    });
</script>

@endsection
