<?php

namespace App\Http\Requests;

use App\Company;
use App\PromotionalMaterial;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PromotionalMaterialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Title' => [
                'required'
            ],
            'Type' => [
                'required'
            ],
            'Company' => [
                'required', 'exists:'.(new Company)->getTable().',id'
            ]
         ];
    }
}
