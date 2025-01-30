@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Issue</h1>
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="publication_date">Publication Date</label>
            <input type="date" name="publication_date" id="publication_date" required>
        </div>
        <div>
            <label for="is_public">Is Public?</label>
            <input type="checkbox" name="is_public" id="is_public" value="1">
        </div>
        <button type="submit">Create Issue</button>
    </form>
</div>
@endsection
