@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

@section('content')
<style>
    body{
        background: #e4e4e4;
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
        .card {
            width: 100%;
            max-width: 600px;
            background-color: #f6f6f6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: auto;
        }
        .card-header {
    background-color: #6c757d; /* Warna latar belakang gelap untuk kontras yang baik */
    color: #ffffff; /* Warna teks putih untuk keterbacaan */
    padding: 20px; /* Padding untuk ruang yang cukup di sekitar teks */
    border-bottom: 1px solid #6c757d; /* Border bawah tipis untuk pemisahan visual */
    border-radius: 0.25rem; /* Sudut rounded */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan lembut untuk efek kedalaman */
}

.card-header h4 {
    font-family: 'Outfit', sans-serif;
    font-size: large; /* Ukuran font lebih besar untuk judul */
    font-weight: 500; /* Berat font menengah untuk kejelasan */
    margin-bottom: 0; /* Menghapus margin bawah */
    display: flex;
    justify-content: space-between;
    align-items: center; /* Menyelaraskan teks dan elemen di tengah */
}

.card-header span {
    font-family: 'Outfit', sans-serif;
    font-size: 0.875rem; /* Ukuran font lebih kecil untuk teks tambahan */
    color: #f8f9fa; /* Warna teks tambahan untuk kontras yang baik */
}

        .card-body {
    padding: 15px; /* Mengurangi padding pada card-body */
    overflow: hidden; /* Menambahkan ini untuk memastikan tidak ada konten yang meluap */
}

#calendar-container {
    margin-bottom: 15px; /* Mengurangi margin bawah */
    overflow: hidden; /* Menambahkan ini untuk memastikan tidak ada konten yang meluap */
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px; /* Mengurangi padding pada header */
    background-color: #e9ecef;
    color: #495057;
    border-radius: 5px;
    font-size: 0.9rem; /* Mengurangi ukuran font pada header */
}

        .calendar-header button {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #495057;
        }

        #calendar-title {
            font-size: 1rem;
            margin: 0;
        }

        #calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 3px;
        }
        .day {
    background-color: #f8f9fa;
    padding: 10px; /* Mengurangi padding pada elemen hari */
    font-size: 0.8rem; /* Mengurangi ukuran font */
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    overflow: hidden; /* Menambahkan ini untuk memastikan tidak ada konten yang meluap */
}

        .day:hover {
            background-color: #e2e6ea;
        }

        .day.selected {
            background-color: #4CAF50; /* Green background */
    color: white;              /* White text */
    border: 1px solid #388E3C; /* Darker green border */
    transform: scale(1.05);    /* Slightly larger */
    transition: all 0.3s ease; /* Smooth transition */        }

        .day.unavailable {
            color: #ccc;
            cursor: not-allowed;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .day.weekday {
    background: none; /* Tidak ada background color */
    color: #495057; /* Warna teks yang sesuai */
    padding: 5px;
    text-align: center;
    border: none; /* Tambahkan border untuk menandai area hari */
    border-radius: 5px;
    font-weight: bold;
    overflow: hidden;
}
/* Style for the selected button */
button.selected {
    background-color: #4CAF50; /* Green background */
    color: white;              /* White text */
    border: 2px solid #388E3C; /* Darker green border */
    transform: scale(1.05);    /* Slightly larger */
    transition: all 0.3s ease; /* Smooth transition */
}

/* Style for regular buttons */
button {
    background-color: #f0f0f0; /* Light grey background */
    color: black;              /* Black text */
    border: 2px solid #ccc;    /* Grey border */
    padding: 10px 15px;        /* Padding */
    margin: 5px;               /* Margin */
    cursor: pointer;           /* Pointer cursor on hover */
    transition: all 0.3s ease; /* Smooth transition */
}

button:hover {
    background-color: #e7e7e7; /* Darker grey on hover */
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

    <a href="/deskripsilayanan/{{ $jasa->id }}" style="text-decoration: none; color: #000; font-size: 18px; display: flex; align-items: center; margin-top:20px; margin-bottom:30px;   width: fit-content;        ">
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
                <img src="{{ asset('storage/images/' . $jasa->gambar) }}" alt="{{ $jasa->nama }}"  class="card-img-top" style="height: 300px; object-fit: cover;">
            </div>
        </div>
       
        <!-- Form Pemilihan Tanggal dan Waktu -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Pilih Tanggal dan Waktu <span>Waktu Indonesia Tengah (WITA)</span></h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('checkout1') }}" method="POST">
                        @csrf
                        <input type="hidden" name="jasa_id" value="{{ $jasa->id }}">
                        <input type="hidden" id="selected_date" name="date">
                        <input type="hidden" id="selected_time" name="time"> <!-- Input waktu yang dipilih -->
                        <input type="hidden" name="durasi" value="{{ $durasi }}">
                        <input type="hidden" name="unique_code" value="{{ 'ORD-' . strtoupper(Str::random(10)) }}">

                        <!-- Kalender -->
                        <div id="calendar-container" class="mb-3">
                            <div class="calendar-header">
                                <button type="button" id="prev-month">‹</button>
                                <h2 id="calendar-title"></h2>
                                <button type="button" id="next-month">›</button>
                            </div>
                            <div id="calendar"></div>
                        </div>

                        <!-- Dropdown untuk Waktu -->
                        <div class="form-group">
                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Pilih Waktu:</label>
                            <ul id="timetable" class="grid w-full grid-cols-2 gap-2 mb-3" style="padding-left:0 !important;">
                                <!-- Time buttons will be dynamically added here -->
                            </ul>
                        </div>

                        <button type="button" class="btn btn-secondary btn-block mt-2" id="continue-button" style="margin-left: 0 !important;">Lanjutkan</button>
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
            const selectedTimeInput = document.getElementById('selected_time'); 
            const prevMonthButton = document.getElementById('prev-month');
            const nextMonthButton = document.getElementById('next-month');
            const timetable = document.getElementById('timetable');
            const serviceDateTime = document.getElementById('service-date-time');
            const today = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Makassar' });
            const availableDates = @json($availableDates);
            const unavailableDates = @json($unavailableDates);
            const timesByDate = @json($timesByDate);
            let currentDate = new Date();
            let selectedMonth = currentDate.getUTCMonth();
            let selectedYear = currentDate.getUTCFullYear();
        
            // Fungsi untuk membuat waktu dalam tombol
            function generateTimeButtons(dayOfWeek) {
                timetable.innerHTML = ''; // Clear previous buttons
                console.log("Day of Week:", dayOfWeek); // Log untuk debugging
                let startTime, endTime;
                if (dayOfWeek === 4) { // Jumat
                    startTime = 8 * 60; // 08:00 in minutes
                    endTime = 10 * 60 + 30; // 11:00 in minutes
                } else { // Senin sampai Kamis
                startTime = 8 * 60; // 08:00 in minutes
                endTime = 15 * 60 + 30; // 15:30 in minutes
                }

        
                const interval = 30; // interval waktu 30 menit
                for (let minutes = startTime; minutes <= endTime; minutes += interval) {
                    const hours = Math.floor(minutes / 60);
                    const mins = minutes % 60;
                    const formattedTime = `${hours.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}`;
        
                    const button = document.createElement('button');
                    button.className = 'w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded';
                    button.textContent = formattedTime;
                    button.dataset.time = formattedTime; // Store time in data attribute
        
                    // Add event listener to select time
                    button.addEventListener('click', function(event) {
                    event.preventDefault(); // Mencegah perilaku default
                    // Deselect previously selected button
                    
                    document.querySelectorAll('#timetable button.selected').forEach(btn => btn.classList.remove('selected'));

                    // Select this button
                    button.classList.add('selected');
                    updateServiceDetails(selectedDateInput.value, formattedTime);
                });

        
                    timetable.appendChild(button);
                }
            }
            document.getElementById('continue-button').addEventListener('click', function() {
    const selectedDate = document.getElementById('selected_date').value;
    const selectedTime = document.getElementById('selected_time').value;

    console.log("Selected Date:", selectedDate); // Debugging
    console.log("Selected Time:", selectedTime); // Debugging

    if (selectedDate === '' || selectedTime === '') {
        alert('Silakan pilih tanggal dan waktu sebelum melanjutkan.');
    } else {
        this.closest('form').submit();
    }
});


            function generateCalendar() {
                const firstDay = new Date(Date.UTC(selectedYear, selectedMonth, 1));
                const lastDay = new Date(Date.UTC(selectedYear, selectedMonth + 1, 0));
                const daysInMonth = lastDay.getUTCDate();
        
                calendarTitle.textContent = `${firstDay.toLocaleString('default', { month: 'long' })} ${selectedYear}`;
        
                calendarEl.innerHTML = '';
        
                // Menampilkan hari dalam seminggu dimulai dari Senin
                const weekdays = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                weekdays.forEach(day => {
                    const dayElem = document.createElement('div');
                    dayElem.textContent = day;
                    dayElem.className = 'day weekday';
                    calendarEl.appendChild(dayElem);
                });
        
                const firstDayOfWeek = (firstDay.getUTCDay() === 0 ? 6 : firstDay.getUTCDay() - 1); // Adjust for Monday start
        
                // Adding empty days before the start of the month (if needed)
                for (let i = 0; i < firstDayOfWeek; i++) {
                    const emptyElem = document.createElement('div');
                    emptyElem.className = 'day empty';
                    calendarEl.appendChild(emptyElem);
                }
        
                for (let i = 1; i <= daysInMonth; i++) {
                    const date = new Date(Date.UTC(selectedYear, selectedMonth, i));
                    const dayOfWeek = (date.getUTCDay() === 0 ? 6 : date.getUTCDay() - 1); // Adjust for Monday start
                    const dateStr = date.toLocaleDateString('en-CA', { timeZone: 'Asia/Makassar' });
                    const isPast = new Date().toLocaleDateString('en-CA', { timeZone: 'Asia/Makassar' }) > dateStr;
        
                    const dayElem = document.createElement('div');
                    dayElem.textContent = i;
                    dayElem.className = 'day';
        
                    // Hanya izinkan pemilihan tanggal dari Senin sampai Jumat
                    if (isPast || dayOfWeek === 6 || dayOfWeek === 5) {  // Sabtu atau Minggu atau tanggal yang sudah lewat
                        dayElem.classList.add('unavailable');
                    } else {
                        dayElem.classList.add('available');
                    }
        
                    // Menambahkan event listener untuk tanggal
                    dayElem.addEventListener('click', function() {
                        if (!isPast && dayOfWeek >= 0 && dayOfWeek <= 4) {  // Senin sampai Jumat
                            document.querySelectorAll('.day.selected').forEach(day => day.classList.remove('selected'));
                            dayElem.classList.add('selected');
                            selectedDateInput.value = dateStr;
        
                            generateTimeButtons(dayOfWeek);  // Tampilkan opsi waktu berdasarkan hari
                            updateServiceDetails(dateStr); // Update service details with selected date
                        }
                    });
        
                    calendarEl.appendChild(dayElem);
                }
            }
        
            function updateServiceDetails(dateStr, selectedTime) {
                const date = new Date(dateStr);
                const formattedDate = date.toLocaleDateString('id-ID', { timeZone: 'Asia/Makassar', weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
                const timeText = selectedTime ? `, pukul: ${selectedTime}` : '';
        
                // Update the date and time display separately
                serviceDateTime.innerHTML = `${formattedDate}${timeText}`;
                serviceDateTime.style.padding = '0';
                serviceDateTime.style.margin = '0';
                selectedTimeInput.value = selectedTime; // Pastikan Anda memiliki elemen input ini

            }
        
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
        });
        
        @if(session('error'))
            // Trigger SweetAlert notification when there's an error in the session
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                timer: 3000, // Auto-close after 3 seconds
                showConfirmButton: false // Hide the confirm button
            });
    @endif
    
    
        </script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

@endsection
