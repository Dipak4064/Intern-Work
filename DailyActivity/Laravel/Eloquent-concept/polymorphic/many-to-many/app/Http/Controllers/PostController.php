<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::with('tags')->find(1);
        return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $post = Post::find(3);
        // $post->tags()->attach(2);

        $post = Post::create([
            'title' => 'My second post',
            'description' => 'This is my second post description'
        ]);

        // $post->tags()->create([
        //     'tag_name' => 'Laravel',
        // ]);


        $post->tags()->attach(2);
        return 'Post and Tag created successfully';
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
