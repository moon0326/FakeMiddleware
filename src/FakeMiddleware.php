<?php

namespace Moon\FakeMiddleware;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use ReflectionClass;

class FakeMiddleware
{
    public function __construct(Application $app, $removeMiddlewares = [], $stubRouteMiddlewares = [])
    {
        $app->resolving(function (Kernel $kernel, $app) use ($removeMiddlewares, $stubRouteMiddlewares) {

            // remove global middleware
            $reflected = new ReflectionClass($kernel);
            $property = $reflected->getProperty('middleware');
            $property->setAccessible(true);

            $currentMiddlewares = $property->getValue($kernel);

            foreach ($currentMiddlewares as $key => $currentMiddleware) {
                if (in_array($currentMiddleware, $removeMiddlewares)) {
                    unset($currentMiddlewares[$key]);
                }
            }

            $property->setValue($kernel, $currentMiddlewares);

            // route
            $routerProperty = $reflected->getProperty('router');
            $routerProperty->setAccessible(true);
            $router = $routerProperty->getValue($kernel);
            foreach ($stubRouteMiddlewares as $stubRouteMiddleware) {
                $router->middleware($stubRouteMiddleware, 'Moon\FakeMiddleware\Middleware\StubRouteMiddleware');
            }
        });
    }
}
