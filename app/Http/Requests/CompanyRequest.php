<?php

namespace App\Http\Requests;

use App\Sector;
use App\Company;
use App\Category;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CommonName' => [
                'required', 'min:3', Rule::unique((new Company)->getTable())->ignore($this->route()->company->id ?? null)
            ],
            'slug' => [
                'required', 'min:3', Rule::unique((new Company)->getTable())->ignore($this->route()->company->id ?? null)
            ],
            'Email' => [
                'required', Rule::unique((new Company)->getTable())->ignore($this->route()->company->id ?? null)
            ],
            'Phone' => [
                'required', 'min:10', Rule::unique((new Company)->getTable())->ignore($this->route()->company->id ?? null)
            ],
            'Categories.*' => [
                'required', 'exists:'.(new Category)->getTable().',id'
            ],
            'Sectors.*' => [
                'required', 'exists:'.(new Sector)->getTable().',id'
            ],
            'keywords' => [
                'required'
            ],
            'photo' => [
                'mimes:jpeg,png'
            ]
         ];
    }
}
