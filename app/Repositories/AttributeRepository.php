<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Repositories\BaseRepository;

class AttributeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Attribute::class;
    }
}
