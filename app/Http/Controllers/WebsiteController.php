<?php

namespace App\Http\Controllers;

use App\Contracts\WebsiteServiceInterface;
use App\Http\Requests\WebsiteRequest;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WebsiteController extends Controller
{
    public function __construct(private readonly WebsiteServiceInterface $websiteService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->websiteService->index();
    }

    public function store(WebsiteRequest $request): WebsiteResource
    {
        $websiteData = $request->validated();

        return $this->websiteService->store($websiteData);
    }

    public function show(Website $website): WebsiteResource
    {
        return $this->websiteService->show($website);
    }

    public function destroy(Website $website): WebsiteResource
    {
        return $this->websiteService->destroy($website);
    }
}
