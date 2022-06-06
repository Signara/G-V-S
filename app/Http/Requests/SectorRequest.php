<?php

namespace App\Http\Requests;

use App\Sector;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SectorRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Sector)->getTable())->ignore($this->route()->sector->id ?? null)
            ],
            'slug' => [
                'required', Rule::unique((new Sector)->getTable())->ignore($this->route()->sector->id ?? null)
            ],
            'photo' => [
                'mimes:jpeg,png'
            ]
        ];
    }
}
