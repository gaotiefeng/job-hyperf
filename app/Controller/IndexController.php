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
        $file = BASE_PATH . '/public/1212.mp4';
        $dir = BASE_PATH . '/public/video/';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        } 

        $str = "ffmpeg -i ".$file." -y -f mjpeg -ss ".$time." -t 0.001 -s $size ".$dir.$fileName.'.jpg';
        exec($str,$out,$status);
        return $dir.$fileName.'.jpg';
    }
}
