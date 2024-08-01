@extends('layouts.app')

@section('content')
<style>
    .register-card {
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
    <div class="register-card">
        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

                <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                </div>

                <p>Have account? <a href="{{ route('login') }}" class="text-primary">Login here</a></p>

                <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-secondary btn-block">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
        <div class="logo-container">
            <img src="{{ asset('images/logo 1.png') }}" alt="Studio Foto Logo" />
        </div>
    </div>
</div>
@endsection
