<?php

namespace App\Http\Requests;

use App\ExhibitionRelGallery;
use App\Exhibition;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRelGalleryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gallary' => [
                'mimes:jpeg,png'
            ]
         ];
    }
}
