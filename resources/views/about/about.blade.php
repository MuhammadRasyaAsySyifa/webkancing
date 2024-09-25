<!-- resources/views/about.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #ebebeb;
    }
    .container.about{
        padding-right: 40px;
        padding-left: 40px;
    }
    /* Optional custom styles for the About page */
    .text-center h1 {
        color: #343a40; /* Dark grey color for professional tone */
    }

    .text-center p.lead {
        color: #6c757d; /* Light grey for subheading */
    }

    p.text-muted {
        font-size: 1.1rem; /* Slightly increase font size for readability */
        line-height: 1.6;  /* Improve line spacing for a clean look */
        text-align: justify;
    }

    .btn-primary {
        background-color: #505050;
        border: none;
        color: #FFFFFF;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #797979; /* Darker shade on hover */
        border: none;
    }

    .text-center {
        background-color: #f8f9fa; /* Light grey background for subtle contrast */
        padding: 50px 20px; /* Padding for spacing */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow for depth */
    }

    .text-center h1 {
        color: #333; /* Dark grey color for title */
        font-weight: 700; /* Bold font for strong heading */
        letter-spacing: 1px; /* Slight letter spacing for modern look */
        margin-bottom: 20px; /* Spacing below heading */
    }

    .text-center p.lead {
        color: #555; /* Softer grey for subheading text */
        font-style: italic; /* Italic style for elegance */
        letter-spacing: 0.5px; /* Slight letter spacing */
    }

    .text-center::before {
        content: "";
        display: block;
        width: 60px;
        height: 4px;
        background-color: #333; /* Accent bar under the title */
        margin: 0 auto 20px; /* Center and space it */
    }

    .text-center p.lead {
        font-size: 1.2rem; /* Slightly increase the size of the lead text */
        margin-bottom: 0; /* Remove bottom margin for a compact look */
    }

   .col-md-6 img{
    height: 400px;
    width: 600px;
}

    /* Style for the columns */
    .col-md-6.text,
    .col-md-6.image {
        display: flex;
        flex-direction: column;
    }


    /* Desktop view */
    @media (min-width: 768px) {
        .row {
            flex-direction: row;
        }

        .col-md-6.text {
            order: 1; /* Text will be on the right */
        }

        .col-md-6.image {
            order: 0; /* Image will be on the left */
        }
    }

    /* Mobile view */
    @media (max-width: 767.98px) {
        .row {
            flex-direction: column;
        }

        .col-md-6.text,
        .col-md-6.image {
            margin-bottom: 50px;
        }

        .col-md-6.image {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>
<div class="container my-5 about">
    <div class="text-center mb-5">
        <h1 class="display-4">Studio Foto Kancing Production</h1>
        <p class="lead">Mengabadikan Momen-Momen Berharga dengan Layanan Fotografi Berkualitas</p>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6 text">
            <h2 class="mb-4">Tentang Kami</h2>
            <p class="text-muted">
                <strong>Kancing Production</strong> adalah studio foto yang berfokus pada memberikan pengalaman fotografi yang tak terlupakan. Kami berkomitmen untuk mengabadikan momen-momen penting dalam hidup Anda dengan hasil yang berkualitas tinggi dan pelayanan yang profesional.
            </p>
            <p class="text-muted">
                Bersama tim fotografer berpengalaman dan peralatan canggih, kami menawarkan berbagai layanan fotografi, mulai dari pemotretan keluarga, pre-wedding, hingga sesi profesional untuk keperluan bisnis. <strong>Kancing Production</strong> siap menjadi bagian dari cerita indah dalam hidup Anda.
            </p>
            <a href="/service" class="btn btn-primary mt-3">Lihat Layanan Kami</a>
        </div>
        <div class="col-md-6 image">
            <img src="{{ asset('images/fototempat.JPG') }}" alt="Studio Foto Kancing Production" class="img-fluid rounded shadow">
        </div>
    </div>
</div>
@endsection
