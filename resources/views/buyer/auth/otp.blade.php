@extends('layouts.app')

@section('main')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="otp-container text-center bg-white p-4 rounded shadow">
        <h4 class="mb-3">OTP Verification</h4>
        <p class="text-muted">Enter the 6-digit OTP sent to your email/phone.</p>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('buyer.otp') }}">
            @csrf
            <div class="d-flex justify-content-between mb-3">
                @for($i = 1; $i <= 6; $i++)
                    <input type="text" name="otp[]" class="form-control otp-input" maxlength="1" required>
                @endfor
            </div>
            <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
        </form>

        <p class="mt-3 text-muted">Didn’t receive OTP? 
            <a href="">Resend</a>

        </p>
    </div>
</div>

<script>
    document.querySelectorAll(".otp-input").forEach((input, index, inputs) => {
        input.addEventListener("input", () => {
            if (input.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
    });
</script>

<style>
    body {
        background-color: #f8f9fa;
    }
    .otp-container {
        max-width: 400px;
    }
    .otp-input {
        width: 50px;
        height: 50px;
        text-align: center;
        font-size: 1.5rem;
        border: 1px solid #ced4da;
        border-radius: 5px;
        margin-right: 5px;
    }
    .otp-input:last-child {
        margin-right: 0;
    }
</style>
@endsection
