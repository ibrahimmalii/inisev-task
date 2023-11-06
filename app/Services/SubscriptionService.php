<?php

namespace App\Services;

use App\Contracts\SubscriptionServiceInterface;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionService implements SubscriptionServiceInterface
{

    public function index(): AnonymousResourceCollection
    {
        return SubscriptionResource::collection(Subscription::all());
    }

    public function store(array $data): SubscriptionResource
    {
        $subscription = Subscription::create($data);

        return new SubscriptionResource($subscription);
    }



    public function destroy(Subscription $subscription): JsonResponse
    {
        $subscription->delete();

        return response()->json(['message' => 'Subscription deleted successfully']);
    }

    public function show(Subscription $subscription): SubscriptionResource
    {
        return new SubscriptionResource($subscription);
    }
}
