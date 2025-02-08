@extends('layouts.app')

@section('content')
<style>
    .theme1-list {
        display: flex;
    flex-wrap: wrap; /* Allow wrapping to fit only four cards per row */
    gap: 20px; /* Space between cards */
    padding: 20px;
    margin-top: 30px;
    justify-content: center; /* Center items horizontally */}

.theme1-card {
    width: calc(25% - 20px); /* Ensure four cards fit in one row, minus the gap */
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;

    padding: 20px;
    display: flex; /* Add flex display */
    flex-direction: column; /* Stack elements vertically */
    justify-content: space-between;
}

.theme1-card .button-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: auto; /* Push to bottom */
    text-align: center;
}
.theme1-card .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ffc107;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: max-content; /* Prevent full width */
    margin: 0 auto; /* Center buttons horizontally */
}
.theme1-card form {
    margin: 0;
    text-align: center;
}
.theme1-card button.btn {
    width: 100%; /* Make subscribe button full width in container */
    max-width: 200px; /* Limit maximum width */
}
@media (max-width: 768px) {
    .theme1-card {
        width: calc(50% - 20px); /* Adjust for smaller screens, 2 cards per row */
    }
}

@media (max-width: 480px) {
    .theme1-card {
        width: calc(100% - 20px); /* Adjust for very small screens, 1 card per row */
    }
}
.theme1-card img {
    width: 100%;
    height: 200px;
    border-radius: 8px;
    object-fit: cover;
}

.theme1-card h2 {
    margin-top: 15px;
    font-size: 1.5rem;
    color: #333;
}

.theme1-card p {
    margin-top: 10px;
    font-size: 1rem;
    color: #666;
    flex-grow: 1;
    margin: 15px 0;
}


.theme1-card .btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #ffc107;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.theme1-card .btn:hover {
    background-color: #e0a800;
}

.theme1-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.theme1-card .btn:disabled {
    background-color: #a07904;
}

.theme1-card .btn:disabled:hover {
    background-color: #a07904;
    cursor: not-allowed;
}
body.dark-theme .theme1-card{
    background-color: #2d4983;
}
body.dark-theme h2{
    color: #fdfcfc
}
body.dark-theme .theme1-card p {

    color: #bbb;

}
</style><h1>All Themes</h1>

<div class="theme1-list">
    @foreach ($themes as $theme)
        <div class="theme1-card">
            <!-- Display the image -->
            <a href="{{ route('themes.show', $theme->id) }}" >
                <img src="{{ asset('storage/' . $theme->image) }}" alt="{{ $theme->name }}" style="max-width: 100%;  border-radius: 8px;">
            </a>

            <h2>{{ $theme->name }}</h2>
            <p>{{ $theme->description }}</p>
            <a href="{{ route('themes.show', $theme->id) }}" class="btn">View Articles</a>

            @auth
            @php
                // Check if the user is already subscribed to the theme
                $isSubscribed = \App\Models\Subscription::where('user_id', auth()->id())
                    ->where('theme_id', $theme->id)
                    ->exists();
            @endphp

            <form action="{{ route('subscriptions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                <button type="submit" class="btn" style="background-color: {{ $isSubscribed ? '#dc3545' : '#28a745' }};">
                    {{ $isSubscribed ? 'Unsubscribe' : 'Subscribe' }}
                </button>
            </form>
            @endauth
        </div>
    @endforeach
</div>
@endsection
