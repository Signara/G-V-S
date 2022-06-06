<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Communication extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Type' => $this->Type,
            'Message' => $this->Message,
            'CreatedAt' => $this->CreatedAt,
        ];
    }
}
