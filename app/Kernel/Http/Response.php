<?php


namespace App\Kernel\Http;


use Hyperf\Contract\ContainerInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponse;

class Response
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->response = $container->get(ResponseInterface::class);
    }

    public function success($data = [])
    {
        return $this->response->json([
            'code' => 0,
            'data' => $data
        ]);
    }

    public function fail($code = 500, $data = [])
    {
        return $this->response->json([
           'code' => $code,
           'data' => $data,
        ]);
    }
}