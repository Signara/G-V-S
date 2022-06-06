<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class CompanyDetail extends JsonResource
{
    public function toArray($request)
    {
        $sectorData = $this->getSectorName($this->Sectors);
        $categoryData = $this->getCategoryName($this->Categories);
        return [
            'ID' => $this->id,
            'CommonName' => $this->CommonName,
            'Email' => $this->Email ?? '',
            'Phone' => $this->Phone ?? '',
            'Website' => $this->Website ?? '',
            'Logo' => asset("storage/$this->Logo") ?? '',
            'Sectors' => $sectorData ?? 0,
            'Categories' => $categoryData ?? '',
            'CompanyLink' => asset("company/$this->slug"),
        ];
    }

    public function getSectorName($sectorId)
    {
        $sectorList = [];
        $sectordata = DB::table('sectors')->whereIn('id', explode(',',$sectorId))->select('name')->get()->toArray();

        foreach ($sectordata as $sect)
        {
            $sectorList[] = $sect->name;
        }
        $sectorName = '';
        $sectorName = implode(', ', $sectorList);
        return $sectorName;
    }

    public function getCategoryName($categoryId)
    {
        $categoryList = [];
        $categorydata = DB::table('categories')->whereIn('id', explode(',',$categoryId))->select('name')->get()->toArray();

        foreach ($categorydata as $cat)
        {
            $categoryList[] = $cat->name;
        }
        $categoryName = '';
        $categoryName = implode(', ', $categoryList);
        return $categoryName;
    }
}
