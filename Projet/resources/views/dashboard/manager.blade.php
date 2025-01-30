@extends('layouts.app')

@section('content')
<!-- Inline CSS for this page only -->
<style>
/* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fc;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Flex Container for Sidebar and Main Content */
.dashboard-container {
    display: flex;
    min-height: calc(100vh - 120px); /* Adjust based on header/footer height */
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    background-color: #34495e;
    color: white;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #fff;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    font-size: 1.1rem;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

/* Main Content Styling */
.main-content {
    flex-grow: 1;
    padding: 20px;
    background-color: #fff;
}

/* manager Section Styling */
.manager-section {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.manager-section h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 20px;
}

.manager-section p {
    font-size: 1.1rem;
    line-height: 1.5;
}

/* Button Styling */
.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color:#0056b3;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 1rem;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #2C3E50  !important;
}

/* Table Styling */
.user-table, .article-table, .issue-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.user-table th, .user-table td, .article-table th, .article-table td, .issue-table th, .issue-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.user-table th, .article-table th, .issue-table th {
    background-color: #f4f7fc;
    font-weight: bold;
}

.user-table tr:hover, .article-table tr:hover, .issue-table tr:hover {
    background-color: #f9f9f9;
}

/* Pagination Styling */
.pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

.pagination ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    gap: 10px;
}

.pagination ul li {
    display: inline;
}

.pagination ul li a, .pagination ul li span {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    color: #007bff;
    transition: background-color 0.3s ease;
}
h1{
    font-size:1.8rem;
    margin:5px 0;
}
.pagination ul li a:hover {
    background-color: #f4f7fc;
}

