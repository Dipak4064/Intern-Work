<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::with('latestComment')->findOrFail(1);
        // $post = Post::with('oldestComment')->findOrFail(1);
        return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::findOrFail(1);
        $post->comments()->create([
            'detail' => 'Reviewing comment',
            'likes' => 700
        ]);
        return "Comment added";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
