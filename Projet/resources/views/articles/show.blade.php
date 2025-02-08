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
        position: relative;
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
    /*Reply*/
    .reply {
    margin-left: 50px;
    background-color: #f0f0f0;
    border-left: 3px solid #ccc;
    padding-left: 10px;
}

.reply-button {
    margin-top: 0 !important;
    padding: 8px;
    background: none;
    border: none;
    cursor: pointer;
    color: #4a90e2;
    border-radius: 50%;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    width: 40px;
    height: 40px;
    justify-content: center;
}

.reply-button:hover {
    background-color: rgba(74, 144, 226, 0.1);
    transform: scale(1.1);
}
.reply-button svg {
    pointer-events: none;
    transition: transform 0.2s;
}
.btn-cancel {
    background-color: #ff4444 !important;
    margin-left: 10px;
}
.btn-cancel:hover {
    background-color: #cc0000 !important;
}
.delete-btn {
    background: none;
    border: none;
    cursor: pointer;
    color: #ff4444;
    margin-left: 10px;
    padding: 0;
}

.delete-form {
    position: absolute;
    top: 10px;
    right: 10px;
    margin-left: 0 !important;
}
.reply .delete-form {
    top: 5px;
    right: 5px;
}

/*Rating*/

/* .star-rating i:hover,
.star-rating i.active {
    color: gold !important;
} */
.star-rating i {
    transition: color 0.2s;
}

.star-rating i.hovered {
    color: gold !important;
}

body.dark-theme .nm {
    color: #ddd
}
.user-rating {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}


.user-info {
    width: 180px; /* Adjust to fit username + image */
    display: flex;
    align-items: center;
    gap: 10px;
    margin-left: 20px;
}

