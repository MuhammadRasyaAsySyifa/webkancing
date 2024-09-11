@extends('layouts.servis')

@section('content')
<style>
    /* Style kalender */
    #calendar-container {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    #service-date-time {
    margin-top: 15px;
    padding: 0 !important;
    margin-bottom:  0 !important;
}
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    #calendar-title {
        font-size: 1.5rem;
        text-align: center;
        font-weight: bold;
    }

    #calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }

    .day {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5rem;
        cursor: pointer;
        border-radius: 0.5rem;
        font-weight: bold;
    }

    .day.weekday {
        background-color: #f0f0f0;
        color: #333;
    }

    .day.available {
        background-color: #d4edda;
        color: #155724;
    }

    .day.unavailable {
        background-color: #f8d7da;
        color: #721c24;
        cursor: not-allowed;
    }

    .day.selected {
        background-color: #cce5ff;
        border: 2px solid #004085;
        color: #004085;
    }

    .day:hover {
        background-color: #e2e6ea;
    }

    .calendar-header button {
        background-color: #818181;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        cursor: pointer;
        border-radius: 0.25rem;
        font-weight: bold;
    }

    .calendar-header button:hover {
        background-color: #b0b0b0;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .btn-primary {
        background-color: #ffffff;
        border-color: #5c5c5c;
        font-weight: bold;
        padding: 0.75rem 1.5rem;
        border-radius: 0.25rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: bold;
        padding: 0.75rem 1.5rem;
        border-radius: 0.25rem;
        
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>

<div class="background-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Pemesanan</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <a href="/deskripsilayanan/{{ $jasa->id }}" style="text-decoration: none; color: #000; font-size: 18px; display: flex; align-items: center; margin-top:20px; margin-bottom:30px;">
        <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" style="margin-right: 8px; transform: scaleX(-1);">
            <path d="M8.22083109,4 C8.51380539,3.70718788 8.9886791,3.70731936 9.28149122,4.00029365 L17.2763084,12 L9.28047689,19.9997063 C8.98766478,20.2926806 8.51279106,20.2928121 8.21981676,20 C7.92684246,19.7071879 7.92671099,19.2323142 8.21952311,18.9393399 L15.1555752,12 L8.22053744,5.06066013 C7.92772532,4.76768583 7.92785679,4.29281212 8.22083109,4 Z"></path>
        </svg>
        Kembali
    </a>
    
    
    
        <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card" style="border:none;">
                <div class="card-body">
                    <h2 class="card-title">Detail Layanan</h2>
                    <h4 style="margin-bottom:0;">{{ $jasa->nama }}</h4>
                    <h5 id="service-date-time"  class="card-text" style="margin-top:3px;">Tanggal dan waktu akan ditampilkan di sini</h5>
                    <p id="duration" class="card-text" style="margin-bottom: 0 !important;">
                        {{ $durasi }} menit
                    </p>
                    <p  class="card-text"> Rp {{ number_format($jasa->harga, 0, ',', '.') }}</p>
                </div>
                <img src="{{ asset('images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}" class="card-img-top" style="height: 300px; object-fit: cover;">
            </div>
        </div>

        <!-- Form Pemilihan Tanggal dan Waktu -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0" style="font-size:20px;">Pilih Tanggal dan Waktu <span style="font-size:13px; margin-left:110px;">Waktu Indonesia Tengah (WITA)</span></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout1') }}" method="POST">
                        @csrf
                        <input type="hidden" name="jasa_id" value="{{ $jasa->id }}">
                        <input type="hidden" id="selected_date" name="date">
                        <input type="hidden" name="durasi" value="{{ $durasi }}">
                        <input type="hidden" name="unique_code" value="{{ 'ORD-' . strtoupper(Str::random(10)) }}">

                        <!-- Kalender -->
                        <div id="calendar-container" class="mb-3">
                            <div class="calendar-header">
                                <button type="button" id="prev-month"><</button>
                                <h2 id="calendar-title"></h2>
                                <button type="button" id="next-month">></button>
                            </div>
                            <div id="calendar"></div>
                        </div>

                        <!-- Dropdown untuk Waktu -->
                        <div class="form-group">
                            <label for="time">Pilih Waktu:</label>
                            <select name="time" id="time" class="form-control" required>
                                <option value="" disabled selected>Pilih Waktu</option>
                                <!-- Opsi waktu akan diupdate melalui JavaScript -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-secondary btn-block mt-2">Lanjutkan</button>
                        <a href="{{ url('/service') }}" class="btn btn-secondary btn-block mt-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const calendarTitle = document.getElementById('calendar-title');
    const selectedDateInput = document.getElementById('selected_date');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const timeSelect = document.getElementById('time');
    const serviceDateTime = document.getElementById('service-date-time');
    const today = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Makassar' }); // format YYYY-MM-DD
    const availableDates = @json($availableDates);
    const unavailableDates = @json($unavailableDates);
    const timesByDate = @json($timesByDate);

    let currentDate = new Date();  // Waktu diambil sesuai UTC
    let selectedMonth = currentDate.getUTCMonth();
    let selectedYear = currentDate.getUTCFullYear();

    function generateCalendar() {
        const firstDay = new Date(Date.UTC(selectedYear, selectedMonth, 1));
        const lastDay = new Date(Date.UTC(selectedYear, selectedMonth + 1, 0));
        const daysInMonth = lastDay.getUTCDate();

        calendarTitle.textContent = `${firstDay.toLocaleString('default', { month: 'long' })} ${selectedYear}`;

        calendarEl.innerHTML = '';

        // Menampilkan hari dalam seminggu
        const weekdays = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        weekdays.forEach(day => {
            const dayElem = document.createElement('div');
            dayElem.textContent = day;
            dayElem.className = 'day weekday';
            calendarEl.appendChild(dayElem);
        });

        // Menampilkan tanggal
        for (let i = 1; i <= daysInMonth; i++) {
            const date = new Date(Date.UTC(selectedYear, selectedMonth, i));
            const dateStr = date.toLocaleDateString('en-CA', { timeZone: 'Asia/Makassar' }); // Format YYYY-MM-DD dalam WITA
            const isPast = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Makassar' }) > dateStr;
            const isAvailable = availableDates.includes(dateStr);
            const isUnavailable = unavailableDates.includes(dateStr);

            const dayElem = document.createElement('div');
            dayElem.textContent = i;
            dayElem.className = 'day';

            // Menandai tanggal berdasarkan ketersediaan
            if (isPast) {
                dayElem.classList.add('unavailable');
            } else if (isAvailable) {
                dayElem.classList.add('available');
            } else {
                dayElem.classList.add('day'); // Untuk hari yang tidak ada dalam `availableDates`
            }

            // Menambahkan event listener untuk tanggal
            dayElem.addEventListener('click', function() {
                if (!isPast && (isAvailable || !isUnavailable)) {
                    document.querySelectorAll('.day.selected').forEach(day => day.classList.remove('selected'));
                    dayElem.classList.add('selected');
                    selectedDateInput.value = dateStr;

                    updateTimeOptions(dateStr);
                    updateServiceDetails(dateStr);
                }
            });

            calendarEl.appendChild(dayElem);
        }
    }

    function updateTimeOptions(dateStr) {
        const times = timesByDate[dateStr] || [];
        timeSelect.innerHTML = '<option value="" disabled selected>Pilih Waktu</option>'; // Reset dropdown

        times.forEach(time => {
            const option = document.createElement('option');
            option.value = time;
            option.textContent = time;
            timeSelect.appendChild(option);
        });
    }

    function updateServiceDetails(dateStr) {
        const date = new Date(dateStr);
        const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const dayName = dayNames[date.getDay()];
        const formattedDate = date.toLocaleDateString('id-ID', { timeZone: 'Asia/Makassar', weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
        const time = timeSelect.value;

        // Update the date and time display separately
        const dateText = `${formattedDate}`;
        const timeText = time ? `, pukul: ${time}` : '';

        // Update the text content of the serviceDateTime element
        serviceDateTime.innerHTML = `${dateText}${timeText}`;
        serviceDateTime.style.padding = '0'; // Remove padding if there is any
    serviceDateTime.style.margin = '0';  // Remove margin if there is any
    }

    // Event listener for time selection
    timeSelect.addEventListener('change', function() {
        const selectedDateStr = selectedDateInput.value;
        if (selectedDateStr) {
            updateServiceDetails(selectedDateStr);
        }
    });


    prevMonthButton.addEventListener('click', function() {
        if (selectedMonth === 0) {
            selectedMonth = 11;
            selectedYear--;
        } else {
            selectedMonth--;
        }
        generateCalendar();
    });

    nextMonthButton.addEventListener('click', function() {
        if (selectedMonth === 11) {
            selectedMonth = 0;
            selectedYear++;
        } else {
            selectedMonth++;
        }
        generateCalendar();
    });

    // Initialize calendar
    generateCalendar();
    //mengubah format menit
});document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen durasi dan data-durasi
    const durationElement = document.getElementById('duration');
    const durationString = durationElement.getAttribute('data-durasi');  // Misalnya "00:20:00"

    if (durationString) {
        // Pisahkan string waktu menjadi bagian jam, menit, dan detik
        const durationParts = durationString.split(':');
        const minutes = parseInt(durationParts[1], 10);  // Ambil bagian menit dari format HH:MM:SS
        
        // Update teks elemen dengan durasi dalam menit
        durationElement.textContent = `${minutes} menit`;
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const timeSelect = document.getElementById('time');
    const selectedDateInput = document.getElementById('selected_date');
    const jasaId = document.querySelector('input[name="jasa_id"]').value;

    async function checkAvailability() {
        const dateStr = selectedDateInput.value;
        const timeStr = timeSelect.value;

        if (dateStr && timeStr) {
            try {
                const response = await fetch('{{ route("checkAvailability") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        date: dateStr,
                        time: timeStr,
                        jasa_id: jasaId
                    })
                });

                const data = await response.json();
                
                if (data.isAlreadyBooked) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Maaf yaaa',
                        text: 'Waktu yang dipilih sudah dibooking. Silakan pilih waktu lain.',
                        confirmButtonText: 'Tutup'
                    });                    timeSelect.querySelector(`option[value="${timeStr}"]`).disabled = true;
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    }

    // Event listener untuk memilih waktu
    timeSelect.addEventListener('change', checkAvailability);

    // Event listener untuk memilih tanggal
    selectedDateInput.addEventListener('change', checkAvailability);
});

</script>
@endsection
