<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

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
            'imageProduct' => 'required_if:imageProductURL,==,null|nullable',
            'name' => 'required|min:5',
            'productBrand' => 'required',
            'description' => 'required|min:8',
            'voltage' => 'required',
            'imageProductURL' => 'nullable'
        ];
    
        return $validation;
    }
}