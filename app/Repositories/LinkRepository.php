<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{
    public function createShortLink(string $originalUrl, string $shortCode): Link
    {
        return Link::create([
            'original_url' => $originalUrl,
            'short_code' => $shortCode
        ]);
    }

    public function getOriginalUrl(string $shortCode): ?string
    {
        $link = Link::where('short_code', $shortCode)->first();
        return $link ? $link->original_url : null;
    }
}
