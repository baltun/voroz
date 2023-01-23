<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\BaseRepository;

class CartRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'product_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cart::class;
    }
}
