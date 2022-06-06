<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PromotionalMaterial;
use DB;
use App\Http\Resources\PromotionalMaterial as PromotionalMaterialResource;

class PromotionalMaterialController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function promotionalMaterialCreate(Request $request)
    {
        $title = $request->Title;
        $company = $request->CompanyID;
        $type = $request->Type;
        $Status = $request->Status;

        $input = array(
            'Title' => $title,
            'Company' => $company,
            'Type' => $type,
            'File' => $request->File ? $request->file('File')->store('prommatfile', 'public') : null,
            'Status' => $Status,
        );

        $promotionalmaterials = PromotionalMaterial::create($input);
        $data['id'] = $promotionalmaterials->id;

        return response()->json(['data' => $data, 'result' => true , 'message' => 'Promotional Materials Created Succesfully', 'statusCode' => 200], $this->successStatus);
    }

    public function promotionalMaterialList(Request $request)
    {
        $Companyid = $request->companyid;

        if(!empty($Companyid))
        {
            $promotionalmaterials = PromotionalMaterial::where('Company','=',$Companyid)->where('Status','=',1)->get();

            return response()->json(['data' => PromotionalMaterialResource::collection($promotionalmaterials), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Company ID doesnt exist', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
