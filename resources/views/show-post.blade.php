@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Post</div>
                    <div class="card-body">
                        <div class="form-group">
                            <h2 class="blog-post-title">{{ $post->post_title }}</h2>
                            <p class="blog-post-meta">{{ date('l, F d Y', strtotime($post->created_at)) }} at {{date('h:i a', strtotime($post->created_at))}} by <a
                                    href="#">{{ $post->users->name }}</a></p>
                            <p>{{ $post->post }}</p>
                            @if (auth()->user()->id == $post->user_id)
                                <a href="{{ route('edit_post', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('delete_post', $post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                            <a href="{{ route('home') }}" class="btn btn-sm btn-info">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
