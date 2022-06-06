<?php

namespace App\Http\Requests;

use App\ParticipantType;
use App\Package;
use App\Models;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Package)->getTable())->ignore($this->route()->package->id ?? null)
            ],
            'Cost' => [
                'required'
            ],
            'ParticipantType' => [
                'required', 'exists:'.(new ParticipantType)->getTable().',id'
            ],
            'OtherModels' => [
                'required'
            ]
         ];
    }
}
