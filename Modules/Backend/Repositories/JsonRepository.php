<?php

namespace Modules\Backend\Repositories;

use Modules\Backend\Entities\Json;
use App\Repositories\BaseRepository;

class JsonRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'json'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Json::class;
    }
}
