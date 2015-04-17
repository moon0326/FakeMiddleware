<?php

namespace Moon\FakeMiddleware;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Console\Kernel;

class FakeMiddleware
{
    public function __construct(Application $app, $removeMiddlewares, $stubRouteMiddlewares)
    {
        $app->resolving(function (Kernel $kernel, $app) use ($removeMiddlewares, $stubRouteMiddlewares) {

            // remove global middleware
            $reflected = new ReflectionClass($kernel);
            $property = $reflected->getProperty('middleware');
            $property->setAccessible(true);

            $currentMiddlewares = $property->getValue($kernel);

            foreach ($currentMiddlewares as $key => $currentMiddleware) {
                if (in_array($currentMiddleware, $removeMiddlewares)) {
                    unset($currentMiddleware[$key]);
                }
            }

            $property->setValue($kernel, $currentMiddlewares);

            // stub route middleware
            $routeProperty = $reflected->getProperty('routeMiddleware');
            $routeProperty->setAccessible(true);

            $routeMiddlewares = $routeProperty->getValue($kernel);

            foreach ($stubRouteMiddlewares as $stubRouteMiddleware) {
                if (array_key_exists($stubRouteMiddleware, $routeMiddlewares)) {
                    $routeMiddlewares[$stubRouteMiddleware] = 'Moon\FakeMiddleware\Middleware\StubRouteMiddleware';
                }
            }

            $routeProperty->setValue($kernel, $routeMiddlewares);
        });
    }
}
