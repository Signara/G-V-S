<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hall;
use DB;
use App\Http\Resources\Hall as HallResource;

class HallController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function hallList(Request $request)
    {
        $Exhibitionid = $request->exhibitionid;

        $halls = Hall::where('Exhibition','=',$Exhibitionid)->where('Status','=',1)->get();

        if(!empty($halls))
        {
            return response()->json(['data' => HallResource::collection($halls), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Exhibition ID doesnt exist', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
