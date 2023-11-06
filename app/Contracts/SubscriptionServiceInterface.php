<?php

namespace App\Contracts;

use App\Models\Subscription;

interface SubscriptionServiceInterface
{
    public function index();

    public function store(array $data);

    public function show(Subscription $post);

    public function destroy(Subscription $post);
}
