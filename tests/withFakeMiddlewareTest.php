<?php

namespace Moon\FakeMiddleware\tests;

use Moon\FakeMiddleware\FakeMiddleware;

class withFakeMiddlewareTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        new FakeMiddleware($this->app, [
            'Moon\FakeMiddleware\tests\Middleware\YouShallNotPass'
        ], ['auth']);
    }

    /**
     * @test
     */
    public function itShouldRemoveGlobalMiddleware()
    {
        $response = $this->call('GET', 'say-okay');
        $this->assertEquals('okay', $response->getContent());
    }

    /**
     * @test
     */
    public function itShouldByPassRouteMiddleware()
    {
        $response = $this->call('GET', 'say-hello');
        $this->assertEquals('hello', $response->getContent());
    }
}
