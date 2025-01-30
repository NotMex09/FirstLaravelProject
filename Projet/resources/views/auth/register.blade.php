@extends('layouts.app')

@section('content')
<style>
    body.dark-theme .register-card {
    background: #2d4983;

}
</style>
<div class="register-container">
    <div class="register-card">
        <h2 class="register-title">Register</h2>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="error-message" id="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success Message -->
        @if (session('success'))
            <div class="success-message" id="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <div class="input-group">
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                <label for="name">Name</label>
                <i class="fas fa-user icon"></i>
            </div>

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

            <div class="input-group">
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                <label for="password_confirmation">Confirm Password</label>
                <i class="fas fa-lock icon"></i>
            </div>

            <button type="submit" class="register-btn">Sign Up</button>
        </form>
    </div>
</div>

<!-- Script to Auto-Hide Messages -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const errorMessage = document.getElementById('error-message');
        const successMessage = document.getElementById('success-message');
        if (errorMessage || successMessage) {
            setTimeout(() => {
                if (errorMessage) {
                    errorMessage.style.transition = 'opacity 0.7s ease';
                    errorMessage.style.opacity = '0';
                    setTimeout(() => errorMessage.remove(), 500);
                }
                if (successMessage) {
                    successMessage.style.transition = 'opacity 0.7s ease';
                    successMessage.style.opacity = '0';
                    setTimeout(() => successMessage.remove(), 500);
                }
            }, 5000); // Wait for 5 seconds
        }
    });
</script>

<style>
    .error-message, .success-message {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    text-align: center;
}

.error-message {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.success-message {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #6366f1, #3b82f6);
}

.register-card {
    background: rgba(255, 255, 255, 0.95);
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 450px;
    transform: translateY(0);
    transition: transform 0.3s ease;
}

.register-card:hover {
    transform: translateY(-5px);
}

.register-title {
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

.register-btn {
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

.register-btn:hover {
    transform: translateY(-2px);
}

@media (max-width: 480px) {
    .register-card {
        padding: 1.5rem;
        margin: 1rem;
    }
}
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection
