<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Product extends JsonResource
{
    public function toArray($request)
    {
        if(!empty($this->Image))
        {
            return [
                'Name' => $this->Name,
                'Description' => $this->Description,
                'Image' => asset("storage/$this->Image"),
                'Price' => $this->Price,
            ];
        }
        else 
        {
            return [
                'Name' => $this->Name,
                'Description' => $this->Description,
                'Image' => '',
                'Price' => $this->Price,
            ];
        }
    }
}
