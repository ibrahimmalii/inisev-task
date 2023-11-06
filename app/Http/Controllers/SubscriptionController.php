<?php

namespace App\Http\Controllers;

use App\Contracts\SubscriptionServiceInterface;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionController extends Controller
{
    public function __construct(private readonly SubscriptionServiceInterface $subscriptionService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->subscriptionService->index();
    }

    public function store(SubscriptionRequest $request): SubscriptionResource
    {
        $subscriptionData = $request->validated();

        return $this->subscriptionService->store($subscriptionData);
    }

    public function show(Subscription $subscription): SubscriptionResource
    {
        return $this->subscriptionService->show($subscription);
    }

    public function destroy(Subscription $subscription): JsonResponse
    {
        return $this->subscriptionService->destroy($subscription);
    }
}
