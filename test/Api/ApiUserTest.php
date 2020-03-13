<?php


namespace HyperfTest\Api;


use HyperfTest\HttpTestCase;

class ApiUserTest extends HttpTestCase
{
    public function testApiUserIndex()
    {
        $res = $this->client->get('/user/index',[

        ]);

        return $this->assertSame(0,$res['code']);
    }
}