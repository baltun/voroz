<?php

namespace Modules\Backend\Http\Requests\API;

use Modules\Backend\Entities\Json;
use InfyOm\Generator\Request\APIRequest;

class UpdateJsonAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Json::$rules;

        return $rules;
    }
}
