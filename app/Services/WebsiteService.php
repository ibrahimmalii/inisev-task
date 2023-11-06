<?php

namespace App\Services;

use App\Contracts\WebsiteServiceInterface;
use App\Models\Website;
use Illuminate\Http\JsonResponse;

class WebsiteService implements WebsiteServiceInterface
{

    public function index(): JsonResponse
    {
        return response()->json(['websites' => Website::all()]);
    }

    public function store(array $data): JsonResponse
    {
        $website = Website::create($data);

        return response()->json(['website' => $website]);
    }



    public function destroy(\App\Models\Website $website): JsonResponse
    {
        $website->delete();

        return response()->json(['message' => 'Website deleted successfully']);
    }

    public function show(\App\Models\Website $website): Website
    {
        return $website;
    }
}
