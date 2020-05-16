<?php

declare(strict_types=1);


namespace App\Event;


class User
{
    public $user;

    public function __construct(array $user)
    {
        $this->user = $user;
    }

}