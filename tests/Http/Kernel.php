<?php

namespace Moon\FakeMiddleware\tests\Http;

use Orchestra\Testbench\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        'Moon\FakeMiddleware\tests\Middleware\YouShallNotPass',

    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => 'Moon\FakeMiddleware\tests\Middleware\YouShallNotPass',
    ];
}
