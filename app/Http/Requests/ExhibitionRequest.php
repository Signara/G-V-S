<?php

namespace App\Http\Requests;

use App\Sector;
use App\Company;
use App\Tag;
use App\Package;
use App\Category;
use App\User;
use App\Exhibition;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'slug' => [
                'required', 'min:3', Rule::unique((new Exhibition)->getTable())->ignore($this->route()->exhibition->id ?? null)
            ],
            'StartDate' => [
                'required'
            ],
            'EndDate' => [
                'required'
            ],
            'Organiser' => [
                'required', 'exists:'.(new Company)->getTable().',id'
            ],
            'Category.*' => [
                'required', 'exists:'.(new Category)->getTable().',id'
            ],
            'Sector.*' => [
                'required', 'exists:'.(new Sector)->getTable().',id'
            ],
            'Tag.*' => [
                'required', 'exists:'.(new Tag)->getTable().',id'
            ],
            'Packages.*' => [
                'required', 'exists:'.(new Package)->getTable().',id'
            ],
            'Admins.*' => [
                'exists:'.(new User)->getTable().',id'
            ],
            'keywords' => [
                'required'
            ],
            'photo' => [
                'mimes:jpeg,png'
            ],
            'picture' => [
                'mimes:jpeg,png'
            ],
            'pdf' => [
                'mimes:pdf'
            ]
         ];
    }
}
