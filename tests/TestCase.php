<?php

namespace Moon\FakeMiddleware\tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Http\Kernel', 'Moon\FakeMiddleware\tests\Http\Kernel');
    }

    /**
     * Define environment setup.
     *
     * @param Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['router']->get('say-okay', function () {
            return 'okay';
        });

        $app['router']->get('say-hello', ['middleware' => 'auth', 'uses' => function () {
            return 'hello';
        }]);
    }
}
