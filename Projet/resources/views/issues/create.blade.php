@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Issue</h1>
    <form action="{{ route('issues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="publication_date" class="form-label">Publication Date *</label>
                        <input type="date" name="publication_date" id="publication_date" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" 
                                   name="is_public" 
                                   id="is_public" 
                                   value="1"
                                   {{ old('is_public') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_public">Public Issue</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="image" class="form-label">Cover Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Selection Section -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Select Articles (Choose up to 5)</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    @forelse($articles as $article)
                        <div class="col-md-4">
                            <div class="article-card card h-100 shadow-sm">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               name="articles[]" 
                                               value="{{ $article->id }}" 
                                               id="article-{{ $article->id }}">
                                        <label class="form-check-label w-100" for="article-{{ $article->id }}">
                                            <h6 class="card-title mb-1">{{ $article->title }}</h6>
                                            <p class="card-text text-muted small mb-0">
                                                {{ Str::limit(strip_tags($article->content), 80) }}
                                            </p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning">No published articles available.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-lg btn-primary">Create Issue</button>
        </div>
    </form>
</div>

<style>
    .article-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: 2px solid transparent;
    }
    .article-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .form-check-input:checked + .article-card {
        border-color: #0d6efd;
        background-color: #f8f9fa;
    }
    .form-check-label {
        cursor: pointer;
    }
</style>
@endsection