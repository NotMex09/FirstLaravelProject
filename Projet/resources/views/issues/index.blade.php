@extends('layouts.app')

@section('content')
<style>
    .issue-status {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
}

.public-icon {
    color: green;
}

.private-icon {
    color: red;
}

   .issue1-list {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping to fit only four cards per row */
    gap: 20px; /* Space between cards */
    padding: 20px;
    margin-top: 30px;
    justify-content: center; /* Center items horizontally */
}

.issue1-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between; 
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    padding: 20px;
    height: 500px; 
    width: 300px;
}
@media (max-width: 768px) {
    .issue1-card {
        width: calc(50% - 20px); /* Adjust for smaller screens, 2 cards per row */
    }
}

@media (max-width: 480px) {
    .issue1-card {
        width: calc(100% - 20px); /* Adjust for very small screens, 1 card per row */
    }
}
.issue1-card img {
    width: 100%;
    height: 200px;
    border-radius: 8px;
    object-fit: cover;
}

.issue1-card h2 {
    margin-top: 15px;
    font-size: 1.5rem;
    color: #333;
}

.issue1-card p {
    margin-top: 10px;
    font-size: 1rem;
    color: #666;
}

.issue1-card .btn {
    margin-top: auto; 
    padding: 10px 20px;
    background-color: #ffc107;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: auto; 
    align-self: center;
}

.issue1-card .btn:hover {
    background-color: #e0a800;
}

.issue1-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.issue1-card .btn:disabled {
    background-color: #a07904;
}

.issue1-card .btn:disabled:hover {
    background-color: #a07904;
    cursor: not-allowed;
}
body.dark-theme .issue1-card{
    background-color: #2d4983;
}
body.dark-theme h2{
color: #fdfefe;
}

body.dark-theme .issue1-card p {
    margin-top: 10px;
    font-size: 1rem;
    color: #bbb;
}
</style><h1>All issues</h1>

<div class="issue1-list">
    @foreach ($issues as $issue)
        <div class="issue1-card">
            <div class="issue-status">
                @if($issue->is_public)
                    <span class="public-icon" title="Public Issue">🌍</span>
                @else
                    <span class="private-icon" title="Private Issue">🔒</span>
                @endif
            </div>
            <!-- Display the image -->
            <a href="{{ route('issues.show', $issue->id) }}" >
                <img src="{{ asset('storage/' . $issue->image) }}" alt="{{ $issue->title }}" style="max-width: 100%;  border-radius: 8px;">
            </a>

            <h2>{{ $issue->title }}</h2>
            <p>{{ Str::limit($issue->description, 150) }}</p>
            <a href="{{ route('issues.show', $issue->id) }}" class="btn">View Articles</a>


        </div>
    @endforeach
</div>
@endsection
