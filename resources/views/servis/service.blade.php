@extends('layouts.servis')

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

<!-- Filter Kategori -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Pilih Layanan Kami</h3>
            <div class="btn-group" role="group">
                <button class="btn filter-category" data-category="all">Semua Jasa</button>
                @foreach ($kategoris as $kategori)
                    <button class="btn filter-category" data-category="{{ $kategori->kategori }}">{{ ucfirst($kategori->kategori) }}</button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Daftar Layanan -->
<div class="container mt-5">
    <div class="row jasa-container">
        @foreach ($jasas as $jasa)
        <div class="col-md-5 jasa-item" data-category="{{ $jasa->kategori }}" style="margin-bottom: 60px;">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" style="max-width: 250px; height:400px;">
            <h4>{{ $jasa->nama }}</h4>
            <div style="max-width: 270px; overflow: hidden;">
                <p>{{ $jasa->deskripsi }}</p>
            </div>
            <a href="/deskripsilayanan/{{ $jasa->id }}" class="view-more" style="text-decoration: none;">Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</a>
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
                        item.style.display = 'block'; // Tampilkan item
                    } else {
                        item.style.display = 'none'; // Sembunyikan item
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
<style>/* CSS untuk tombol kategori */
   /* CSS untuk tombol kategori */
.btn-group {
    display: flex;
    justify-content: center;
    margin-top: 10px;
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
    transition: background-color 0.3s, color 0.3s; /* Efek transisi */
}

/* Garis panjang di bawah kategori */
.btn::after {
    border: none !important;/* Menghapus border default */
    content: "";
    position: absolute;
    bottom: -5px; /* Jarak dari bawah tombol */
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #000000; /* Warna garis */
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
}

/* CSS untuk tombol aktif */
.btn.active {
    background-color: transparent; /* Menghapus background saat tombol aktif */
    color: #000000; /* Warna teks saat tombol aktif */
    border: none; /* Menghapus border saat tombol aktif */
}

    </style>
