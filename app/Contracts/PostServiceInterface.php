<?php

namespace App\Contracts;

interface PostServiceInterface
{
    public function index();

    public function store(array $data);

    public function show(\App\Models\Post $post);

    public function destroy(\App\Models\Post $post);
}
