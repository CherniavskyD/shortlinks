<?php

namespace App\Services;

use App\Repositories\LinkRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class LinkService
{
    protected LinkRepository $linkRepository;

    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    public function createShortLink(string $originalUrl)
    {
        $validator = Validator::make(['original_url' => $originalUrl], [
            'original_url' => 'required|url'
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $shortCode = Str::random(6);
        
        return $this->linkRepository->createShortLink($originalUrl, $shortCode);
    }

    public function getOriginalUrl(string $shortCode): ?string
    {
        return $this->linkRepository->getOriginalUrl($shortCode);
    }
}
