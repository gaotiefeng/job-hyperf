<?php


namespace App\Services\Biz\Api;


use App\Services\Dao\CompanyDao;
use App\Services\Formatter\CompanyFormatter;
use App\Services\Services;
use Hyperf\Di\Annotation\Inject;

class CompanyBiz extends Services
{
    /**
     * @Inject()
     * @var CompanyDao
     */
    protected $Dao;

    public function list($offset,$limit)
    {
        [$count,$items] = $this->Dao->list($offset,$limit);

        $result['count'] = $count;
        foreach ($items as $item) {
            $result['items'][] = CompanyFormatter::instance()->list($item);
        }

        return $result;
    }
}