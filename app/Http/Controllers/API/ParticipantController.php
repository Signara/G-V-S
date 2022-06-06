<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use DB;
use App\Http\Resources\Participant as ParticipantResource;
use Illuminate\Support\Facades\Validator;

class ParticipantController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function participantList(Request $request)
    {
        $Exhibitionid = $request->exhibitionid;

        $validator = Validator::make($request->all(), [
            'exhibitionid' => ['required', 'min:1'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        $curdatetime = date('Y-m-d H:i:s');

        $participants = Participant::where('Exhibition','=',$Exhibitionid)->where('EndDate','>',$curdatetime)->where('Status','=',1)->get();

        if(!empty($participants))
        {
            return response()->json(['data' => ParticipantResource::collection($participants), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Exhibition ID doesnt exist', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
