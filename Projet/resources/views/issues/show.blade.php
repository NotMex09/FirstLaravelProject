@extends('layouts.app')

@section('content')

<style>
/* 🌟 Global Styles */
body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
    font-family: 'Poppins', sans-serif;
}

/* 🌟 Main Container */
.container {
    max-width: 900px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1); /* Glass effect */
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
    transition: transform 0.3s ease;
}

/* 🌟 Hover Effect */
.container:hover {
    transform: scale(1.02);
}

/* 🌟 Title Styling */
h1 {
    font-size: 2.5rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
    background: linear-gradient(90deg, #ff8a00, #da1b60);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* 🌟 Description */
p {
    font-size: 1.1rem;
    margin-bottom: 10px;
}

/* 🌟 Articles List */
ul {
    list-style: none;
    padding: 0;
}

li {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px;
    margin: 8px 0;
    border-radius: 8px;
    transition: background 0.3s ease, transform 0.2s ease;
}

li:hover {
    background: rgba(255, 255, 255, 0.4);
    transform: translateX(5px);
}

a {
    text-decoration: none;
    color: #ffcc00;
    font-weight: bold;
    transition: color 0.3s ease;
}

a:hover {
    color: #ffffff;
}

/* 🌟 Button Styling */
.btn {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-secondary {
    background: #ff8a00;
    color: white;
    border: none;
}

.btn-secondary:hover {
    background: #da1b60;
    transform: scale(1.1);
}

/* 🌟 Smooth Fade-in Animation */
.container {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeIn 1s forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<!-- 💎 Main Content -->
<div class="container">
    <h1>{{ $issue->title }}</h1>
    <p>{{ $issue->description }}</p>
    <p><strong>Publication Date:</strong> {{ $issue->publication_date->format('M d, Y') }}</p>
    <p><strong>Status:</strong> {{ $issue->is_public ? 'Public' : 'Private' }}</p>

    <a href="{{ route('issues.index') }}" class="btn btn-secondary">⬅ Back to Issues</a>

    <h2>📜 Articles</h2>

    @if ($issue->articles->isEmpty())
        <p>No articles available for this issue.</p>
    @else
        <ul>
            @foreach ($issue->articles as $article)
                <li><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></li>
            @endforeach
        </ul>
    @endif
</div>

<!-- 🌟 JavaScript for Scroll Effect -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".container");
    container.classList.add("show");
});
</script>

@endsection
