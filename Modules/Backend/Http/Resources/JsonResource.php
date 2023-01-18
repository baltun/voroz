<?php

namespace Modules\Backend\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as LaravelJsonResource;

class JsonResource extends LaravelJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'json' => $this->json,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
