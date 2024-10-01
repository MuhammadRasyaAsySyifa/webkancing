{{-- adminmanage.blade.php --}}
@extends('layouts.admin')

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
  
    .no-results {
        color: red;
        font-weight: bold;
    }
    .form-group select{
        width: 210px;
        margin-bottom: 10px;
    }
    .btn-block{
        position: relative; top:25px;
    }
    @media (max-width: 767.98px) {
        .btn-block{
        position: relative; top:0px;
    }
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
<div class="container mt-4">
    <h1 class="text-center mb-4">Daftar Pesanan</h1>

    <div class="mb-4">
        <form action="#" id="exportForm" method="GET" class="form-inline justify-content-center">
            <div class="row justify-content-center">
                <div class="form-group col-md-3 mb-2">
                    <label for="month" class="mr-2">Pilih Bulan:</label>
                    <select name="month" id="month" class="form-control">
                        <option value="">Semua Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
    
                <div class="form-group col-md-3 mb-2">
                    <label for="format" class="mr-2">Pilih Format:</label>
                    <select name="format" id="format" class="form-control">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
    
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-secondary btn-block">Unduh Data Pesanan</button>
                </div>
            </div>
        </form>
    </div>
    

    <!-- Search input field -->
    <div class="mb-3">
        <input id="myInput" type="text" class="form-control" placeholder="Cari Kode Unik..." aria-label="Search">
    </div>

    <!-- Message for no results -->
    <div id="noResults" class="no-results text-danger" style="display: none;">
        Data yang Anda cari tidak ada
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
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
                    <td>{{ $order->durasi }} menit</td>
                    <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if($order->bukti_pembayaran)
                            <img src="{{ asset('storage/bukti_pembayaran/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-thumbnail mb-2" style="max-width: 100px; height: auto;">
                            <br>
                            <a href="{{ asset('storage/bukti_pembayaran/' . $order->bukti_pembayaran) }}" target="_blank" class="btn btn-link">Lihat Bukti</a>
                        @else
                            <form action="{{ route('upload-bukti', $order->id) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                                @csrf
                                <input type="file" name="bukti_pembayaran" accept="image/*" required class="form-control mb-2 mr-2">
                                <button type="submit" class="btn btn-primary mb-2">Tambahkan Bukti Pembayaran</button>
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
            var hasResults = false;

            $("#myTable tr").each(function() {
                var rowText = $(this).text().toLowerCase();
                if (rowText.indexOf(value) > -1) {
                    $(this).show();
                    hasResults = true;
                } else {
                    $(this).hide();
                }
            });

            // Show or hide the "no results" message
            if (hasResults) {
                $("#noResults").hide();
            } else {
                $("#noResults").show();
            }
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
            document.getElementById('exportForm').addEventListener('submit', function(event) {
                event.preventDefault();
                let format = document.getElementById('format').value;
                let actionUrl = format === 'pdf' ? '{{ route("exportpdf") }}' : '{{ route("exportexcel") }}';
                this.action = actionUrl;
                this.submit();
            });
</script>

@endsection
