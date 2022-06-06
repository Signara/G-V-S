<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class PromotionalMaterial extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Title' => $this->Title,
            'Type' => $this->Type,
            'File' => asset("storage/$this->File"),
            'Thumbnail' => asset("storage/$this->Thumbnail"),
        ];
    }
}
