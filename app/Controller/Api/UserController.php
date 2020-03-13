<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AbstractController;

class UserController extends AbstractController
{
    public function index()
    {
        return $this->response->raw('Hello Hyperf!');
    }
}
