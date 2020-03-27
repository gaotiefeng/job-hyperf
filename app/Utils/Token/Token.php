<?php


namespace App\Utils\Token;


use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Kernel\Log\StdoutLogger;
use Firebase\JWT\JWT;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Utils\Traits\StaticInstance;
use Psr\Container\ContainerInterface;

class Token
{
    use StaticInstance;

    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;


    protected $key = 'Auth-Token';

    public $userId;

    public function __construct()
    {
        $this->logger = di()->get(StdoutLogger::class);
    }

    public function init(int $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function reload(string $token)
    {
        $this->userId = $this->verify($token);

        return $this;
    }

    public function build()
    {
        if ($this->check()) {
            return $this;
        }

        throw new BusinessException(ErrorCode::NOT_TOKEN);
    }

    public function check(): bool
    {
        return $this->userId > 0;
    }

    public function getToken():string
    {
        $time = time();
        $params = [
            'iss' => 'job',
            'aud' => 'user',
            'iat' => $time,
            'nbf' => $time,
            'exp' => $time + 7200,
            'data' => [
                'user_id' => $this->build()->getUserId(),
            ],
        ];

        return JWT::encode($params, $this->key);
    }

    public function verify(string $token):int
    {
        try {
            $decoded = JWT::decode($token, $this->key, ['HS256']);
            return $decoded->data->user_id;
        } catch (\Throwable $exception) {
            $this->logger->warning('Decode token failed. Message = ' . $exception->getMessage());
        }

        return 0;
    }
}