@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update_post', $post->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="post title">Post title</label>

                                <input type="text" name="post_title" id="post_title" class="form-control" value="{{$post->post_title}}">
                            </div>
                            <div class="form-group">
                                <label for="post body">Post Body</label>

                                <textarea required class="form-control" name="post" id="post" cols="30" rows="5">{{ $post->post }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Update Post</button>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-info">Go back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
