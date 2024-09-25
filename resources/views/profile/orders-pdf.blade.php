<!DOCTYPE html>
<html>
<head>
    <title>Orders PDF</title>
    <style>
        @page {
            size: A4; /* Ukuran halaman PDF */
            margin: 10mm; /* Margin halaman */
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px; /* Ukuran font yang lebih kecil */
        }

        table {
            position: relative;
            right: 15px;
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
            word-wrap: break-word;
            white-space: normal;
        }
        
        th {
            background-color: #f2f2f2;
        }

        .status-paid {
            color: green;
        }

        .status-unpaid {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Data Pesanan</h2>
    <table>
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
        <tbody>
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
                <td>{{ $order->durasi }} menit</td>
                <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>
                    @if($order->bukti_pembayaran)
                        @php
                            $path = public_path('storage/bukti_pembayaran/' . $order->bukti_pembayaran);
                            $imageData = base64_encode(file_get_contents($path));
                            $mimeType = mime_content_type($path);
                        @endphp
                        <img src="data:{{ $mimeType }};base64,{{ $imageData }}" alt="Bukti Pembayaran" width="50px">
                    @else
                        Tidak ada bukti pembayaran
                    @endif
                </td>                
                <td class="{{ $order->status == 'Paid' ? 'status-paid' : 'status-unpaid' }}">
                    {{ $order->status == 'Paid' ? 'Lunas' : 'Belum Lunas' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
