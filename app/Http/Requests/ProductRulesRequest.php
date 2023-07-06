<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ProductRulesRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation = [
            'name' => 'required|min:5',
            'productBrand' => 'required',
            'description' => 'required|min:8',
            'voltage' => 'required',
        ];

        return $validation;
    }
}
