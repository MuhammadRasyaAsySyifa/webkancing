@extends('layouts.servis')
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

    input[type="text"],
    input[type="date"],
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

    button[type="submit"] {
        width: 20%;
        padding: 10px;
        background-color: #007bff; /* Warna tombol biru */
        color: #fff; /* Warna teks putih */
        border: none;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3; /* Warna tombol biru lebih gelap saat dihover */
    }

    .btn-secondary {
        background-color: #6c757d; /* Warna tombol abu-abu */
    }

    .btn-secondary:hover {
        background-color: #545b62; /* Warna tombol abu-abu lebih gelap saat dihover */
    }
</style>
<div class="container2" style="margin-top:50px">
    <form action="/pemesanan" method="POST" class="row">
        @csrf
        <!-- Gambar -->
        <div class="col-md-6">
            <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="img-fluid" style="max-width: 400px; height:600px; border-radius:40px;">
        </div>
        <!-- Deskripsi -->
        <div class="col-md-3">
            <h4>{{ $jasa->nama }}</h4>
            <p>Harga: Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</p>
            <p>Tanggal: <br>
                <input type="date" name="tanggal" required>
            </p>
            <p>Jumlah Pemesanan:</p>
            <div class="jumlah-container">
                <button type="button" onclick="kurangiJumlah()">-</button>
                <input type="text" name="jumlah" id="jumlahPemesanan" value="1" readonly>
                <button type="button" onclick="tambahJumlah()">+</button>
            </div>
            <p>Total Harga: <span id="totalHarga">Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</span></p>
            <p>Nama Lengkap <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required></p>
            <p>Alamat: <br><textarea name="alamat" placeholder="Masukkan Alamat" rows="4" cols="25" required></textarea></p>
            <p>Nomor Telepon: <input type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" required></p>
            <button type="submit" class="btn btn-outline-secondary" id="simpanTransaksiButton">Pesan</button>
            <a href="/service" class="btn btn-secondary ml-2" style="color: white;">Batal</a>
        </div>
    </form>
</div>

<script>
    function updateTotalHarga(jumlah) {
        var hargaSatuan = {{ $jasa->harga }};
        var totalHarga = hargaSatuan * jumlah;
        var totalHargaFormatted = formatRupiah(totalHarga);
        var totalHargaElement = document.getElementById('totalHarga');
        totalHargaElement.textContent = 'Rp. ' + totalHargaFormatted;
    }

    function tambahJumlah() {
        var input = document.getElementById('jumlahPemesanan');
        var currentValue = parseInt(input.value, 10);
        input.value = currentValue + 1;
        updateTotalHarga(currentValue + 1);
    }

    function kurangiJumlah() {
        var input = document.getElementById('jumlahPemesanan');
        var currentValue = parseInt(input.value, 10);
        if (currentValue > 1) {
            input.value = currentValue - 1;
            updateTotalHarga(currentValue - 1);
        }
    }

    // Fungsi untuk memformat harga dengan tanda titik sebagai pemisah ribuan
    function formatRupiah(angka) {
        var number_string = angka.toString();
        var split = number_string.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }
</script>
@endsection
