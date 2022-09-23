@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-{{ session()->pull('alert_class') }} alert-dismissible fade show"
                            role="alert">
                            {{ session()->pull('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-header">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome {{ $user }}.
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('create_post') }}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="post title">Post title</label>
                                    <input required type="text" name="post_title" id="post_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="post body">Post Body</label>
                                    <textarea required class="form-control" name="post" id="post" cols="30" rows="5"></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">Previous Posts</div>
                    <div class="card-body">
                        <div class="blog-post">
                            @foreach ($posts as $post)
                                <h2 class="blog-post-title">{{ $post->post_title }}</h2>
                                <p class="blog-post-meta"><u>Posted at</u> :
                                    {{ date('l, F d Y', strtotime($post->created_at)) }} at
                                    {{ date('h:i a', strtotime($post->created_at)) }} by <a
                                        href="#">{{ $post->users->name }}</a></p>
                                <p><u>Post Body</u> : {{ substr($post->post, 0, 20) }}...<a
                                        href="{{ route('show_post', $post->id) }}">Read more</a></p>
                                @if (auth()->user()->id == $post->users->id)
                                    <a href="{{ route('edit_post', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('delete_post', $post->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                @endif
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
