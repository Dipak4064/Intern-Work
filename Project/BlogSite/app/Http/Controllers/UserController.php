<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function landing()
    {
        $posts = Post::all();
        return view('landing', compact('posts'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id(); // take from logged-in user

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'img_path' => $validated['image'] ?? null,
            'user_id' => $validated['user_id'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }


    public function yourposts()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('data', compact('posts'));
    }

    public function showpost($id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('isloggedin');
        if ($post->user_id !== Auth::id() && !Gate::allows('isadmin')) {
            abort(403, 'Unauthorized action.');
        }
        return view('singlepost', compact('post'));
    }


    public function edit(Request $request, $id)
    {
        // Find the post
        $post = Post::findOrFail($id);

        // Authorization: only owner or admin
        Gate::authorize('isloggedin');
        if ($post->user_id !== Auth::id() && !Gate::allows('isadmin')) {
            abort(403, 'Unauthorized action.');
        }

        // Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle image replacement
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->img_path && Storage::disk('public')->exists($post->img_path)) {
                Storage::disk('public')->delete($post->img_path);
            }
            // Store new image
            $post->img_path = $request->file('image')->store('images', 'public');
        }

        // Update post fields
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    public function adminIndex()
    {
        Gate::authorize('isadmin');
        $posts = Post::all();
        return view('data', compact('posts'));
    }

    public function search(Request $request){
        $query = $request->input('search');
        $posts = Post::where('title', 'like', "%{$query}%")
                     ->orWhere('content', 'like', "%{$query}%")
                     ->get();
        return view('searchresult', compact('posts'));
    }

}
