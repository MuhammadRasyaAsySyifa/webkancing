@extends('layouts.app')

@section('content')
<style>
    .edit-profile-card {
        width: 800px;
        max-width: 800px;
        margin: auto;
        padding: 2rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .logo-container {
        text-align: center;
        position: relative;
        left: 120px;
    }

    .logo-container img {
        max-width: 300px;
    }
</style>

<div class="container vh-100 d-flex align-items-center">
    <div class="edit-profile-card">
        <!-- Form Edit Profile -->
        <div class="form-container">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Edit Profile</h3>

                <!-- Nama -->
                <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Full Name">
                </div>

                <!-- Email -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email Address">
                </div>

                
                <!-- Email -->
                <div class="form-outline mb-4">
                    <textarea id="address" name="address" class="form-control" placeholder="Address" rows="4">{{ Auth::user()->address }}</textarea>
                </div>
                

                <!-- Password -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-secondary btn-block">Save</button>
            </form>
        </div>
        
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/logo 1.png') }}" alt="Studio Foto Logo" />
        </div>
    </div>
</div>
@endsection
