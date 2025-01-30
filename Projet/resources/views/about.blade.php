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
    max-width: 900px;
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
    text-align: justify;
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

.section img {
    width: 100%;
    border-radius: 12px;
    margin-top: 15px;
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
    color: #f9f9f9
}
body.dark-theme h2{
    color: #1d4ed8
}
body.dark-theme .container{
    background-color: #35487d
}
body.dark-theme .tw{
    color: #efeff1
}
body.dark-theme li{
    color: black
}
</style>

<div class="container">
    <h1>About Us</h1>
    <p class="tw">Welcome to Tech Horizons! We are dedicated to exploring the latest advancements in technology, innovation, and how they shape our world. Our mission is to provide insightful articles on topics like artificial intelligence, cybersecurity, IoT, and virtual reality.</p>

    <div class="section">
        <h2>Our Vision</h2>
        <p>At Tech Horizons, we envision a world where technology is accessible, understood, and embraced by all. Our articles aim to bridge the gap between complex technological concepts and everyday readers.</p>
        <img src="https://alcorfund.com/wp-content/uploads/2020/09/Technical-Innovation.png" alt="Technology Innovation">
    </div>

    <div class="section">
        <h2>What We Cover</h2>
        <p>We bring you the latest trends in:
            <ul>
                <li>Artificial Intelligence (AI)</li>
                <li>Cybersecurity</li>
                <li>Internet of Things (IoT)</li>
                <li>Virtual and Augmented Reality</li>
            </ul>
        </p>
        <img src="https://imageio.forbes.com/specials-images/imageserve/65c9c44ac205195ae02e22ec/0x0.jpg?format=jpg&height=900&width=1600&fit=bounds" alt="Latest Tech Trends">
    </div>

    <div class="section">
        <h2>Our Team</h2>
        <p>Our team of tech enthusiasts, writers, and editors work tirelessly to ensure the quality and reliability of every article. With a shared passion for technology, we aim to inspire curiosity and foster a love for learning.</p>
        <img src="https://www.workitdaily.com/media-library/happy-employees-on-a-successful-team.jpg?id=30117495&width=1245&height=700&quality=85&coordinates=0%2C66%2C0%2C28" alt="Team Work Culture">
    </div>

    <footer>
        © 2025 Tech Horizons. All rights reserved. | <a href="http://127.0.0.1:8000/about">About Us</a> | <a href="http://127.0.0.1:8000/contact">Contact</a> | <a href="http://127.0.0.1:8000/privacy">Privacy Policy</a>
    </footer>
</div>
@endsection
