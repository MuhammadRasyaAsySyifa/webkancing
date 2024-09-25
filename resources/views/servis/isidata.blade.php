@extends('layouts.app')
@section('content')
<style>
    body {
        background-color: #D4D4D4;
    }
    .background-container {
        padding: 100px;
        margin-bottom: 50px;
        text-align: center;
    }

    .row {
        margin-left: 0;
        margin-right: 0;
    }

    .col-md-6 img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .detail-pemesanan {
        margin-top: 20px;
        padding: 0;
    }

    .detail-pemesanan h4 {
        margin-bottom: 5px; /* Atur margin bawah untuk h4 */
    }

    .detail-pemesanan h5 {
        margin-top: 10px; /* Atur jarak atas jika diperlukan */
        margin-bottom: 5px; /* Atur jarak bawah untuk h5 */
    }

    .detail-pemesanan p {
        margin: 0; /* Menghilangkan margin default pada p */
        padding: 0; /* Menghilangkan padding default pada p */
    }

    .horizontal-line {
        border: none;
        border-top: 2px solid #000;
        margin: 0;
        width: 180px;
    }

    .button-container {
        text-align: right;
        margin-top: 20px;
    }

    .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    .form-group {
        margin-bottom: 15px; /* Jarak antar input */
    }

    .form-group label {
        margin-bottom: 5px; /* Jarak bawah label */
    }

    .form-group input {
        margin-top: 5px; /* Jarak atas input */
    }

    @media (max-width: 767.98px) {
        /* .col-md-6 img {
            display: none;
        } */
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

<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('checkout2') }}" method="POST" class="col-md-12 col-lg-8">
            @csrf
            <!-- Input tersembunyi untuk mengirim ID Jasa dan waktu -->
            <input type="hidden" name="date" value="{{ session('booking_data')['date'] }}">
            <input type="hidden" name="time" value="{{ session('booking_data')['time'] }}">
            <input type="hidden" name="durasi" value="{{ $durasi }}">
            <input type="hidden" name="unique_code" value="{{ 'CODE Unik-' . strtoupper(Str::random(10)) }}">

            <a href="/deskripsilayanan/{{ $jasa->id }}/isiwaktu" class="d-flex align-items-center mb-4" style="text-decoration: none; color: #000; font-size: 18px; margin-top:30px;">
                <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" class="mr-2" style="transform: scaleX(-1);">
                    <path d="M8.22083109,4 C8.51380539,3.70718788 8.9886791,3.70731936 9.28149122,4.00029365 L17.2763084,12 L9.28047689,19.9997063 C8.98766478,20.2926806 8.51279106,20.2928121 8.21981676,20 C7.92684246,19.7071879 7.92671099,19.2323142 8.21952311,18.9393399 L15.1555752,12 L8.22053744,5.06066013 C7.92772532,4.76768583 7.92785679,4.29281212 8.22083109,4 Z"></path>
                </svg>
                Kembali
            </a>

            <div class="row">
                <!-- Gambar dan Detail Pemesanan -->
                <div class="col-md-6 mb-4">
                    <img src="{{ asset('storage/images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid rounded mb-3">
                    <div class="detail-pemesanan border p-4 rounded shadow-sm">
                        <!-- Judul yang dapat diklik untuk toggle detail -->
                        <div class="cursor-pointer" data-bs-toggle="collapse" data-bs-target="#orderDetails" aria-expanded="false" aria-controls="orderDetails">
                            <h4 class="text-center">Detail Pesanan</h4>
                            <hr class="horizontal-line mb-3" style="width: 100%">
                        </div>
                
                        <!-- Konten detail pemesanan yang disembunyikan -->
                        <div class="collapse mt-3" id="orderDetails">
                            <div class="card card-body">
                                <strong>{{ $jasa->nama }}</strong>
                                <p><strong>Tanggal:</strong> {{ date('j F Y', strtotime(session('booking_data')['date'])) }} {{ session('booking_data')['time'] }} WITA</p>
                                <p><strong>Durasi:</strong>  {{ $jasa->durasi }} menit</p>
                                <p><strong>Harga:</strong> Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- Deskripsi dan Detail Klien -->
                <div class="col-md-6">
                    <h4>Detail Pemesan</h4>
                    <hr class="horizontal-line mb-3">
                    <input type="hidden" name="nama_jasa" value="{{ $jasa->nama }}">
                    <input type="hidden" name="total_price" value="{{ $jasa->harga }}">
                    <p>Tolong diisi dengan benar!</p>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Masukkan Instagram Kamu" value="@">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>
                    <div class="button-container text-right mt-3">
                        <button type="submit" class="btn btn-secondary">Pesan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
