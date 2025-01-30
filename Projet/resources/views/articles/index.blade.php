@extends('layouts.app')

@section('content')
<style>
   .article1-list {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping to fit only four cards per row */
    gap: 20px; /* Space between cards */
    padding: 20px;
    margin-top: 30px;
    justify-content: center; /* Center items horizontally */
}

.article1-card {
    width: calc(25% - 20px); /* Ensure four cards fit in one row, minus the gap */
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    padding: 20px;
    display: flex; 
    flex-direction: column; 
    justify-content: space-between;
}
.article1-card p {
    flex-grow: 1;
    margin: 15px 0;
}
.article1-card .button-container {
    text-align: center;
    margin-top: auto; /* Push to bottom */
}

.article1-card .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ffc107;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: max-content; /* Prevent full width */
    margin: 0 auto; /* Center horizontally */
}
@media (max-width: 768px) {
    .article1-card {
        width: calc(50% - 20px); /* Adjust for smaller screens, 2 cards per row */
    }
}

@media (max-width: 480px) {
    .article1-card {
        width: calc(100% - 20px); /* Adjust for very small screens, 1 card per row */
    }
}
.article1-card img {
    width: 100%;
    height: 200px;
    border-radius: 8px;
    object-fit: cover;
}

.article1-card h2 {
    margin-top: 15px;
    font-size: 1.5rem;
    color: #333;
}

.article1-card p {
    margin-top: 10px;
    font-size: 1rem;
    color: #666;
    
}

.article1-card .btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #ffc107;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    
}

.article1-card .btn:hover {
    background-color: #e0a800;
}

.article1-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.article1-card .btn:disabled {
    background-color: #a07904;
}

.article1-card .btn:disabled:hover {
    background-color: #a07904;
    cursor: not-allowed;
}
body.dark-theme .article1-card {
    background-color: #2d4983; /* Darker background for dark mode */
    color: #ddd; /* Lighter text for readability */
}

body.dark-theme .article1-card h2 {
    color: #fff; /* Lighter title color */
}

body.dark-theme .article1-card p {
    color: #bbb; /* Lighter content color */
}

body.dark-theme .article1-card .btn {
    background-color: #ff9900; /* Slightly lighter button for dark theme */
}

body.dark-theme .article1-card .btn:hover {
    background-color: #e68a00; /* Button hover effect in dark mode */
}
</style><h1>All Articles</h1>

<div class="article1-list">
    @foreach ($articles as $article)
    @if ($article->status == 'published')

        <div class="article1-card">

            <!-- Display the image -->
            <a href="{{ route('articles.show', $article->id) }}" >
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="max-width: 100%;  border-radius: 8px;">
            </a>

            <h2>{{ $article->title }}</h2>
            <p>{{ Str::limit($article->content, 150) }}</p>
            <a href="{{ route('articles.show', $article->id) }}" class="btn">Read More</a>

        </div>
        @endif

    @endforeach
</div>
@endsection
