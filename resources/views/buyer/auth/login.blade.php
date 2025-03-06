@extends('layouts.app')
@section('main')
<div class="login-container mb-5" style="padding-top: 120px; display:flex; flex-direction: row; gap: 0;">

<!-- Login Form Section -->
    <div class="login-form">
        <div class="form-container">
            <h2 class="text-center">Login</h2>
            <!-- Login Form -->
            <form action="" method="POST">
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary login-btn">Login</button>

                <!-- Forgot Password Link -->
                <div class="forgot-password">
                    <a href="">Forgot password?</a>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{ url('register') }}">Register</a></p>
                </div>
            </form>
        </div>
        <img 
            src="https://img.freepik.com/premium-photo/online-shopping-ordering-products-your-home-internet-ordering-home-delivery-generative-ai_574777-575.jpg" 
            class="rounded img-fluid" 
            alt="Cinque Terre"
            style="width:500px; height:500px; object-fit:cover;"
        />
    </div>
    

</div>
@endsection