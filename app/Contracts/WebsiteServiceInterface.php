<?php

namespace App\Contracts;

interface WebsiteServiceInterface
{
    public function index();

    public function store(array $data);

    public function show(\App\Models\Website $website);

    public function destroy(\App\Models\Website $website);
}
