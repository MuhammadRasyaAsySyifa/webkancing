@extends('layouts.app')

@section('content')
<style>   .login-card {
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
}</style>
<div class="container vh-100 d-flex align-items-center">
    <div class="login-card">
        <div class="form-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login</h3>

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember"> Remember Me </label>
                </div>

                <p><a href="{{ route('password.request') }}" class="text-primary">Forgot Your Password?</a></p>
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a></p>

                <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-secondary btn-block">Login</button>
                    <!-- Jika Anda ingin menambahkan tombol Register, Anda bisa tambahkan di sini -->
                </div>
            </form>
        </div>
        <div class="logo-container">
            <img src="{{ asset('images/logo 1.png') }}" alt="Studio Foto Logo" />
        </div>
    </div>
</div>
@endsection
