<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class ModelDetail extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ModelID' => $this->id,
            'Image' => asset("storage/$this->Image"),
            'Name' => $this->Name,
            'Description' => $this->Description,
            'xValue' => $this->xValue,
            'yValue' => $this->yValue,
            'zValue' => $this->zValue,
            'Model' => asset("storage/$this->Model"),
            'Type' => $this->Type,
            'prefabName' => $this->prefabName,
        ];
    }
}
