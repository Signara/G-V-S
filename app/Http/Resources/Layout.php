<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Layout extends JsonResource
{
    public function toArray($request)
    {
        $companyData = $this->getCompanyName($this->CompanyID);
        $modelData = $this->getModelName($this->ModelID);
        return [
            'LayoutID' => $this->id,
            'CompanyID' => $this->CompanyID,
            'Company' => $companyData->CommonName,
            'Logo' => asset("storage/$companyData->Logo"),
            'Model' => $this->ModelID,
            'Colour1' => $this->Colour1,
            'Colour2' => $this->Colour2,
            'Banner1' => $this->Banner1,
            'Banner2' => $this->Banner2,
            'Banner3' => $this->Banner3,
            'Banner4' => $this->Banner4,
            'PX' => $this->PX,
            'PY' => $this->PY,
            'PZ' => $this->PZ,
            'RX' => $this->RX,
            'RY' => $this->RY,
            'RZ' => $this->RZ,
            'Type' => $modelData->Type ?? '',
            'xValue' => $modelData->xValue ?? 0,
            'yValue' => $modelData->yValue ?? 0,
            'zValue' => $modelData->zValue ?? 0,
            'prefabName' => $this->prefabName,
            'SX' => $this->SX,
            'SY' => $this->SY,
            'SZ' => $this->SZ,
            'StallId' => $this->StallId,
        ];
    }

    public function getCompanyName($companyId)
    {
           $company = DB::table('companies')->select('CommonName','Logo')->where('id', $companyId)->first();
           return $company;
    }

    public function getModelName($modelId)
    {
           $model = DB::table('models')->where('id', $modelId)->first();
           return $model;
    }
}
