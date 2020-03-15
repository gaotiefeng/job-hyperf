<?php


namespace App\Kernel\Log;


use Hyperf\Logger\LoggerFactory;
use Psr\Container\ContainerInterface;

class StdoutLogger
{
    public function __invoke(ContainerInterface $container)
    {
        return $container->get(LoggerFactory::class)->make();
    }
}