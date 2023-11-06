<?php

namespace App\Services;

use App\Contracts\PostServiceInterface;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostService implements PostServiceInterface
{
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    public function store(array $data): PostResource
    {
        $post = Post::create($data);

//        event(new PostPublished($post));

        return new PostResource($post);
    }



    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }
}
