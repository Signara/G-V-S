<?php

namespace App\Http\Requests;

use App\Company;
use App\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Name' => [
                'required'
            ],
            'Description' => [
                'required', 'min:5'
            ],
            'Company' => [
                'required', 'exists:'.(new Company)->getTable().',id'
            ],
            'photo' => [
                'mimes:jpeg,png'
            ]
         ];
    }
}
