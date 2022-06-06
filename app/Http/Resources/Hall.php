<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Hall extends JsonResource
{
    public function toArray($request)
    {
        $exhibitionData = $this->getExhibitionName($this->Exhibition);
        return [
            'Exhibition' => $exhibitionData,
            'HallID' => $this->id,
            'SrNo' => $this->SrNo,
            'Name' => $this->Name,
            'Description' => $this->Description,
            'StartDate' => $this->StartDate,
            'StartTime' => $this->StartTime,
            'FloorColor' => $this->FloorColor,
        ];
    }

    public function getExhibitionName($exhibitionId)
    {
           $exhibition = DB::table('exhibitions')->select('Name')->where('id', $exhibitionId)->first();
           return $exhibition->Name;
    }
}
