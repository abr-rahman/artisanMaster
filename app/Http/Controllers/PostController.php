<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny', Post::class);

        $posts = Post::with('user')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = new Post();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->category = $request->category;
        $data->image = $request->image;
        $data->user_id = Auth::id();
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $posts = Post::with('user')->get();
        return view('post.show', compact('posts'));
    }

    public function approve()
    {
        $posts = Post::with('user')->get();
        return view('post.approve', compact('posts'));
    }

    public function approveStatus($id)
    {
        $post = Post::find($id);
        if($post->status !=  2) {
            $post->status = 2;
        }
        $post->save();
        return back();
    }

    public function rejectStatus($id)
    {
        $post = Post::find($id);
        if ($post->status !=  1) {
            $post->status = 1;
        }
        $post->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->image = $request->image;
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
