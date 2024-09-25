@extends('layouts.app')

@section('content')
<style>
    .register-card {
        width: 100%; /* Ensure it fits within the viewport */
        max-width: 800px; /* Limit maximum width */
        margin: auto;
        padding: 2rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: flex;
        align-items: center;
        gap: 2rem;
        box-sizing: border-box; /* Ensure padding does not cause overflow */
    }

    .logo-container {
        text-align: center;
        position: relative;
        left: 120px; /* Adjust if needed */
    }

    .logo-container img {
        max-width: 300px; /* Ensure logo size is reasonable */
    }

    .btn-google {
        background-color: #4285F4; /* Google blue color */
        color: white;
        border: none;
        font-weight: 500;
        text-transform: uppercase;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        transition: background-color 0.3s ease, transform 0.2s ease;
        max-width: 100%;
        font-size: 1rem; /* Match font size to the standard button */
    }

    .btn-google:hover {
        background-color: #357ae8; /* Slightly darker blue */
        transform: translateY(-2px); /* Lift effect on hover */
    }

    .btn-google:active {
        background-color: #3367D6; /* Even darker blue */
        transform: translateY(0); /* Remove lift effect on click */
    }

    .btn-google .fa-google {
        font-size: 1.2rem; /* Adjust size of the icon */
        margin-right: 10px; /* Space between icon and text */
    }
    .btn-custom-width {
        width: 100%; /* Ensure the button takes up the full width of its container */
        padding: 8px 20px;
        font-size: 1.1rem; /* Increase font size for better visibility */
        border-radius: 5px; /* Ensure the border radius is consistent */
    }

    @media (max-width: 767.98px) {
        .logo-container {
            display: none; /* Hide logo on mobile */
        }

        .register-card {
            margin-top: 80px; /* Adjust margin */
            padding: 1rem; /* Reduce padding for mobile view */
            width: 100%; /* Ensure full width */
            box-sizing: border-box; /* Prevent overflow */
        }

        .form-container {
            width: 100%; /* Ensure form container is full width */
        }

        .btn-google {
            font-size: 0.9rem; /* Adjust font size for smaller screens */
            padding: 8px 16px; /* Adjust padding for smaller screens */
        }
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

                <p>Have an account? <a href="{{ route('login') }}" class="text-primary">Login here</a></p>

                <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-secondary btn-custom-width">{{ __('Register') }}</button>
                    <a href="{{ route('google.login') }}" class="btn btn-google d-flex align-items-center mt-3">
                        <i class="fab fa-google"></i> <!-- Google icon -->
                        Login with Google
                    </a>
                </div>
            </form>
        </div>
        <div class="logo-container">
            <img src="{{ asset('images/logo polos 2.png') }}" alt="Studio Foto Logo" />
        </div>
    </div>
</div>
@endsection
