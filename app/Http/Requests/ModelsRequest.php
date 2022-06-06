<?php

namespace App\Http\Requests;

use App\Models;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ModelsRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Models)->getTable())->ignore($this->route()->models->id ?? null)
            ],
            'xValue' => [
                'required'
            ],
            'yValue' => [
                'required'
            ],
            'zValue' => [
                'required'
            ],
            'prefabName' => [
                'required'
            ],
            'Type' => [
                'required'
            ],
            'photo' => [
                'mimes:jpeg,png'
            ]
         ];
    }
}