.pagination ul li span {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

/* Edit Button Styling */
.btn-edit {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    margin-right: 5px;
}

.btn-edit:hover {
    background-color: #218838;
}

/* Danger Button Styling */
.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Hidden Content */
.hidden {
    display: none;
}/* Statistics Section */
.statistics {
    margin-top: 20px;
    padding: 20px;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.statistics-item {
    text-align: center;
    padding: 15px;
    margin: 10px;
    border-radius: 8px;
    flex: 1 1 45%; /* Set each item to take 45% of the container */
    max-width: 45%; /* Make sure items don't stretch too far */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.statistics-item strong {
    font-size: 1.5rem;
    color: rgb(255, 255, 255);
    display: block;
    margin-bottom: 10px;
}

.statistics-item span {
    font-size: 1.2rem;
    color: #ffffff;
}

/* Mobile Optimization */
@media (max-width: 767px) {
    .statistics {
        padding: 15px;
        justify-content: center;
    }

    .statistics-item {
        max-width: 100%;
        flex: 1 1 100%; /* Items will stack in one column on small screens */
        padding: 10px;
    }

    .statistics-item strong {
        font-size: 1.3rem;
    }

    .statistics-item span {
        font-size: 1rem;
    }
}
/* Active Link Styling */
.sidebar ul li a.active {
    background-color: #2C3E50; /* Darker background for active link */
    font-weight: bold; /* Make the text bold */
    border-left: 4px solid #007bff; /* Add a left border for emphasis */
}
/* ### Dark Mode Styles ### */
body.dark-theme .main-content{
    background-color: #1e293b;
}
body.dark-theme .sidebar{
    background-color: #2d4983;

}
body.dark-theme .statistics{

    background: linear-gradient(21deg, #080808, #2d4983);
}



/* ## */
body.dark-theme .user-table th,body.dark-theme .article-table  th ,.dark-them.article-table th, .dark-them.issue-table th,body.dark-theme .issue-table th {
    background-color: #2d4983; /* Dark table header */
    color: #ecf0f1; /* Light text color */
}
/* ## */
body.dark-theme  .user-table tr:hover,body.dark-theme .article-table  tr:hover  ,body.dark-theme.article-table tr:hover,body.dark-theme .issue-table tr:hover {

background-color:rgba(45, 74, 131, 0.76);}
/* ## */
body.dark-theme .theme-card ,body.dark-theme .article-card{
    background-color: #2d4983; /* Dark background for statistics items */
    color: #ecf0f1; /* Light text */
}
</style>
<!-- Dashboard Container -->
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="#manager-section" onclick="showContent('manager-section')">Dashboard</a></li>
            <li><a href="#articles-list" onclick="showContent('articles-list')">All My theme Articles</a></li>
            <li><a href="#Proposed-articles-list" onclick="showContent('Proposed-articles-list')">My theme proposed articles </a></li>
            <li><a href="#subscribers-list" onclick="showContent('subscribers-list')">All my theme subscribers</a></li>

            <li><a href="#conversations-list" onclick="showContent('conversations-list')">All My theme comments</a></li>

            <li><a href="#my-conversations-list" onclick="showContent('my-conversations-list')">My comments</a></li>
            <li><a href="#my-Proposed-articles-list" onclick="showContent('my-Proposed-articles-list')">My Proposed articles</a></li>

            <li><a href="#subscribed-themes" onclick="showContent('subscribed-themes')">Subscribed Themes</a></li>
            <li><a href="#recommended-articles" onclick="showContent('recommended-articles')">Recommended Articles</a></li>

            <li><a href="#all-issues" onclick="showContent('all-issues')">All Issues</a></li>

            <!-- Add the "Create New Article" button here -->
        <li>
            <a href="{{ route('articles.create') }}" class="btn" style="display: block; text-align: center; margin-top: 10px;">
                Create New Article
            </a>
        </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">


       <!-- Editor Dashboard -->
<div id="manager-section" class="">
<h1>Welcome back {{ Auth::user()->name }}, Manager of
    @if($theme = $themes->firstWhere('id', Auth::user()->manager_of_theme))
        {{ $theme->name }}
    @endif

        !</h1>
    <h2>Dashboard</h2>

    <!-- Statistics Section -->
    <div class="statistics">
        <div class="statistics-item" style="background-color:#ffc107;">
            <strong>Users</strong>
            <span>{{ $userCount }}</span>
        </div>
        <div class="statistics-item" style="background-color:#B771E5;">
            <strong>subscribers</strong>
            <span>{{ $subscriptionCount}}</span>
        </div>
        <div class="statistics-item" style="background-color:#17a2b8;">
            <strong>Articles</strong>
            <span>{{ $articleCount }}</span>
        </div>
        <div class="statistics-item" style="background-color:#28a745;">
            <strong>Comments</strong>
            <span>{{ $commentCount }}</span>
        </div>
    </div>
</div>



<!--  my theme Proposed articles Section -->
<div id="Proposed-articles-list" class="Proposed-articles-list hidden">
    <div class="create-buttons" style="margin-bottom: 20px; display: flex; gap: 10px;">
    </div>

    <h2>Proposed Articles</h2>
    <table class="article-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myThemeProposedArticles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->author->name ?? 'Unknown' }}</td>
                        <td>
                            @if ($article->created_at)
                                {{ $article->created_at->format('Y-m-d') }}
                            @else
                                Not Published
                            @endif
                        </td>
                        <td>
                            <!-- Status Change Form -->
                            <form action="{{ route('articles.updateStatus', $article->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" {{ $article->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $article->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn">View Article</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color:#dc3545;">Delete</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif





<!-- All my theme  articles Section -->

        <div id="articles-list" class="articles-list hidden">
        <div class="create-buttons" style="margin-bottom: 20px; display: flex; gap: 10px;">
    <a href="{{ route('articles.create') }}" class="btn btn-primary" style="background-color:rgb(0, 179, 255); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
        Create New Article
    </a>

</div>

    <h2>All Articles</h2>
    <table class="article-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myThemeArticles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->author->name ?? 'Unknown' }}</td> <!-- Assuming the article has an 'author' relationship -->
                    <td>
                        @if ($article->created_at)
                            {{ $article->created_at->format('Y-m-d') }}
                        @else
                            Not Published
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn">View Article</a>

                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>

<!-- All Issues Section -->
<div id="all-issues" class="all-issues hidden" >
    <div class="create-buttons" style="margin-bottom: 20px; display: flex; gap: 10px;">

    <a href="{{ route('issues.create') }}" class="btn btn-primary" style="background-color: #17a2b8; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
        Create New Issue
    </a>
</div>
<h2>All Issues</h2>

    <table class="issue-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
                <tr>
                <td>{{ $issue->title }}</td>
                <td>{{ $issue->description }}</td>

                <td>
                            @if ($issue->created_at)
                                {{ $issue->created_at->format('Y-m-d') }}
                            @else
                                Not Published
                            @endif
                        </td>
                    <td>
                        <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-view">View</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        <!-- All subscribers List -->
        <div id="subscribers-list" class="subscribers-list hidden">
            <h2>All subscribers</h2>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myThemeSubscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->user->name }}</td>
                            <td>{{ $subscription->user->email }}</td>
                            <td>{{ $subscription->user->role }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



        <!-- my theme  Conversations Section -->
<div id="conversations-list" class="users-list hidden">
<h2>My theme Comments</h2>
    <table class="user-table">
        <thead>
            <tr>
                <th>Article Title</th>
                <th>Message</th>
                <th>Submitted By</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myThemeConversations as $conversation)

                <tr>
                    <td>{{ $conversation->article->title }}</td>
                    <td>{{ $conversation->message }}</td>
                    <td>{{ $conversation->user->name }}</td>
                    <td>{{ $conversation->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('conversations.destroy', $conversation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this conversation?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"  style="background-color:#dc3545;">Delete Comment</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

        <!-- Recommended Articles -->
        <div id="recommended-articles" class="recommended-articles hidden">
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
<div id="subscribed-themes" class="subscribed-themes hidden">
    <h2>Your Subscribed Themes</h2>
    <div class="theme-list">
        @foreach ($subscribedThemes as $theme)
            <div class="theme-card">
            <h3>{{ $theme->name }}</h3>
            <h5>{{ $theme->description }}</h5>
            <a href="{{ route('themes.show', $theme->id) }}" class="btn">View Articles</a>

                @auth
                    <!-- Subscription toggle form -->
                    <form action="{{ route('subscriptions.store') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                        <button type="submit" class="btn" style="background-color:#e5ad06;">
                            @php
                                $isSubscribed = \App\Models\Subscription::where('user_id', auth()->id())
                                    ->where('theme_id', $theme->id)
                                    ->exists();
                            @endphp
                            {{ $isSubscribed ? 'Unsubscribe' : 'Subscribe' }}
                        </button>
                    </form>
                @endauth
            </div>
        @endforeach
    </div>
</div>
<!-- my Conversations Section -->
<div id="my-conversations-list" class="users-list hidden">
    <h2>Comments</h2>
    <table class="user-table">
        <thead>
            <tr>
                <th>Article Title</th>
                <th>Message</th>
                <th>Submitted By</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myConversations as $conversation)
                    <tr>
                        <td>{{ $conversation->article->title }}</td>
                        <td>{{ $conversation->message }}</td>
                        <td>{{ $conversation->user->name }}</td>
                        <td>{{ $conversation->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('conversations.destroy', $conversation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this conversation?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color:#dc3545;">Delete Comment</button>
                            </form>
                        </td>
                    </tr>

            @endforeach
        </tbody>
    </table>
</div>





<!-- my Proposed articles Section -->
<div id="my-Proposed-articles-list" class="my-Proposed-articles-list hidden">
    <div class="create-buttons" style="margin-bottom: 20px; display: flex; gap: 10px;">
    </div>

    <h2>My Proposed Articles</h2>
    <p>If your suggestion is no longer here, it means it has been rejected.</p>
    <table class="article-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($userArticles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->author->name ?? 'Unknown' }}</td>
                        <td>
                            @if ($article->created_at)
                                {{ $article->created_at->format('Y-m-d') }}
                            @else
                                Not Published
                            @endif
                        </td>
                        <td>{{ ucfirst($article->status) }}</td> <!-- Added to display the status -->

                        <td>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn">View Article</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color:#dc3545;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    @endforeach
        </tbody>
    </table>
</div>
</div>



    </div>
</div>

<!-- JavaScript to handle content visibility -->
<script>
function showContent(sectionId) {
    // Hide all sections
    document.querySelectorAll('.main-content > div').forEach(function(section) {
        section.classList.add('hidden');
    });

    // Show the selected section
    document.getElementById(sectionId).classList.remove('hidden');

    // Remove 'active' class from all sidebar links
    document.querySelectorAll('.sidebar ul li a').forEach(function(link) {
        link.classList.remove('active');
    });

    // Add 'active' class to the clicked link
    document.querySelector(`.sidebar ul li a[href="#${sectionId}"]`).classList.add('active');
}
</script>
@endsection
