@extends('layouts.app')
@section('content')
<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Halaman Admin</h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt-2 mb-3">
<div class="btn-group" role="group" aria-label="Basic example">
    <a href="/manage" class="btn btn-outline-secondary">Kelola Gallery</a>
    <a href="/servis" class="btn btn-outline-secondary">Kelola Servis</a>
    <a href="/manage" class="btn btn-outline-secondary">Kelola Gallery</a>
  </div>
</div>

    {{-- <div class="container mt-2 mb-3">
        <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            Kelola Lainnya
        </button>
        
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <li><a href="/manage" class="btn btn-outline-secondary">Kelola Gambar</a></li>
                <br>
                <li><a href="/servis" class="btn btn-outline-secondary">Kelola Jasa</a></li>
            </div>
        </div>
    </div> --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Pesanan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Jasa</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->nama_jasa}}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->time }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->status }}</td>
                        <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection