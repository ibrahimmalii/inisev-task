<?php

namespace App\Contracts;

use App\Models\Website;

interface WebsiteServiceInterface
{
    public function index();

    public function store(array $data);

    public function show(Website $website);

    public function destroy(Website $website);
}
