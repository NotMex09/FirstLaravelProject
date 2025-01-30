@extends('layouts.app')

@section('content')
<style>

</style>
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #f5f7fa, #c3cfe2);">
    <div class="container">
        <div >
            <div >
                <div class="card shadow-lg border-0 rounded-4 p-4 animated-card">
                    <div class="">
                        <h1 >Contact Us</h1>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show fade-in" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div >
                                <div >
                                    <div class="form-floating">
                                    <label for="first_name">First Name</label><br>
                                        <input type="text" name="first_name" id="first_name" class="form-control stylish-input" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-floating">
                                    <label for="last_name">Last Name</label><br>
                                        <input type="text" name="last_name" id="last_name" class="form-control stylish-input" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div >
                                    <div class="form-floating">
                                    <label for="email">Email</label><br>
                                        <input type="email" name="email" id="email" class="form-control stylish-input" placeholder="Email" required>
                                    </div>
                                </div>
                                <div >
                                    <div class="form-floating">
                                    <label for="mobile">Mobile</label><br>
                                    <input type="tel" name="mobile" id="mobile" class="form-control stylish-input" placeholder="Mobile" required>
                                    </div>
                                </div>


                                <div >
                                    <div class="form-floating">
                                    <label for="message">Type Your Message Here...</label>

                                        <textarea name="message" id="message" rows="5" class="form-control stylish-input" placeholder="Type Your Message Here..." style="height: 150px" required></textarea>
                                    </div>
                                </div>

                                <div >
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 glowing-button">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Card Animation */

.animated-card {
    transition: transform 0.3s, box-shadow 0.3s;
    background: #fff;
    border-radius: 15px;
}

.animated-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

/* Form Styling */
.stylish-input {
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    transition: all 0.3s ease;
    padding: 15px 20px;
    font-size: 1.1rem;
    min-height: 56px;
    background: #f9f9f9;
}

.stylish-input:focus {
    border-color: #4a90e2;
    background: #fff;
    box-shadow: 0 0 10px rgba(74, 144, 226, 0.3);
}

/* Floating Labels */
.form-floating label {
    color: #6c757d;
    font-weight: 500;
    font-size: 1rem;
    padding: 0 20px;
}

/* Button */
.glowing-button {
    background: linear-gradient(135deg, #4a90e2, #357abd);
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.glowing-button:hover {
    background: linear-gradient(135deg, #357abd, #4a90e2);
    transform: translateY(-2px);
    box-shadow: 0 0 15px rgba(74, 144, 226, 0.6);
}

/* Fade-In Animation */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease-in-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
body.dark-theme{
    background-color: #06043b;
}
body.dark-theme .container-fluid {
    background: #06043b !important; /* Dark background */
}
body.dark-theme h1{
    color: var(--light);
}
body.dark-theme .animated-card{
    background-color: #2d4983;
    }
</style>
@endsection
