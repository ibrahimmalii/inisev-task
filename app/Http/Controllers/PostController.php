<?php

namespace App\Http\Controllers;

use App\Contracts\PostServiceInterface;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function __construct(private readonly PostServiceInterface $postService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->postService->index();
    }

    public function store(PostRequest $request): PostResource
    {
        $postData = $request->validated();

        return $this->postService->store($postData);
    }

    public function show(Post $post): PostResource
    {
        return $this->postService->show($post);
    }

    public function destroy(Post $post): PostResource
    {
        return $this->postService->destroy($post);
    }
}
