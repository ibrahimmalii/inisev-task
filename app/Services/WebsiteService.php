<?php

namespace App\Services;

use App\Contracts\WebsiteServiceInterface;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WebsiteService implements WebsiteServiceInterface
{

    public function index(): AnonymousResourceCollection
    {
        return WebsiteResource::collection(Website::all());
    }

    public function store(array $data): WebsiteResource
    {
        $website = Website::create($data);

        return new WebsiteResource($website);
    }



    public function destroy(Website $website): JsonResponse
    {
        $website->delete();

        return response()->json(['message' => 'Website deleted successfully']);
    }

    public function show(Website $website): WebsiteResource
    {
        return new WebsiteResource($website);
    }
}
