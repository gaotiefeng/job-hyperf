<?php

declare(strict_types=1);


namespace App\Listener;


use App\Event\User;
use App\Kernel\Log\StdoutLogger;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Logger\LoggerFactory;

class UserRegisterListener implements ListenerInterface
{
    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(LoggerFactory $loggerFactory)
    {
        $this->logger = $loggerFactory->get('user');
    }

    public function listen(): array
    {
        return [
            User::class,
        ];
    }

    public function process(object $event)
    {
        $user = $event->user;

        $this->logger->info(json_encode($user));
    }
}