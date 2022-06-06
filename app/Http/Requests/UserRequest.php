<?php

namespace App\Http\Requests;

use App\Role;
use App\User;
use App\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'Phone' => [
                'required', 'max:10', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'Designation' => [
                'required'
            ],
            'country_code' => [
                'required'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'role_id' => [
                'required', 'exists:'.(new Role)->getTable().',id'
            ],
            'CompanyID' => [
                'required', 'exists:'.(new Company)->getTable().',id'
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
            ],
            'photo' => [
                'mimes:jpeg,png'
            ]
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'role_id' => 'role',
            'CompanyID' => 'company',
        ];
    }
}
