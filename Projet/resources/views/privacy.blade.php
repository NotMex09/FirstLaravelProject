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
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: fadeIn 1s ease-in-out;
}

h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
}

p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 20px;
}

.section {
    margin-bottom: 30px;
    padding: 20px;
    background: #f9fafb;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.section:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
}

.section h2 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #1d4ed8;
    font-weight: 600;
}

.section p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

footer {
    text-align: center;
    font-size: 0.9rem;
    color: #888;
    margin-top: 30px;
    border-top: 1px solid #e5e7eb;
    padding: 15px 0;
}
body.dark-theme h1{
    color: #efeff1
}
body.dark-theme h2{
    color: #1d4ed8
}
body.dark-theme .container{
    background-color: #35487d
}
body.dark-theme .tw{
    color: #ffffff;
}
body.dark-theme a {
    color:rgb(98, 140, 255);
}

</style>

<div class="container">
    <h1>Privacy Policy</h1>
    <p class="tw">Welcome to Tech Horizons! We value your privacy and are committed to protecting your personal data. Below, you'll find all the details about how we handle your information and your rights.</p>

    <div class="section">
        <h2>1. Data We Collect</h2>
        <p>We collect personal data that you provide when signing up, such as your name, email, and preferences. Additionally, we collect usage data like browsing history to improve your experience.</p>
    </div>

    <div class="section">
        <h2>2. How We Use Your Data</h2>
        <p>We use your data to provide personalized article recommendations, maintain your account, and improve our services. Your data helps us offer relevant content tailored to your interests in technology themes like AI, cybersecurity, IoT, and virtual reality.</p>
    </div>

    <div class="section">
        <h2>3. Sharing Your Data</h2>
        <p>We do not sell your data. However, we may share it with trusted partners to enhance our services, such as analytics providers. Rest assured, your data is secure and used solely for its intended purposes.</p>
    </div>

    <div class="section">
        <h2>4. Terms of Service</h2>
        <p><strong>Your Consent:</strong> By using Tech Horizons, you agree to our terms of service and privacy practices. Please review these terms carefully to understand your rights and responsibilities.</p>
    </div>

    <div class="section">
        <h2>5. Your Rights</h2>
        <p>You have the right to access, modify, or delete your personal data at any time. Contact us at <a href="mailto:support@techhorizons.com">support@techhorizons.com</a> for any requests or questions.</p>
    </div>

    <footer>
        © 2025 Tech Horizons. All rights reserved. | <a href="http://127.0.0.1:8000/about">About Us</a> | <a href="http://127.0.0.1:8000/contact">Contact</a> | <a href="http://127.0.0.1:8000/privacy">Privacy Policy</a>
    </footer>
</div>
@endsection
