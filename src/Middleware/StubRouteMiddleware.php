<?php

namespace Moon\FakeMiddleware\Middleware;

use Clousre;

class StubRouteMiddleware
{
    public function handle($request, Clousre $next)
    {
        return $next($request);
    }
}
