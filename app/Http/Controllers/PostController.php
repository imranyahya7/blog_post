<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postServicee)
    {
        $this->middleware('auth');
        $this->postService = $postServicee;
    }

    public function index()
    {
        $user =  auth()->user()->name;
        $posts = $this->postService->get();
        return view('home',compact('user','posts'));
    }
    public function create()
    {
        //
    }

    public function store(CreatePostRequest $request)
    {
        $this->postService->create($request->all());
        return redirect()->back()->with(['message' =>'Successfully added new post','alert_class'=>'success']);
    }

    public function show(Post $post)
    {
        return view('show-post',compact('post'));
    }

    public function edit(Post $post)
    {
        return view('edit-post',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->postService->update($post->id,$request->all());
        return redirect('/home')->with(['message' =>'Successfully updated post number '.$post->id,'alert_class'=>'success']);
    }

    public function destroy(Post $post)
    {
        $this->postService->delete($post->id);
        return redirect('/home')->with(['message' =>'post number '.$post->id. ' Deleted','alert_class'=>'danger']);
    }
}
