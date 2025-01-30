@extends('layouts.app')

@section('content')
<!-- Inline or external styling -->
<style>
    .chat-section {
        margin-top: 40px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .chat-messages {
        margin-bottom: 20px;
    }

    .message {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .message img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .message .message-content {
        flex-grow: 1;
    }

    .message .message-content p {
        margin: 0;
        font-size: 1rem;
        color: #555;
    }

    .message small {
        color: #888;
        font-size: 0.9rem;
    }

    .chat-section form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .chat-section textarea {
        padding: 10px;
        font-size: 1rem;
        border-radius: 5px;
        border: 1px solid #ddd;
        resize: vertical;
    }

    .chat-section .btn {
        padding: 10px 20px;
        background-color: #4a90e2;
        color: white;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .chat-section .btn:hover {
        background-color: #357abd;
    }
    .article-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        text-transform: capitalize;
    }

    .article-content {
        font-size: 1.2rem;
        line-height: 1.8;
        color: #555;
        margin-bottom: 40px;
        text-align: justify;
        margin-left:27px;
        margin-right:27px;
    }
    body.dark-theme .article-content{
        color: rgb(255, 255, 255)
    }
    body.dark-theme h2,body.dark-theme strong{
        color: #333
    }
</style>

<!-- Success message display -->
@if (session('success'))
        <div class="custom-alert custom-alert-success">
            {{ session('success') }}
        </div>
@endif

<!-- Article Section -->
<h1 class="article-title">{{ $article->title }}</h1>
<p class="article-content">{{ $article->content }}</p>

<div class="chat-section">
    <h2>Discussion</h2>
    <div class="chat-messages">
        @foreach ($article->conversations as $message)
            <div class="message">

                <img
                src="{{ $message->user->image ? asset('/' . $message->user->image) : asset('/uploads/profile_pictures/default-image.jpg')  }}"
                alt="{{ $message->user->name }}">

                <div class="message-content">
                    <strong>{{ $message->user->name }}:</strong>
                    <p>{{ $message->message }}</p>
                    <small>{{ $message->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach
    </div>
    <form id="messageForm"action="{{ route('conversations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <textarea name="message" rows="3" class="form-control" placeholder="Your message..." required></textarea>

        @auth
            <!-- Only show the "Send" button if the user is authenticated -->
            <button type="submit" class="btn">Send</button>
        @else
            <!-- Show the "Login to Send" button if the user is not authenticated -->
            <a href="{{ route('login') }}" class="btn">Login to Send</a>
        @endauth
    </form>

</div>
@auth

<div class="rating-section">
    <h2>Rate this Article</h2>
    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <select name="rating" class="form-control" required>
            <option value="1">⭐</option>
            <option value="2">⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
        </select>
        <button type="submit" class="btn">Submit Rating</button>
    </form>
</div>
@endauth
<script></script>
@endsection
