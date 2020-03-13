<?php

declare(strict_types=1);

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
