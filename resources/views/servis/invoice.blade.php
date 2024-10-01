@extends('layouts.app')
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
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>Terima kasih telah memesan layanan kami!</p>
            <div class="invoice-id">Kode Invoice: {{ $order->unique_code }}</div>
        </div>

        <div class="invoice-details">
            <div class="invoice-section">
                <h4>Informasi Pemesan</h4>
                <p><strong>Nama:</strong> {{ $order->name }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                <p><strong>Instagram:</strong> {{ $order->instagram }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
            </div>

            <div class="invoice-line"></div>

            <div class="invoice-section">
                <h4>Informasi Pesanan</h4>
                <p><strong>Nama Jasa:</strong> {{ $order->nama_jasa }}</p>
                <p><strong>Tanggal Pemesanan:</strong> {{ \Carbon\Carbon::parse($order->date)->translatedFormat('l, d F Y') }}</p>
                <p><strong>Waktu:</strong> {{ date('H:i', strtotime($order->time)) }} <strong>Durasi:</strong> {{ $jasa->durasi }} Menit</p>
                <p><strong>Total Harga:</strong> Rp. {{ number_format($order->total_price, 0, ',', '.') }}</p>
            </div>

            <div class="invoice-line"></div>

            <div class="summary">
                <table>
                    <thead>
                        <tr>
                            <th>Deskripsi</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->nama_jasa }}</td>
                            <td>{{ $jasa->durasi }} Menit</td>
                            <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="summary-footer">
                    Total: Rp. {{ number_format($order->total_price, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="invoice-footer">
            <h5>Hubungi kami untuk konfirmasi booking dengan cepat di <br> &nbsp; <i class="fas fa-phone-alt flipped-phone" style="transform: scaleX(-1);"></i>+6281999867110 atau &nbsp; <i class="fas fa-envelope"></i> kancingproduction@gmail.com</h5>
            <div class="" style="margin-top:25px;">
                <a href="javascript:void(0);" class="btn btn-secondary no-screenshot" onclick="downloadScreenshot()">Download Invoice</a>
                <a href="https://wa.me/6281999867110?text=Halo,%20saya%20ingin%20memesan%20jasa%20berikut:%0A
                %0ANama%20Jasa:%20{{ $order->nama_jasa }}
                %0AKode%20Unik:%20{{ $order->unique_code }}
                %0ATanggal%20Booking:%20{{ \Carbon\Carbon::parse($order->date)->translatedFormat('l, d F Y') }}
                %0AWaktu:%20{{ date('H:i', strtotime($order->time)) }}%20(Durasi:%20{{ $jasa->durasi }}%20Menit)
                %0ATotal%20Harga:%20Rp.%20{{ number_format($order->total_price, 0, ',', '.') }}
                %0A%0ANama%20Pemesan:%20{{ $order->name }}
                %0ANomor%20Telepon:%20{{ $order->phone }}
                %0AEmail:%20{{ $order->email }}
                %0AInstagram:%20{{ $order->instagram }}"
            target="_blank" class="btn btn-success no-screenshot">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
              </svg>
            Hubungi Admin
            </a>
            
        </div>
        </div>
    </div>
    <script>
        function downloadScreenshot() {
            html2canvas(document.querySelector('.invoice-container')).then(canvas => {
                let link = document.createElement('a');
                link.download = 'invoice-screenshot.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }
        function downloadScreenshot() {
    // Hide elements with class 'no-screenshot' using visibility
    document.querySelectorAll('.no-screenshot').forEach(el => {
        el.style.visibility = 'hidden';
    });

    // Take screenshot
    html2canvas(document.querySelector('.invoice-container')).then(canvas => {
        let link = document.createElement('a');
        link.download = 'invoice-screenshot.png';
        link.href = canvas.toDataURL();
        link.click();

        // Restore visibility of elements after screenshot
        setTimeout(() => {
            document.querySelectorAll('.no-screenshot').forEach(el => {
                el.style.visibility = 'visible';
            });
        }, 100); // Short delay to ensure screenshot is completed before restoring elements
    });
}


    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    @endsection
    <style>


        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dddddd !important;
            color: #333;
        }

        .invoice-container {
            max-width: 900px;
            margin: 50px auto;
            background-color: whitesmoke;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            font-size: 36px;
            color: #222;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .invoice-header p {
            font-size: 14px;
            color: #777;
        }

        .invoice-header .invoice-id {
            font-size: 22px;
            color: #555;
            margin-top: 10px;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details h4 {
            font-size: 18px;
            color: #444;
            margin-bottom: 10px;
        }

        .invoice-section {
            margin-bottom: 20px;
        }

        .invoice-section p {
            margin: 6px 0;
            font-size: 16px;
            color: #555;
        }

        .invoice-section p strong {
            color: #333;
        }

        .invoice-line {
            border-bottom: 1px solid #ddd;
            margin: 20px 0;
        }

        .summary {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary th, .summary td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        .summary th {
            background-color: #f1f1f1;
            color: #333;
            font-weight: 600;
            border-bottom: 2px solid #ddd;
        }

        .summary td {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        .summary-footer {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #888;
        }

        .btn-download {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-download:hover {
            background-color: #555;
        }

        @media screen and (max-width: 768px) {
            .invoice-details {
                flex-direction: column;
            }

            .invoice-section {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>