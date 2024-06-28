<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Validated;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(6);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title' => ['required', 'max:100'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:2000', 'mimes:png,jpg,jpeg,webp']
        ]);

        // Store Image if exists 
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts_images', $request->image);
        };

        // Create a Post
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        // Redirect
        return redirect()->route('dashboard.posts')->with('success', 'Your New Post Successfuly Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Authorizetation
        Gate::authorize('modify', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate
        $postField = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:2000', 'mimes:png,jpg,jpeg,webp']
        ]);

        // Check Image If exist
        // $path = $post->image ? $post->image : null;
        $path = $post->image ?? null; // Alternative
        if ($request->hasFile('image')) {
            // Delete Image on storage
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            // save new image
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }

        // Update the post
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        // Redirect to Dashboard
        return redirect()->route('dashboard')->with('success', 'Your Post was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Authorizetation
        Gate::authorize('modify', $post);

        // Delete Post Image If Exists
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete Post
        $post->delete();

        //redirect
        return back()->with('delete', 'Your Post Successfuly Deleted !');
    }
}
