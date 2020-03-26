<?php


namespace App\Services\Dao;


use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\User;
use App\Services\Services;

class UserDao extends Services
{
    public function first(string $mobile,$throw = false)
    {
        $model = User::query()->where('mobile',$mobile)->first();

        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::MOBILE_NO_EXIST);
        }

        return $model;
    }
}