<?php


namespace App\Services\Dao;


use App\Kernel\Model\ModelHelper;
use App\Model\Company;
use App\Services\Services;

class CompanyDao extends Services
{
    public function list(int $offset, int $limit)
    {
        $query = Company::query();

        return ModelHelper::pagination($query,$offset,$limit);
    }
}