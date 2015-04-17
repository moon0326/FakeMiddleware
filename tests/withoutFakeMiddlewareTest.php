<?php

namespace Moon\FakeMiddleware\tests;

class withoutFakeMiddlewareTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturn403HTTPCodeForMiddleware()
    {
        $response = $this->call('GET', 'say-okay');
        $this->assertResponseStatus(403);
    }

    /**
     * @test
     */
    public function itShouldReturn403HTTPCodeForRouteMiddleware()
    {
        $response = $this->call('GET', 'say-hello');
        $this->assertResponseStatus(403);
    }
}
