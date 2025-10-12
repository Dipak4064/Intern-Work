<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $video = Video::find(1);
        $video->tags()->attach([1,2]);
        // $video->tags()->detach(2);

        // $video = Video::create([
        //     'title' => 'My first video',
        //     'url' => 'https://www.example.com/my-first-video',
        // ]);
        // $video->tags()->create([
        //     'tag_name' => 'Laravel',
        // ]);
        // $video->tags()->attach(2);
        return 'Video and Tag created successfully';
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
