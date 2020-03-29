<?php


namespace App\Services\Formatter;


use App\Model\Company;

class CompanyFormatter extends Formatter
{
    public function list(Company $model)
    {
        return [
          'id' => $model->id,
          'name' => $model->name,
        ];
    }
}