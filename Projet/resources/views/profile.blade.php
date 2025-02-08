@extends('layouts.app')

@section('content')
<!-- Inline CSS for this page only -->
<style>
/* General Styling */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #f4f7fc, #e2e8f0);
    color: #333;
    margin: 0;
    padding: 0;
}

/* Container for Profile Page */
.container {
    width: 90%;
    max-width: 900px;
    margin: 40px auto;
    background-color: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Header Styling */
h1 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 700;
}

/* Profile Information */
.profile-info {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    text-align: center;
}

.profile-info p{
    font-size: 1.1rem;
    margin-bottom: 10px;
    line-height: 1.6;
    color: #555;
}

.profile-info p strong {
    color: #2c3e50;
}

/* Form Styling */
.frm {
    margin-top: 20px;
}

.frm div {
    margin-bottom: 25px;
}

.frm label {
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
    display: block;
    margin-bottom: 8px;
}

.frm input {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
}

.frm input:focus {
    border-color: #4a90e2;
    background-color: #fff;
    box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
}

/* Button Styling */
.button1[type="submit"] {
    width: 100%;
    padding: 15px;
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.button1[type="submit"]:hover {
    background-color: #357abd;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
}

/* Responsive Styling */
@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
    }

    .profile-info p {
        font-size: 1rem;
    }

    .frm input {
        font-size: 0.95rem;
    }

    .button1[type="submit"] {
        padding: 12px;
        font-size: 1rem;
    }
}
body.dark-theme h1{
    color: #f9f9f9;
}

body.dark-theme .container{
    background-color: #35487d;
}
body.dark-theme .dark{
    color: #f9f9f9;
}
img{
    cursor: pointer;

}

</style>

<div class="container">
    @if(session('success'))
    <div style="padding: 15px; background: #4CAF50; color: white; border-radius: 8px; text-align: center; font-weight: bold; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

    <h1>Edit Profile</h1>

    <!-- Profile Information -->
    <div class="profile-info">
        @if($user->image && file_exists(public_path($user->image)))
    <p><strong>Profile Picture:</strong></p>
    <img src="{{ asset($user->image) }}" alt="Profile Picture" style="width:150px; height:150px; border-radius:50%;id=profile-picture-preview;"
            onclick="document.getElementById('profile_picture').click();">
@else
    <p>No profile picture uploaded.</p>
@endif

        <p><strong>Welcome,</strong> {{ $user->name }}!</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>

    </div>

    <!-- Edit Profile Form -->
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="frm">



        @csrf
        @method('PUT')
        <div>
            <label for="name"><span class="dark">Name</span></label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email"><span class="dark">Email</span></label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="password"><span class="dark">New Password</span></label>
            <input type="password" name="password" id="password" placeholder="Leave blank to keep current password">
        </div>
        <div>
            <label for="password_confirmation"><span class="dark">Confirm New Password</span></label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div>
            <label for="profile_picture"><span class="dark">Profile Picture</span></label>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
        </div>
        <button class="button1" type="submit">Update Profile</button>
    </form>
</div>
<script>
     // Preview the uploaded image
    function updatePreview(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profile-picture-preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    setTimeout(() => {
        document.querySelector('div[style*="background: #4CAF50"]').style.display = 'none';
    }, 3000); // Hides after 3 seconds
</script>

@endsection
