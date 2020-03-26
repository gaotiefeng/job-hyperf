<?php


namespace App\Services\Biz\Api;


use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\User;
use App\Services\Dao\UserDao;
use App\Services\Services;
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

        return $user;
    }
}