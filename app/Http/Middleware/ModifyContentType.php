<?php

namespace App\Http\Middleware;

use Closure;

class ModifyContentType
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Установить Content-Type в application/json
        $response->header('Content-Type', 'application/json');

        return $response;
    }
}

