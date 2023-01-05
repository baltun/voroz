<?php

namespace Modules\Frontend\Repositories;

use Modules\Frontend\DTO\JsonDTO;
use Modules\Frontend\Entities\JsonModel;

class JsonRepository
{
    public function create(JsonDTO $jsonDTO): JsonDTO
    {

        $jsonCreatedModel = JsonModel::create([
            'json' => $jsonDTO->json,
        ]);
        $jsonDTO->id = $jsonCreatedModel->id;

        return $jsonDTO;
    }
}
