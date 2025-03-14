@extends('layouts.app')
@section('main')
<div class="login-container mb-5" style="padding-top: 120px; display:flex; flex-direction: row; gap: 0;">

<!-- Login Form Section -->
    <div class="login-form">
        <img 
            src="https://th.bing.com/th/id/OIP.jcbAUTSLJ4MLKjrFUb6oowHaE8?rs=1&pid=ImgDetMain" 
            class="rounded img-fluid" 
            alt="Cinque Terre"
            style="width:680px; height:680px; object-fit:cover;"
        />
        <div class="form-container">
            <h2 class="text-center">Register</h2>
            <form action="{{ route('buyer.register') }}" method="POST">
                @csrf

                <!-- Name Input -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

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

                <!-- Confirm Password Input -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn btn-primary w-100">Register</button>

                <!-- Already Have an Account? -->
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    

</div>
@endsection