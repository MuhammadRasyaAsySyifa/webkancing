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
    .table-container {
        overflow-x: auto;
    }
    .container {
        margin-top: 20px;
    }
</style>

<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Halaman Admin</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-2 mb-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/manage" class="btn btn-outline-secondary">Kelola Gallery</a>
        <a href="/servis" class="btn btn-outline-secondary">Kelola Servis</a>
        <a href="/jadwal" class="btn btn-outline-secondary">Kelola Jadwal</a>
        <a href="{{ route('exportpdf') }}" class="btn btn-outline-secondary">Unduh Data Pesanan Ke PDF</a>
    </div>
</div>

<div class="container">
    <h1>Daftar Pesanan</h1>
    
    <!-- Search input field -->
    <input id="myInput" type="text" class="form-control mb-3" placeholder="Cari Kode Unik...">

    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Instagram</th>
                    <th>Nama Jasa</th>
                    <th>Kode Unik</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Total Harga</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->instagram }}</td>
                    <td>{{ $order->nama_jasa }}</td>
                    <td>{{ $order->unique_code }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->date)->translatedFormat('l, d F Y') }}</td>
                    <td>{{ date('H:i', strtotime($order->time)) }}</td>
                    <td>{{ $order->durasi}} menit</td>
                    <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if($order->bukti_pembayaran)
                            <!-- Menampilkan gambar jika bukti pembayaran sudah ada -->
                            <img src="{{ asset('storage/bukti_pembayaran/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
                            <br>
                            <a href="{{ asset('storage/bukti_pembayaran/' . $order->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                        @else
                            <!-- Menampilkan tombol upload jika belum ada bukti pembayaran -->
                            <form action="{{ route('upload-bukti', $order->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="bukti_pembayaran" accept="image/*" required>
                                <button type="submit">Tambahkan Bukti Pembayaran</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <button class="status-button {{ $order->status == 'Paid' ? 'status-paid' : 'status-unpaid' }}"
                            onclick="toggleStatus({{ $order->id }})">
                            {{ $order->status == 'Paid' ? 'Lunas' : 'Belum Lunas' }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function toggleStatus(orderId) {
        // Menggunakan AJAX untuk mengubah status
        fetch(`/toggle-status/${orderId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ orderId: orderId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const button = document.querySelector(`button[onclick="toggleStatus(${orderId})"]`);
                button.classList.toggle('status-paid');
                button.classList.toggle('status-unpaid');
                button.textContent = data.newStatus === 'Paid' ? 'Lunas' : 'Belum Lunas';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

@endsection
