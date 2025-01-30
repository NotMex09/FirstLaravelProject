@extends('layouts.app')

@section('content')
<style>/* Edit User Container */
.edit-user-container {
    background-color: #fff;
    padding: 20px;
    margin: 20px auto;
    max-width: 600px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.edit-user-container h1 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}</style>
<div class="edit-user-container">
    <h1>Edit User Role: {{ $user->name }}</h1>
    <form action="{{ route('users.update-role', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="manager" {{ $user->role === 'manager' ? 'selected' : '' }}>manager</option>
                <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="subscriber" {{ $user->role === 'subscriber' ? 'selected' : '' }}>Subscriber</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
</div>
@endsection
