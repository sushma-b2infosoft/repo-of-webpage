<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function store(Request $request)
    {
        return response()->json(['message' => 'Post created']);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update(['title' => $request->title]);

        return response()->json(['message' => 'Post updated']);
    }
}

