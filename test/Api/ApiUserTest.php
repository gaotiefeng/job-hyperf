<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace HyperfTest\Api;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class ApiUserTest extends HttpTestCase
{
    public function testApiUserIndex()
    {
        $res = $this->client->get('/user/index', [
        ]);

        return $this->assertSame(0, $res['code']);
    }

    public function testApiUserLogin()
    {
        $res = $this->client->post('/user/login',[
            'mobile' => '15904435047',
            'password' => '123456',
        ]);

        return $this->assertSame(0, $res['code']);
    }
}
