<?php

declare(strict_types=1);


namespace App\Services\Redis;


use Gao\redisApplication\stringApplication;
use Hyperf\Redis\Redis;

class RedisStr extends stringApplication
{
    public function redis()
    {
        return di()->get(Redis::class);
    }
}