@extends('layouts.app')

@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Gallery</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Gallery -->
    {{-- iframe --}}
    {{-- <div class="container-iframe">
    <iframe src="https://drive.google.com/embeddedfolderview?id=13K1mdyRcBMbT57kzfd9YVa5bcJSIuifK#grid" style="width:100%; height:800px; border:0;"></iframe>
</div> --}}

{{-- gallery dengan crud --}}
    {{-- <div class="row">
        @foreach($galleries as $gambar)
        <div class="col-md-3 mb-2">
            <div class="card" style="border-radius: 15px; overflow: hidden;">
                <img src="{{ route('gallery.show', $gambar->id) }}" alt="Gambar {{ $gambar->id }}" class="card-img-top" style="border-radius: 15px 15px 0 0;">
            </div>
        </div>
        @endforeach
    </div> --}}

    <div class="container mt-4">
        <div id="image-gallery" class="row"></div>
    </div>
</div>
<script>
    // URL API Google Apps Script Anda
    const apiUrl = 'https://script.google.com/macros/s/AKfycby-anK9U9_YIUNqNXN46VweOxoumOp8-s-k-iXkWchyWv8u5snLxNHEkxjbDyqg0bMx-w/exec';

    function fetchImages() {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const gallery = document.getElementById('image-gallery');
                    data.forEach(file => {
                        // Membuat elemen card Bootstrap untuk setiap gambar
                        const col = document.createElement('div');
                        col.className = 'col-md-4 col-lg-3 mb-4'; // Menambahkan margin bawah untuk jarak antar gambar

                        const card = `
                            <div class="card shadow-sm">
                                <a href="https://drive.google.com/file/d/${file.id}/view" target="_blank">
                                    <img src="https://drive.google.com/thumbnail?id=${file.id}" class="card-img-top" alt="${file.name}" style="border-radius: 5px;">
                                </a>
                            </div>
                        `;
                        col.innerHTML = card;
                        gallery.appendChild(col);
                    });
                } else {
                    console.error('Tidak ada file ditemukan.');
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Panggil fungsi fetchImages setelah halaman dimuat
    fetchImages();
</script>
@endsection
<style>
    body{
        background: whitesmoke !important;
    }

    @media (max-width: 767.98px) {
        .card{
            margin-left: 30px;
            margin-right: 30px;
        }
    }
</style>