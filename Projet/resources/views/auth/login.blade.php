@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">Login</h2>

        <!-- Error Message -->
        @if ($errors->has('email'))
            <div class="error-message" id="error-message">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="input-group">
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                <label for="email">Email</label>
                <i class="fas fa-envelope icon"></i>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
                <i class="fas fa-lock icon"></i>
            </div>

            <div class="options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="{{ route('register') }}" class="forgot-password">Don't have an account? Register</a>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>
    </div>
</div>

<!-- Script to Hide Error Message After 5 Seconds -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.transition = 'opacity 0.8s ease';
                errorMessage.style.opacity = '0';
                setTimeout(() => {
                    errorMessage.remove(); // Remove it from the DOM
                }, 500); // Wait for the fade-out animation
            }, 5000); // Wait for 5 seconds
        }
    });
</script>
<style>
    .error-message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    margin-bottom: 10px;
    text-align: center;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #6366f1, #3b82f6);
}

.login-card {
    background: rgba(255, 255, 255, 0.95);
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 450px;
    transform: translateY(0);
    transition: transform 0.3s ease;
}

.login-card:hover {
    transform: translateY(-5px);
}

.login-title {
    text-align: center;
    color: #1e293b;
    margin-bottom: 2rem;
    font-size: 2rem;
}

.input-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.input-group input {
    width: 100%;
    padding: 1rem 1rem 1rem 40px;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.input-group input:focus {
    border-color: #6366f1;
    box-shadow: 0 0 8px rgba(99, 102, 241, 0.3);
}

.input-group label {
    position: absolute;
    left: 40px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    pointer-events: none;
    transition: all 0.3s ease;
}

.input-group input:focus ~ label,
.input-group input:valid ~ label {
    top: -10px;
    left: 10px;
    font-size: 0.8rem;
    color: #6366f1;
    background: white;
    padding: 0 5px;
}

.icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
}

.options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1.5rem 0;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #64748b;
}

.forgot-password {
    color: #6366f1;
    text-decoration: none;
    font-size: 0.9rem;
}

.login-btn {
    width: 100%;
    padding: 1rem;
    border: none;
    border-radius: 8px;
    background: linear-gradient(45deg, #6366f1, #3b82f6);
    color: white;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.login-btn:hover {
    transform: translateY(-2px);
}

@media (max-width: 480px) {
    .login-card {
        padding: 1.5rem;
        margin: 1rem;
    }
}
body.dark-theme .login-card {
    background: #2d4983;

}
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection
