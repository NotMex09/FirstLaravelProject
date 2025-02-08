@extends('layouts.app')

@section('content')
<style>
    /* General Layout */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Heading Styles */
h1, h2 {
    font-family: 'Arial', sans-serif;
    color: #333;
}

h1 {
    font-size: 32px;
    margin-bottom: 20px;
}

h2 {
    font-size: 24px;
    margin-top: 30px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
    color: #444;
}

/* List Styling */
ul {
    list-style: none;
    padding-left: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #007BFF;
    font-size: 18px;
}

.sr:hover {
    text-decoration: underline;
    color: #0056b3;
}

/* No Results Found Message */
p {
    font-size: 18px;
    color: #888;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    h1 {
        font-size: 28px;
    }

    h2 {
        font-size: 20px;
    }

    a {
        font-size: 16px;
    }
}
body.dark-theme .container {

    background-color: #2d4983;
}

</style>
<div class="container">
    <h1>Search Results</h1>

    @if ($articles->isEmpty() && $themes->isEmpty() && $issues->isEmpty())
        <p>No results found for "{{ $query }}".</p>
    @else
        <!-- Articles -->
        @if ($articles->isNotEmpty())
            <h2>Articles</h2>
            <ul>
                @foreach ($articles as $article)
                 @if($article->status=='published')
                    <li>
                        <a href="{{ route('articles.show', $article) }}" class="sr" >{{ $article->title }}</a>
                    </li>
                    @endif
                @endforeach
            </ul>
        @endif

        <!-- Themes -->
        @if ($themes->isNotEmpty())
            <h2>Themes</h2>
            <ul>
                @foreach ($themes as $theme)
                    <li>
                        <a href="{{ route('themes.show', $theme) }}" class="sr">{{ $theme->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Issues -->
        @if ($issues->isNotEmpty())
            <h2>Issues</h2>
            <ul>
                @foreach ($issues as $issue)
                    <li>
                        <a href="{{ route('issues.show', $issue) }}" class="sr">{{ $issue->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
@endsection
