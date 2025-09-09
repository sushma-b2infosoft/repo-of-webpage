<?php

// namespace App\Http\Controllers;

// use App\Models\Post;
// use Illuminate\Http\Request;

// class PostController extends Controller
// {
//     public function index()
//     {
//         return response()->json(Post::all());
//     }

//     public function store(Request $request)
//     {
//         $post = Post::create($request->only(['title', 'content']));
//         return response()->json($post, 201);
//     }

//     public function show($id)
//     {
//         $post = Post::find($id);
//         if (!$post) {
//             return response()->json(['message' => 'Not Found'], 404);
//         }
//         return response()->json($post);
//     }

//     public function update(Request $request, $id)
//     {
//         $post = Post::find($id);
//         if (!$post) {
//             return response()->json(['message' => 'Not Found'], 404);
//         }
//         $post->update($request->only(['title', 'content']));
//         return response()->json($post);
//     }

//     public function destroy($id)
//     {
//         $post = Post::find($id);
//         if (!$post) {
//             return response()->json(['message' => 'Not Found'], 404);
//         }
//         $post->delete();
//         return response()->json(['message' => 'Deleted']);
//     }

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return (new PostResource($post))
            ->additional(['message' => 'Post created'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }

        $post->update($request->validated());

        return (new PostResource($post))
            ->additional(['message' => 'Post updated']);
    }
    // GET /api/posts  (use pagination to automatically include links/meta)
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return PostResource::collection($posts);
    }

    // POST /api/posts
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'title'   => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);

    //     $post = Post::create($data);

    //     return (new PostResource($post))
    //             ->additional(['message' => 'Post created'])
    //             ->response()
    //             ->setStatusCode(201);
    // }

    // GET /api/posts/{id}
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }

        return new PostResource($post);
    }

    // PUT /api/posts/{id}
    // public function update(Request $request, $id)
    // {
    //     $post = Post::find($id);
    //     if (!$post) {
    //         return response()->json(['success' => false, 'message' => 'Post not found'], 404);
    //     }

    //     $data = $request->validate([
    //         'title'   => 'sometimes|required|string|max:255',
    //         'content' => 'sometimes|required|string',
    //     ]);

    //     $post->update($data);

    //     return (new PostResource($post))
    //             ->additional(['message' => 'Post updated']);
    // }

    // DELETE /api/posts/{id}
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['success' => true, 'message' => 'Post deleted']);
    }
}
