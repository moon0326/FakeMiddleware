<?php

namespace Moon\FakeMiddleware\tests\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

class YouShallNotPass implements Middleware
{
    private $response;

    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    public function respondUnauthorized()
    {
        return $this->response->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param callable                 $next
     */
    public function handle($request, Closure $next)
    {
        return $this->respondUnauthorized();
    }
}
