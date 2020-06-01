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

namespace App\Controller;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'job');
        $method = $this->request->getMethod();
        $url = $this->getVideoCover();
        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'url' => $url,
        ];
    }
    public function getVideoCover($file='',$time=1,$dir='',$size='') {
        $time = $time ? $time : '1'; 		//默认截取第一秒第一帧
        $size = $size ? $size : '348*470';
        $fileName = rand(1000,9999).time();
        $file = 'https://ugcbsy.qq.com/uwMROfz2r5zEIaQXGdGnC2dfJ7xlHUZLN7WLSNBHzUj-9W46/w0972hli3n1.p712.1.mp4?sdtfrom=v1104&guid=9998271ded2dd019282e57332d04ea3f&vkey=8AF3F340071F6E44E63EBEF94199E37A2D9E98AB58219F5E440D70EF8E01FF8FBCCAE2D79B337296AD8CDB54A9C1B9D34D925C0327FF74C47DA64938701A4363D622746D26DAD1C11BD38B88F1B02F6D00FED677150AF0FE1F13183EFF0F9ED7EE905C60850D7C5E2E66BD5700CE9473C52DF5949703F68472E874EC8B3483C3';
        $dir = BASE_PATH . '/public/video/';
        $str = "ffmpeg -i ".$file." -y -f mjpeg -ss ".$time." -t 0.001 -s $size ".$dir.$fileName.'.jpg';
        exec($str,$out,$status);
        return $dir.$fileName.'.jpg';
    }
}
