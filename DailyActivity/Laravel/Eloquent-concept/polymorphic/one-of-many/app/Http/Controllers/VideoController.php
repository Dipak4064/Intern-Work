<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $video = Video::with('oldestComment')->findOrFail(1);
        // $video = Video::with('latestComment')->findOrFail(1);
        $video = Video::with('bestComment')->findOrFail(1);
        return $video;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $video = Video::findOrFail(1);
        $video->comments()->create([
            'detail' => 'Review video',
            'likes' => 200
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
