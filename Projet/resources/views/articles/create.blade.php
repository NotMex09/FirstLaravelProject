@extends('layouts.app')

@section('content')
<style>body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fa;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    padding-top: 30px;
}

.form-propose {
    max-width: 600px;
    margin: 40px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 16px;
    margin-bottom: 8px;
    color: #333;
}

input, textarea, select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    box-sizing: border-box;
}

input:focus, textarea:focus, select:focus {
    border-color: #5b9bd5;
    outline: none;
    background-color: #eaf4fb;
}

.button-submit {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button-submit:hover {
    background-color: #45a049;
}

.button-submit:active {
    background-color: #3e8e41;
}
body.dark-theme .form-propose {

    background-color: #2d4983;

}
body.dark-theme  label {

    color: #fff;
}

</style>
<h1>Propose an Article</h1>

<form class="form-propose"action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="10" required></textarea>
    </div>
    <div class="form-group">
        <label for="theme_id">Theme</label>
        <select name="theme_id" id="theme_id" class="form-control" required>
            @foreach ($themes as $theme)
                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>
    <button class="button-submit" type="submit" class="btn">Submit Proposal</button>
</form>
@endsection
