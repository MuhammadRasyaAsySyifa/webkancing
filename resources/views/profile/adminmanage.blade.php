@extends('layouts.app')
@section('content')
<style>
   .status-paid {
        color: green !important;
        border: 2px solid green !important;
    }
    .status-unpaid {
        color: red !important;
        border: 2px solid red !important;
    }
</style>


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
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Pesanan</h1>
            <table class="table table-bordered" >
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
                        <td>{{ $order->nama_jasa }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->time }}</td>
                        <td>{{ $order->qty }}</td>
                        <td class="{{ $order->status == 'Paid' ? 'status-paid' : ($order->status == 'Unpaid' ? 'status-unpaid' : '') }}">
                            {{ $order->status }}
                        </td>
                        <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
