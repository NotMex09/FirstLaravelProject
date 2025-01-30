@extends('layouts.app')

@section('content')
<h1>Welcome back, {{ Auth::user()->name }}!</h1>

<!-- Propose Article Button -->
<div class="propose-article-section">
    <a href="{{ route('articles.create') }}" class="btn">Propose Article</a>
</div>

<!-- Recommended Articles -->
<div class="recommended-articles">
    <h2>Recommended Articles</h2>
    <div class="article-list">
        @foreach ($recommendedArticles as $article)
            <div class="article-card">
                <h3>{{ $article->title }}</h3>
                <p>{{ Str::limit($article->content, 100) }}</p>
                <a href="{{ route('articles.show', $article->id) }}" class="btn">Read More</a>
            </div>
        @endforeach
    </div>
</div>

<!-- Subscribed Themes -->
<div class="subscribed-themes">
    <h2>Your Subscribed Themes</h2>
    <div class="theme-list">
        @foreach ($subscribedThemes as $theme)
            <div class="theme-card">
                <h3>{{ $theme->name }}</h3>
                <a href="{{ route('themes.show', $theme->id) }}" class="btn">View Articles</a>
            </div>
        @endforeach
    </div>
</div>

<!-- Latest Issues -->
<div class="latest-issues">
    <h2>Latest Issues</h2>
    <div class="issue-list">
        @foreach ($latestIssues as $issue)
            <div class="issue-card">
                <img src="{{ asset('images/issues/' . $issue->cover_image) }}" alt="{{ $issue->title }}">
                <h3>{{ $issue->title }}</h3>
                <a href="{{ route('issues.show', $issue->id) }}" class="btn">View Issue</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
