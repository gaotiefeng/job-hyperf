<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AbstractController;
use App\Services\Biz\Api\CompanyBiz;
use Hyperf\Di\Annotation\Inject;

class CompanyController extends AbstractController
{
    /**
     * @Inject()
     * @var CompanyBiz
     */
    protected $Biz;

    public function index()
    {
        $offset = $this->request->input('offset',0);
        $limit = $this->request->input('limit',10);

        $result = $this->Biz->list($offset,$limit);

        return $this->response->success($result);
    }
}
