<?php


namespace App\Services\Biz\Api;


use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\User;
use App\Services\Dao\UserDao;
use App\Services\Services;
use App\Utils\Token\UserAuth;
use Hyperf\Di\Annotation\Inject;

class UserBiz extends Services
{
    /**
     * @Inject()
     * @var UserDao
     */
    protected $Dao;

    public function login($mobile, $password){

        /** @var User $user */
        $user = $this->Dao->first($mobile,true);

        if ($password != $user->password) {

            throw new BusinessException(ErrorCode::PASSWORD_ERROR);
        }

        $token = UserAuth::instance()->init($user->id)->getToken();

        $result['token'] = $token;
        $result['mobile'] = $user->mobile;
        $result['user_name'] = $user->user_name;

        return $result;
    }
}