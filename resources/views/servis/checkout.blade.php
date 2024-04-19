@extends('layouts.checkout')
@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Check Out</h1>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 70px;">
    <div id="snap-container"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Detail Pesanan</h2>
                </div>
                <div class="card-body">
                    <!-- Menampilkan gambar jasa -->
                    <p><strong>Nama Lengkap:</strong> {{ $order->name }}</p>
                    <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                    <p><strong>Alamat:</strong> {{ $order->address }}</p>
                    <p><strong>Nama Layanan:</strong> {{ $order->nama_jasa }}</p>
                    <p><strong>Tanggal:</strong> {{ $order->date }}</p>
                    <p><strong>Waktu:</strong> {{ $order->time }}</p>
                    <p><strong>Jumlah:</strong> {{ $order->qty }}</p>
                    <p><strong>Total Harga:</strong> Rp. {{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
            <button class="btn btn-secondary mt-3" id="pay-button">Bayar Sekarang</button>
        </div>
    </div>
</div>


@endsection
