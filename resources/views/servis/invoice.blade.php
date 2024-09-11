@extends('layouts.servis')

@section('content')
<div class="background-container mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Invoice</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="invoice-container">
    <div class="container">
        <div class="invoice-header text-center">
            <h1>Invoice</h1>
            <p>Terima kasih telah memesan layanan kami!</p>
            <h4>{{$order->unique_code}}</h4>
        </div>
        <div class="invoice-details">
            <div class="row">
                <div class="col-md-6">
                    <h4>Informasi Pemesan</h4>
                    <p><strong>Nama:</strong> {{ $order->name }}</p>
                    <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                    <p><strong>Instagram:</strong> {{ $order->instagram }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                </div>
                <div class="col-md-6">
                    <h4>Informasi Pesanan</h4>
                    <p><strong>Nama Jasa:</strong> {{ $order->nama_jasa }}</p>
                    <p><strong>Tanggal Pemesanan:</strong> {{ \Carbon\Carbon::parse($order->date)->translatedFormat('l, d F Y') }}</p>
                    <p><strong>Waktu:</strong> {{ date('H:i', strtotime($order->time)) }}.
                        <strong> Durasi:</strong> {{ $jadwal->durasi}} Menit</p>
                    <p><strong>Total Harga:</strong> Rp. {{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="invoice-footer text-center">
                <a href="https://wa.me/6281999867110?text=Halo,%20saya%20ingin%20memesan%20jasa%20berikut:%0A
                %0ANama%20Jasa:%20{{ $order->nama_jasa }}
                %0AKode%20Unik:%20{{ $order->unique_code }}
                %0ATanggal%20Booking:%20{{ \Carbon\Carbon::parse($order->date)->translatedFormat('l, d F Y') }}
                %0AWaktu:%20{{ date('H:i', strtotime($order->time)) }}
                %0ATotal%20Harga:%20Rp.%20{{ number_format($order->total_price, 0, ',', '.') }}
                %0A%0ANama%20Pemesan:%20{{ $order->name }}
                %0ANomor%20Telepon:%20{{ $order->phone }}
                %0AEmail:%20{{ $order->email }}
                %0AInstagram:%20{{ $order->instagram }}"
                target="_blank" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                  </svg>
    Hubungi Admin via WhatsApp
    </a>
        </div>
    </div>
</div>
@endsection

<style>
    .invoice-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 20px auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 800px; /* Set maximum width */
    }

    .invoice-header h1 {
        margin-bottom: 10px;
        font-size: 1.75rem;
        color: #333;
    }

    .invoice-header p {
        font-size: 1rem;
        color: #555;
    }

    .invoice-details h4 {
        font-size: 1.25rem;
        margin-bottom: 10px;
        color: #555;
    }

    .invoice-details p {
        margin-bottom: 5px;
        font-size: 1rem;
        color: #666;
    }

    .invoice-footer {
        margin-top: 20px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        font-size: 1rem;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .text-center {
        text-align: center;
    }
</style>
