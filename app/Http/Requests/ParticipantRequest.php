<?php

namespace App\Http\Requests;

use App\Participant;
use App\User;
use App\Package;
use App\Exhibition;
use App\Company;
use App\ParticipantType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'StartDate' => [
                'required'
            ],
            'StartTime' => [
                'required'
            ],
            'EndDate' => [
                'required'
            ],
            'EndTime' => [
                'required'
            ],
            'Company' => [
                'required', 'exists:'.(new Company)->getTable().',id'
            ],
            'ParticipantType' => [
                'required', 'exists:'.(new ParticipantType)->getTable().',id'
            ],
            'Package' => [
                'required', 'exists:'.(new Package)->getTable().',id'
            ],
            'Admins.*' => [
                'required', 'exists:'.(new User)->getTable().',id'
            ],
            'products_allowed' => [
                'required'
            ]
         ];
    }
}
