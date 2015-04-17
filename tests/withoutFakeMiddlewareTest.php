<?php

namespace Moon\FakeMiddleware\tests;

class withoutFakeMiddlewareTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldNotSuccess()
    {
        $response = $this->call('GET', 'say-okay');
        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function itShouldNotByPassRouteMiddleware()
    {
        $response = $this->call('GET', 'say-hello');
        $this->assertNull($response);
    }
}
