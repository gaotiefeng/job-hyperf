<?php

declare(strict_types=1);


namespace HyperfTest;


class ContextTest extends HttpTestCase
{
    public function testContextIndex()
    {
        $res = $this->client->get('/context/index');

        $this->assertSame(0,0);
    }
}