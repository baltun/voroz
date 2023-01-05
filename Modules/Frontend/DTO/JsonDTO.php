<?php

namespace Modules\Frontend\DTO;


use Illuminate\Http\Request;

class JsonDTO
{
    public $id;
    public $json;

    public function fromJsonApiRequest(Request $request)
    {
        $this->json = json_encode($request['data']) ?: null;

        return $this;
    }
}
