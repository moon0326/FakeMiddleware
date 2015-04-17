<?php

namespace Moon\FakeMiddleware\Middleware;

use Closure;

class StubRouteMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
