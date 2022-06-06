<?php

namespace App\Http\Requests;

use App\Hall;
use App\Exhibition;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HallRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Exhibition)->getTable())->ignore($this->route()->exhibition->id ?? null)
            ],
            'SrNo' => [
                'required'
            ],
            'StartDate' => [
                'required'
            ],
            'StartTime' => [
                'required'
            ]
         ];
    }
}
