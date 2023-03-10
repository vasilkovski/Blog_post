@extends('layouts.app')


@section('content')
<div class="container">
<div class="row">
<div class="col-md-4 offset-5">
    <form action="{{ route('post.update', $post) }}" method="POST" enctype= multipart/form-data>
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <p><input type="text" id="title" name="title" value="{{ $post->title}}" > </p>
        @error('title')
        <span >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror

        <label for="image">Image:</label>
        <p><input id="image" type="file" name="image" value="{{ $post->image}}" ></p>
        @error('image')
        <span >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror

        <label for="desc"> Content:</label>
        <p><input type="text" id="content" name="content" value="{{ $post->content}}" ></p>
        @error('content')
        <span >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror

    
        <button type="submit" class="btn btn-primary">Update post</button>
    </form>
</div>
</div></div>
@endsection