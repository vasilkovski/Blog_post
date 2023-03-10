@extends('layouts.app')

@section('content')

@if(session('addedPost'))
<p class="alert alert-success mt-3 w-100"> {{ session('addedPost')}}</p>

@endif
<div class="row m-x5 px-5 mt-2">
    <div class="col-md-6 mr-auto">
        <button type="button" class="btn btn-outline-primary"><a href="/create-blog">Create Blog</a></button>
    </div>
    <div class="col-md-6">
        <form action="{{ route('search') }}" method="POST" enctype=multipart/form-data>
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search Post" value="">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </form>
    </div>
</div>
</div>

<div class="row mx-5 mt-2 p-5">
    <div class="col-md-12 text-center ">
        <h2>Blogs</h2>
    </div>
</div>
<div class="row mx-5 mt-2 p-5">
    <div class="col-md-12 text-center ">
        @if(count($posts) === 0 )
        <h1 class="text-center">No posts yet</h1>
        @else
        @foreach($posts as $info)
        <div class="card mb-3 w-100">
            <div class="row no-gutters">
                <div class="col-md-3 h-25">
                    <img src="{{ asset('uploads/posts/' . $info->image ) }} " alt="..." class="w-100 h-25">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <a href="{{ route('post.show', $info) }}">
                            <h5 class="card-title text-capitalize">{{ $info->title }}</h5>
                        </a>
                        <p class="card-text text-capitalize">{{ $info->content }}</p>
                        <small class="card-text text-capitalize">{{ $info->users->name }}</small>
                    </div>

                </div>

                <div class="col-3 p-3">

                    @if(Auth::check() && Auth::user()->id === $info->user_id || Auth::user()->hasRole() === 'Admin' )
                    <div class="d-flex justify-content-around mt-2">
                        <a href="{{ route('post.edit', $info)}}" class="text-dark"><button class="btn-warning"><i class="fa fa-edit fa-2x"></button></i></a>
                        <form action=" {{ route('post.destroy', $info) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger"><i class="fa fa-trash fa-2x"></i></button>
                        </form>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
        @endif
      
    </div>
</div>
@endsection