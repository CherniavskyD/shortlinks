<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LinkService;
use Exception;

class LinkController extends Controller
{
    protected LinkService $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $shortUrl = $this->linkService->createShortLink($request->input('original_url'));
            return response()->json(['short_url' => $shortUrl]);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function redirect(string $shortCode)
    {
        $originalUrl = $this->linkService->getOriginalUrl($shortCode);

        if ($originalUrl) {
            return redirect($originalUrl);
        } else {
            abort(404);
        }
    }
}
