@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="my-5 text-center">{{ $selected->title  }}</h2>


    <div class="card w-50 m-auto">
        <img src="{{ asset('uploads/posts/' . $selected->image ) }}" class="card-img-top w-100 h-25" alt="...">
        <div class="card-body">
            <small>
             <span>Created by:</span>   <span class="card-text pl-3 text-capitalize font-italic"> {{ $selected->users->name }}</span></small>
            <h2 class="card-title p-1 text-capitalize">{{ $selected->title }}</h2>
            <p class="card-text text-capitalize">{{ $selected->content }}</p>

        </div>
        <form class="px-2" action="{{ route('post.comment', $selected) }}" method="POST">
            @csrf
            <input type="text" name="comment" placeholder="Comment...">
            <button type="submit" class="btn btn-primary">Add comment</button>
        </form>
        @if(count($selected->comments) != 0 )
        <h3 class="my-2 px-2">Comments:</h3>
        @foreach($selected->comments as $comment)
        <div class="border-secondary border-bottom pb-2 w-100 mt-2">
            <div class="px-2">
                <div class="row">
                    <div class="col-md-12"> <span class=" text-capitalize font-weight-bold "> {{ $comment->comment}}</span></div>
                    <div class="col-md-6"> <span class="font-italic  text-muted text-capitalize"> <small>Comment by: </small> {{ $comment->users->name}} </span>
                    </div>
                    <div class="col-md-6"> <small class="text-muted">Added on: {{ $comment->created_at}}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection