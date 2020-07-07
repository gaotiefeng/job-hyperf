<?php


namespace HyperfTest\Api;


use HyperfTest\HttpTestCase;

class ApiCompanyTest extends HttpTestCase
{
    public function testApiCompanyIndex()
    {
        $res = $this->client->get('/company/index',[
           'offset' => 0,
           'limit' => 10,
        ]);
var_dump($res);
        $this->assertSame(0,$res['code']);
    }
}