.user-info img {
    width: 35px; /* Adjust image size */
    height: 35px;
    border-radius: 50%; /* Makes it circular */
    object-fit: cover;
}
.stars {
    position: absolute;
    left: 250px; /* Adjust this value to fix star position */
}
h3{
    margin-top: 20px;
    margin-left: 20px;
    margin-bottom: 30px;
}
body.dark-theme .usn{color: #ccc;}
/*comment like/dislike*/
.message-footer {
    display: flex;
    align-items: center;
    gap: 8px; /* Adjust this value for spacing between elements */
    margin-top: 4px;
}

.message-footer button {
    border: none;
    outline: none;
    background: transparent;
    padding: 4px 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 0.875rem;
    transition: all 0.2s ease;
}

.message-footer button:hover {
    background: rgba(0, 0, 0, 0.05);
}

.like-btn.liked {
    color: #3b82f6; /* Blue color */
}

.dislike-btn.disliked {
    color: #ef4444; /* Red color */
}

.like-btn.liked i,
.dislike-btn.disliked i {
    color: inherit; /* Make icons inherit parent color */
}

.reply-button {
    margin-left: auto; /* Push reply button to the right */
    padding: 4px;
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
<a href="{{ route('articles.show', $article->id) }}" style="display: flex; justify-content: center;margin-bottom:40px">
    <img src="{{ asset('storage/' . $article->image) }}"
         alt="{{ $article->title }}"
         style="border-radius: 8px; width: 90%; height: 400px; object-fit: cover;">

</a>

<p class="article-content"
   style="width: 90%; margin: 0 auto; ">
    {{ $article->content }}
</p>
<!--Save button-->
<div class="save-article-container" style="width: 90%; margin: 20px auto; display: flex; justify-content: flex-start;">
    <button
        class="save-article-btn @if(auth()->check() && $article->savedByUsers->contains(auth()->id())) saved @endif"
        data-article-id="{{ $article->id }}"
        style="background: none; border: none; cursor: pointer; padding: 8px; transition: all 0.3s ease;"
    >
        <svg class="save-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17 3H7C5.9 3 5 3.9 5 5V21L12 18L19 21V5C19 3.9 18.1 3 17 3Z"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  fill="@if(auth()->check() && $article->savedByUsers->contains(auth()->id())) currentColor @else none @endif"/>
        </svg>
    </button>
</div>
@auth
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
document.querySelector('.save-article-btn').addEventListener('click', function(e) {
    e.preventDefault();
    const button = this;
    const articleId = button.dataset.articleId;

    axios.post(`/articles/${articleId}/save`)
        .then(response => {
            const icon = button.querySelector('.save-icon path');
            if(response.data.status === 'saved') {
                button.classList.add('saved');
                icon.setAttribute('fill', 'currentColor');
            } else {
                button.classList.remove('saved');
                icon.setAttribute('fill', 'none');
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        });
});
</script>
@endauth

<style>
.save-article-btn:hover {
    transform: scale(1.1);
}

.save-article-btn.saved .save-icon path {
    fill: currentColor;
}

.save-icon {
    color: #020202;
    transition: all 0.3s ease;
}
body.dark-theme .save-icon {
    color: #faf7f7;
    transition: all 0.3s ease;
}
.save-article-btn:hover .save-icon {
    color: #ff4757;
}
</style>
<div class="chat-section">
    <h2>Discussion</h2>
    <div class="chat-messages">
        @foreach ($article->conversations->where('parent_id', null) as $message)
            <div class="message" id="message-{{ $message->id }}">

                @auth
                @if(Auth::id() === $message->user_id || Auth::user()->is_admin)
                    <form class="delete-form" action="{{ route('conversations.destroy', $message) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">🗑️</button>
                    </form>
                @endif
                @endauth
                <img
                src="{{ $message->user->image ? asset('/' . $message->user->image) : asset('/uploads/profile_pictures/default-image.jpg')  }}"
                alt="{{ $message->user->name }}">

                <div class="message-content">
                    <strong>{{ $message->user->name }}:</strong>
                    <p>{{ $message->message }}</p>
                    <div class="message-footer">
                        <small>{{ $message->created_at->diffForHumans() }}</small>

                        @php
                            $userLike = $message->userLike(auth()->id());
                        @endphp

                        <!-- Like Button -->
                        <button class="like-btn {{ $userLike && $userLike->is_like ? 'liked' : '' }}" data-id="{{ $message->id }}">
                            <i class="fas fa-thumbs-up"></i>
                            <span id="like-count-{{ $message->id }}">{{ $message->likes->count() }}</span>
                        </button>

                        <!-- Dislike Button -->
                        <button class="dislike-btn {{ $userLike && $userLike->is_like === 0 ? 'disliked' : '' }}" data-id="{{ $message->id }}">
                            <i class="fas fa-thumbs-down"></i>
                            <span id="dislike-count-{{ $message->id }}">{{ $message->dislikes->count() }}</span>
                        </button>
                        <!--Reply button-->
                        <button class="reply-button" data-id="{{ $message->id }}" title="Reply">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M10,9V5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9Z" />
                            </svg>
                        </button>
                    </div>


                <!-- Replies -->
                @foreach ($message->replies as $reply)
                    <div class="reply message">

                        @auth
                        @if(Auth::id() === $reply->user_id || Auth::user()->is_admin)
                            <form class="delete-form" action="{{ route('conversations.destroy', $reply) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">🗑️</button>
                            </form>
                        @endif
                    @endauth
                        <img src="{{ $reply->user->image ? asset('/' . $reply->user->image) : asset('/uploads/profile_pictures/default-image.jpg') }}" alt="{{ $reply->user->name }}">
                        @php
    $userLike = $reply->userLike(auth()->id()); // $reply is a Conversation
@endphp

<div class="message-content">
    <strong>{{ $reply->user->name }}:</strong>
    <p>{{ $reply->message }}</p>
    <div class="message-footer">
        <small>{{ $reply->created_at->diffForHumans() }}</small>

        <!-- Like Button for Reply -->
        <button class="like-btn {{ $userLike && $userLike->is_like ? 'liked' : '' }}" data-id="{{ $reply->id }}">
            <i class="fas fa-thumbs-up"></i>
            <span id="like-count-{{ $reply->id }}">{{ $reply->likes->count() }}</span>
        </button>

        <!-- Dislike Button for Reply -->
        <button class="dislike-btn {{ $userLike && $userLike->is_like === 0 ? 'disliked' : '' }}" data-id="{{ $reply->id }}">
            <i class="fas fa-thumbs-down"></i>
            <span id="dislike-count-{{ $reply->id }}">{{ $reply->dislikes->count() }}</span>
        </button>
    </div>
</div>


                    </div>
                @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <form id="messageForm"action="{{ route('conversations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <input type="hidden" name="parent_id" id="parentId">
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
<!--Rating-->
@auth
<div class="rating-section">
    <h2>Rate this Article</h2>
    <div class="star-rating">
        @for ($i = 1; $i <= 5; $i++)
            <i class="star-icon fas fa-star"
               data-value="{{ $i }}"
               style="cursor: pointer; font-size: 24px; color: {{ auth()->user()->ratings->where('article_id', $article->id)->first()?->rating >= $i ? 'gold' : 'gray' }};">
            </i>
        @endfor
    </div>

    <form id="rating-form" action="{{ route('ratings.store') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <input type="hidden" name="rating" id="rating-value">
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll(".star-icon");
        stars.forEach(star => {
            star.addEventListener("click", function () {
                let value = this.getAttribute("data-value");
                document.getElementById("rating-value").value = value;
                document.getElementById("rating-form").submit();
            });
        });
    });
</script>
@endauth

<h3>User Ratings</h3>
@foreach ($article->ratings as $rating)
    <div class="user-rating">
        <span class="user-info">
            <img src="{{ $rating->user->image ? asset('/' . $rating->user->image) : asset('/uploads/profile_pictures/default-image.jpg') }}" alt="User Image">
            <strong class="usn">{{ $rating->user->name }}</strong> rated:
        </span>
        <span class="stars">
            @for ($i = 1; $i <= 5; $i++)
                <i class="fas fa-star" style="color: {{ $i <= $rating->rating ? 'gold' : 'gray' }};"></i>
            @endfor
        </span>
    </div>
@endforeach




<script>
    /*Reply*/
    document.querySelectorAll('.reply-button').forEach(button => {
    button.addEventListener('click', function() {
        const parentId = this.dataset.id;
        document.getElementById('parentId').value = parentId;

        // Visual feedback
        const textarea = document.querySelector('#messageForm textarea');
        textarea.placeholder = `Replying to ${this.closest('.message').querySelector('strong').textContent}`;

        // Scroll to the reply input field smoothly
        document.getElementById('messageForm').scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Remove existing cancel buttons if they exist
        const existingCancelButton = document.querySelector('.cancel-reply');
        if (existingCancelButton) {
            existingCancelButton.remove();
        }

        // Add cancel button
        const cancelButton = document.createElement('button');
        cancelButton.textContent = 'Cancel';
        cancelButton.className = 'btn cancel-reply';
        cancelButton.onclick = () => {
            document.getElementById('parentId').value = '';
            textarea.placeholder = 'Your message...';
            cancelButton.remove();
        };

        document.querySelector('#messageForm').appendChild(cancelButton);
    });
});

/*Comment Like/Dislike*/
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".like-btn, .dislike-btn").forEach((button) => {
        button.addEventListener("click", function () {
            const conversationId = this.dataset.id;
            const isLike = this.classList.contains("like-btn");
            const parentFooter = this.closest(".message-footer");

            fetch("/comments/like-dislike", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    conversation_id: conversationId,
                    is_like: isLike ? 1 : 0,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // Update counts
                    document.getElementById(`like-count-${conversationId}`).innerText = data.likes;
                    document.getElementById(`dislike-count-${conversationId}`).innerText = data.dislikes;

                    // Update active states
                    const likeBtn = parentFooter.querySelector(".like-btn");
                    const dislikeBtn = parentFooter.querySelector(".dislike-btn");

                    if (data.user_like === "like") {
                        likeBtn.classList.add("liked");
                        dislikeBtn.classList.remove("disliked");
                    } else if (data.user_like === "dislike") {
                        dislikeBtn.classList.add("disliked");
                        likeBtn.classList.remove("liked");
                    } else {
                        likeBtn.classList.remove("liked");
                        dislikeBtn.classList.remove("disliked");
                    }
                });
        });
    });
});
//rating
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star-rating .star-icon");

    stars.forEach((star, index) => {
        star.addEventListener("mouseover", function () {
            highlightStars(index);
        });

        star.addEventListener("mouseout", function () {
            resetStars();
        });

        star.addEventListener("click", function () {
            document.getElementById("rating-value").value = star.getAttribute("data-value");
            document.getElementById("rating-form").submit();
        });
    });

    function highlightStars(index) {
        for (let i = 0; i <= index; i++) {
            stars[i].classList.add("hovered");
        }
    }

    function resetStars() {
        stars.forEach(star => star.classList.remove("hovered"));
    }
});

    </script>
@endsection
