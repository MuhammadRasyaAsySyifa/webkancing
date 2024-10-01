@extends('layouts.app')

@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Layanan</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Kategori dengan Navigasi Scroll -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h4 style="text-align: center">Pilih Layanan Kami</h4>

                <!-- Kategori Scrollable -->
                <div class="scrollable-category">
                    <button class="btn filter-category" data-category="all">Semua Jasa</button>
                    @foreach ($kategoris as $kategori)
                        <button class="btn filter-category" data-category="{{ $kategori->kategori }}">{{ ucfirst($kategori->kategori) }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row jasa-container">
        @foreach ($jasas as $jasa)
        <div class="col-md-3 col-sm-6 jasa-item" data-category="{{ $jasa->kategori }}">
            <div class="card h-100 shadow-sm"> <!-- Card wrapper with shadow -->
                <a href="/deskripsilayanan/{{ $jasa->id }}">
                    <img src="{{ asset('storage/images/' . $jasa->gambar) }}" class="card-img-top" alt="{{ $jasa->nama }}" style="height: 300px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/deskripsilayanan/{{ $jasa->id }}" class="text-dark" style="text-decoration: none;">
                            {{ $jasa->nama }}
                        </a>
                    </h5>
                    <p class="card-text">
                        {{ Str::limit($jasa->deskripsi, 100) }} <!-- Membatasi teks deskripsi -->
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <a href="/deskripsilayanan/{{ $jasa->id }}" class="btn btn-secondary w-100">
                        Lihat Detail
                    </a>
                    <p class="text-muted mt-2">Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.filter-category');
    const jasaItems = document.querySelectorAll('.jasa-item');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            jasaItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                if (category === 'all' || itemCategory === category) {
                    item.style.display = 'block'; // Menampilkan item kembali
                } else {
                    item.style.display = 'none'; // Menghilangkan item dari tampilan
                }
            });

            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');
        });
    });
});
</script>
@endsection
<style>
body{
    background-color: #eaeaea !important;
}

.jasa-container {
    font-family: 'Outfit';
    display: flex;
    flex-wrap: wrap; 
    justify-content: center; 
}

.jasa-item {
    display: flex;
    flex-direction: column;
    align-items: center !important; 
    text-align: center !important; 
    margin-bottom: 30px; 
    transition: opacity 0.5s ease, visibility 0.5s ease, transform 0.5s ease; /* Smooth transition for visibility, opacity, and position */
    opacity: 1; /* Start fully visible */
    visibility: visible; /* Start visible */
    transform: translateY(0); /* Start in place */
}


.jasa-item h4 a {
    text-decoration: none; 
    color: inherit;
}

.jasa-item h4 {
    margin: 0; 
    margin-bottom: 5px;
    width: auto;
}

.jasa-item p {
    display: block; /* Ensures block-level behavior */
    max-width: 250px;
    overflow: hidden;
    line-height: 1.3;
    text-align: center !important;
    margin: 0 auto;
}
.card{
    background: #ededed !important;
}


.card-title a {
    color: #333; /* Mengatur warna judul */
    font-weight: bold;
    text-decoration: none;
}

.card-footer {
    text-align: center;
}
/* Category Button Transitions */
.btn-group {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
.scrollable-category{
    text-align: center;
}
.btn {
    border: none !important;/* Menghapus border default */
    background-color: transparent; /* Menghapus background default */
    color: black; /* Warna teks tombol */
    padding: 10px 20px; /* Padding tombol */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Menunjukkan tombol dapat diklik */
    margin: 0 5px; /* Jarak antar tombol */
    border-radius: 5px; /* Sudut tombol membulat */
    position: relative; /* Untuk positioning garis bawah */
    transition: background-color 0.3s, color 0.3s, transform 0.3s ease; /* Smooth transition for hover and active state */
}

/* Garis panjang di bawah kategori */
.btn::after {
    content: "";
    position: absolute;
    bottom: -5px; /* Jarak dari bawah tombol */
    left: 0;
    width: 100%;
    height: 2px;
    background-color: transparent; /* Hidden by default */
    transition: background-color 0.3s, height 0.3s; 
}

/* Garis menjadi lebih tebal dan berubah warna saat tombol aktif */
.btn.active::after {
    height: 4px; /* Lebar garis saat tombol aktif */
    background-color: #000000; /* Warna garis saat tombol aktif */
}

/* Efek hover */
.btn:hover {
    background-color: #f0f0f0; /* Background saat hover */
    color: #000000; /* Warna teks saat hover */
    transform: scale(1.05); /* Slight scale on hover */
}

/* CSS untuk tombol aktif */
.btn.active {
    background-color: transparent; /* Menghapus background saat tombol aktif */
    color: #000000; /* Warna teks saat tombol aktif */
    border: none; /* Menghapus border saat tombol aktif */
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
        .col-md-3 img {
            margin-top: 20px;
            max-width: 80%;
            height: 90%;
            object-fit: cover; /* Menjaga rasio aspek gambar */
            border-radius: 10px;
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
        .scrollable-category .btn {
    flex: 0 0 auto; /* Prevent shrinking */
    padding: 10px 15px; /* Add padding */
    margin-right: 8px; /* Add margin between buttons */
    white-space: nowrap; /* Prevent text wrapping */
    font-size: 14px;
    border: 1px solid #ddd;
    background-color: #f8f9fa;
    box-sizing: border-box; /* Include padding and border in width */
}

.scroll-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #fff;
    cursor: pointer;
    z-index: 1;
}
        
/* Untuk responsive di mobile */
@media (max-width: 768px) {
   /* styles.css */
body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.scroll-container {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.scrollable-category {
    display: flex;
    overflow-x: auto; /* Enable horizontal scrolling */
    white-space: nowrap; /* Prevent wrapping */
    padding: 10px 0;
    scroll-behavior: smooth; /* Smooth scrolling */
}

.scrollable-category::-webkit-scrollbar {
    display: none; /* Hide scrollbar for aesthetics */
}

.scrollable-category .btn {
    flex: 0 0 auto; /* Prevent shrinking */
    padding: 10px 15px; /* Add padding */
    margin-right: 8px; /* Add margin between buttons */
    white-space: nowrap; /* Prevent text wrapping */
    font-size: 14px;
    border: 1px solid #ddd;
    background-color: #f8f9fa;
    box-sizing: border-box; /* Include padding and border in width */
}

.scroll-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #fff;
    cursor: pointer;
    z-index: 1;
}

.scroll-btn-left {
    left: 0;
}

.scroll-btn-right {
    right: 0;
}
}
    /* .btn-group {
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
        padding: 10px;
        width: 65%;
        flex-shrink: 0;
        
        
    }
    .btn {
    display: inline-block; 
    white-space: nowrap;
    font-size: 16px;
    margin: 0 5px; 
}

    .scroll-btn {
        display: block;
    }

    .scroll-btn-left {
        left: 0;
    }

    .scroll-btn-right {
        right: 0;
    }

    .btn-group::-webkit-scrollbar {
        display: none; 
        width: auto;
        }

    .btn-group {
        -ms-overflow-style: none; 
        scrollbar-width: none; 
    } */

    </style>
