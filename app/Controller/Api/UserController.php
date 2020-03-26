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

use App\Constants\ErrorCode;
use App\Controller\AbstractController;
use App\Exception\BusinessException;
use App\Services\Biz\Api\UserBiz;
use Hyperf\Di\Annotation\Inject;

class UserController extends AbstractController
{
    /**
     * @Inject()
     * @var UserBiz
     */
    protected $Biz;

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

        $mobile = $this->request->input('mobile');

        $password = $this->request->input('password');

        if (empty($mobile)) {
            throw  new BusinessException(ErrorCode::MOBILE_NULL);
        }

        if (empty($password)) {
            throw new BusinessException(ErrorCode::PASSWORD_NO_EXIST);
        }

        $result = $this->Biz->login($mobile,$password);

        return $this->response->success($result);
    }
}
