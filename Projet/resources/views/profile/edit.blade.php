@extends('layouts.app')

@section('content')
<style>

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    color: #333;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.8) !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
}

h1 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
}

form {
    width: 100%;
    margin-top: 20px;
}

form div {
    margin-bottom: 20px;
    text-align: left;
}

form label {
    font-size: 0.95rem;
    font-weight: 500;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

form input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    background-color: #f9f9f9;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: border-color 0.3s, box-shadow 0.3s;
}

form input:focus {
    outline: none;
    border-color: #6366f1;
    box-shadow: 0 0 6px rgba(99, 102, 241, 0.5);
}

button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #6366f1;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button[type="submit"]:hover {
    background-color: #4f46e5;
    transform: translateY(-2px);
}

button[type="submit"]:active {
    transform: translateY(0);
}

@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 1.8rem;
    }

    form input {
        font-size: 0.9rem;
    }
}
</style>
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <button type="submit">Update Profile</button>
    </form>
</div>
@endsection
