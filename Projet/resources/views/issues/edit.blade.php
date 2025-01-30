@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Issue</h1>
    <form action="{{ route('issues.update', $issue) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $issue->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $issue->description }}</textarea>
        </div>
        <div>
            <label for="publication_date">Publication Date</label>
            <input type="date" name="publication_date" id="publication_date" value="{{ $issue->publication_date->format('Y-m-d') }}" required>
        </div>
        <div>
            <label for="is_public">Is Public?</label>
            <input type="checkbox" name="is_public" id="is_public" value="1" {{ $issue->is_public ? 'checked' : '' }}>
        </div>
        <button type="submit">Update Issue</button>
    </form>
</div>
@endsection
