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

namespace App\Controller\Api;

use App\Controller\AbstractController;

class UserController extends AbstractController
{
    public function index()
    {
        $data = [
            'user' => 'user',
            'password' => '123456',
        ];
        return $this->response->success($data);
    }

    public function login()
    {
        echo 'lgoin';
    }
}
