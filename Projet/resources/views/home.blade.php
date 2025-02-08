@extends('layouts.app')

@section('content')
<style>
/* General Styling */
.theme-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    margin-top: 30px;
    border: 2px solid #333;
    border-radius: 8px;
}
body.dark-theme .theme-list{border: 2px solid white;}
/* Add styles for the animated circle container */
.circle-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    margin-top: 20px; /* Adjust the space between the text and animation */
}

.circle {
    position: absolute;
    background: transparent;
    width: calc(var(--i) * 2.5vmin);
    aspect-ratio: 1;
    border-radius: 50%;
    border: 3px solid rgb(0, 255, 13);
    transform-style: preserve-3d;
    transform: rotateX(70deg) translateZ(50px);
    animation: animate 3s ease-in-out calc(var(--i) * 0.08s) infinite;
    box-shadow: 0 0 15px rgb(124, 124, 124),
                inset 0 0 15px rgb(124, 124, 124);
}

@keyframes animate {
    0%, 100% {
        transform: rotateX(70deg) translateZ(50px) translateY(0);
        filter: hue-rotate(0);
    }

    50% {
        transform: rotateX(70deg) translateZ(50px) translateY(-50vmin);
        filter: hue-rotate(360deg);
    }
}

.pagination-links {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.pagination-links .page-item {
    list-style-type: none;
}

.pagination-links .page-link {
    display: inline-block;
    padding: 8px 12px;
    margin: 0 5px;
    border: 1px solid #333;
    border-radius: 5px;
    color: #333;
    text-decoration: none;
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
}

.pagination-links .page-link:hover {
    background-color: #333;
    color: #fff;
    border-color: #333;
}

.pagination-links .active .page-link {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    border-color: #007bff;
    font-size: 1.2rem;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
}

.current-page {
    text-align: center;
    margin-top: 10px;
    font-size: 1.1rem;
    color: #333;
}

.current-page p {
    font-weight: bold;
    color: #007bff;
}

/* Styling for cards and theme list */
.article-card img,
.theme-card img,
.issue-card img {
    max-width: 100%;
    height: 180px;
}

/* Card Styling */
.article-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.article-card h3 {
    font-size: 1.25rem;
    margin-bottom: 10px;
    color: #2c3e50;
}

.article-card p {
    flex-grow: 1;
    margin-bottom: 15px;
    color: #555;
}

.article-card .btn {
    align-self: flex-start;
    padding: 10px 20px;
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin: 0 auto;
}

.article-card .btn:hover {
    background-color: #357abd;
}

/* Dark Mode Compatibility */
body.dark-theme .hero-section h1,
body.dark-theme .latest-articles h2,
body.dark-theme .latest-issues h2,
body.dark-theme .featured-themes h2 {
    color: #ffffff;
}

body.dark-theme .article-card,
body.dark-theme .issue-card,
body.dark-theme .theme-card {
    background-color: #2d4983;
    border-color: #eff1f2;
}

body.dark-theme .article-card h3,
body.dark-theme .issue-card h3,
body.dark-theme .theme-card h3 {
    color: #ecf0f1;
}

body.dark-theme .article-card p,
body.dark-theme .theme-card p {
    color: #ecf0f1;
}

body.dark-theme .btn {
    background-color: #3498db;
}

body.dark-theme .btn:hover {
    background-color: #2980b9;
}

/* Animated Text Container */
.animated-text-container {
    text-align: center;
    margin-top: 50px;
    margin-bottom: 30px;
}

/* Text Animation (Typing Effect) */
.animated-text {
    font-size: 2.5rem;
    font-weight: bold;
    color: #080808;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    border-right: 4px solid #f6f3f3;
    animation: typing 4s steps(40) 1s 1 normal both, blink 0.75s step-end infinite;
}
body.dark-theme .animated-text{
    color: white;
}
body.dark-theme blink{
    border-color: white
}
@keyframes typing {
    from {
        width: 0;
    }
    to {
        width: 45%;
    }
}

@keyframes blink {
    50% {
        border-color:black;
    }
}
.ET{margin-left: 30px;}
.right-column{margin-top: -4px;}
</style>

<div class="hero-section">
    <h1>Explore the Future of Technology</h1>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<!-- Add animated circles decoration -->
<div class="circle-container">
    <div class="circle" style="--i:0;"></div>
    <div class="circle" style="--i:1;"></div>
    <div class="circle" style="--i:2;"></div>
    <div class="circle" style="--i:3;"></div>
    <div class="circle" style="--i:4;"></div>
    <div class="circle" style="--i:5;"></div>
    <div class="circle" style="--i:6;"></div>
    <div class="circle" style="--i:7;"></div>
    <div class="circle" style="--i:8;"></div>
    <div class="circle" style="--i:9;"></div>
    <div class="circle" style="--i:10;"></div>
    <div class="circle" style="--i:11;"></div>
    <div class="circle" style="--i:12;"></div>
    <div class="circle" style="--i:13;"></div>
    <div class="circle" style="--i:14;"></div>
    <div class="circle" style="--i:15;"></div>
    <div class="circle" style="--i:16;"></div>
    <div class="circle" style="--i:17;"></div>
    <div class="circle" style="--i:18;"></div>
    <div class="circle" style="--i:19;"></div>
    <div class="circle" style="--i:20;"></div>
</div>

<div class="main-container">
    <!-- Left Column (Latest Issues and Latest Articles) -->
    <div class="left-column">
        <div class="latest-articles">
            <h2 class="ET">Latest Articles</h2>
            <div class="article-list">
                @foreach ($articles as $article)
                <div class="article-card">
                    <a href="{{ route('articles.show', $article->id) }}">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    </a>
                    <h3>{{ $article->title }}</h3>
                    <p>{{ Str::limit($article->content, 150) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn">Read More</a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="latest-issues">
            <h2 class="ET">Latest Issues</h2>
            <div class="issue-list">
                @foreach ($issues as $issue)
                <div class="issue-card">
                    <a href="{{ route('issues.show', $issue->id) }}">
                        <img src="{{ asset('storage/' . $issue->image) }}" alt="{{ $issue->title }}">
                    </a>
                    <h3>{{ $issue->title }}</h3>
                    <a href="{{ route('issues.show', $issue->id) }}" class="btn">View Issue</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Column (Theme List) -->
    <div class="right-column">
        <div class="featured-themes">
            <h2 class="ET">Featured Themes</h2>
            <div class="theme-list">
                @foreach ($themes as $theme)
                <div class="theme-card">
                    <a href="{{ route('themes.show', $theme->id) }}">
                        <img src="{{ asset('storage/' . $theme->image) }}" alt="{{ $theme->name }}">
                    </a>
                    <h3>{{ $theme->name }}</h3>
                    <p>{{ $theme->description }}</p>
                    <a href="{{ route('themes.show', $theme->id) }}" class="btn">Learn More</a>
                </div>
                @endforeach
                <!-- View More Button -->
                <div class="view-more-container">
                    <a href="{{ route('themes.index') }}" class="btn">View More Themes</a>
                </div>
            </div>
        </div>
    </div>

</div>
      <!-- Animated Text -->
<div class="animated-text-container">
    <h2 class="animated-text">Thanks for visiting our Website</h2>
</div>

@endsection
