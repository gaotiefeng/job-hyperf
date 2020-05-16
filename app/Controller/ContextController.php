<?php

declare(strict_types=1);

namespace App\Controller;

use App\Event\User;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\Utils\Context;
use Psr\EventDispatcher\EventDispatcherInterface;

class ContextController extends Controller
{
    /**
     * @Inject()
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;
    public function index()
    {
        $mobile = '1590332'.rand(0000,9999);
        $password = '123456';

        Context::set($mobile,$password);

        $this->eventDispatcher->dispatch(new User(['mobile'=>$mobile,'password'=>$password]));

        return Context::get($mobile);
    }
}
