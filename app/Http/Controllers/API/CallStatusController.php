<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CallStatus;
use App\Communication;
use DB;
use DateTime;
use Illuminate\Support\Facades\Validator;

class CallStatusController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function callStatusCreateUpdate(Request $request)
    {
        $UserID = $request->UserID;
        $RoomID = $request->RoomID;
        $Status = $request->Status;

        $validator = Validator::make($request->all(), [
            'UserID' => ['required'],
            'RoomID' => ['required'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        if(CallStatus::where('UserID','=',$UserID)->where('RoomID','=',$RoomID)->select('id')->exists())
        {
            $callstatusid = CallStatus::where('UserID','=',$request->UserID)->where('RoomID','=',$request->RoomID)->first();

            $callid = $callstatusid->id;

            $callstatuses = CallStatus::find($callid);
            if(!empty($UserID)) { $callstatuses->UserID = $UserID; }
            if(!empty($RoomID)) { $callstatuses->RoomID = $RoomID; }
            if(!empty($Status)) { $callstatuses->Status = $Status; }
            $callstatuses->updated_at = date('Y-m-d h:i:s');
            $callstatuses->save();

            return response()->json(['result' => true , 'message' => 'CallStatus Updated Succesfully', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            $input = array(
                'UserID' => $UserID,
                'RoomID' => $RoomID,
                'Status' => $Status,
            );

            $callstatus = CallStatus::create($input);

            return response()->json(['result' => true , 'message' => 'CallStatus Created Succesfully', 'statusCode' => 200], $this->successStatus);
        }
    }

    public function callNotification(Request $request)
    {
        $UserId = $request->userid;

        $date = new DateTime;
        $date->modify('-1 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');

        $communicationdata = Communication::where('CompanyUser','=',$UserId)->where('Message','=','User Called')->where('created_at','>',$formatted_date)->select('id','created_at','Visitor','ChatID')->get()->toArray();
        if($communicationdata)
        {
            $dc = array();
            foreach($communicationdata as $communication)
            {
                $communctid = $communication['id'];
                $createdat = date('Y-m-d H:i:s', strtotime($communication['created_at']));
                $visitorid = $communication['Visitor'];
                $roomid = $communication['ChatID'];

                $comid = Communication::where('Visitor','=',$visitorid)->where('ChatID','=',$roomid)->where('Message','=','Call Ended')->where('created_at','>',$createdat)->select('id')->first();
                if(empty($comid))
                {
                    $data = Communication::join('users','users.id','=','communications.Visitor')->join('companies','companies.id','=','communications.Company')->where('communications.id','=',$communctid)->select('users.id as userid','users.name','companies.id as companyid','companies.CommonName as company','users.Designation','communications.ChatID')->get()->toArray();

                    $dc = array_merge($dc,$data);
                }
            }

            foreach ($dc as $key => $value) {
                $datas[$key]['userid'] = $value['userid'];
                $datas[$key]['name'] = $value['name'];
                $datas[$key]['Designation'] = $value['Designation'];
                $datas[$key]['companyid'] = $value['companyid'];
                $datas[$key]['company'] = $value['company'];
                $datas[$key]['ChatID'] = $value['ChatID'];
            }

            return response()->json(['data' => $datas ?? [], 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'No Calls', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function callStatus(Request $request)
    {
        $date = new DateTime;
        $date->modify('-10 seconds');
        $formatted_date = $date->format('Y-m-d h:i:s');

        $callstatus = CallStatus::where('updated_at','<',$formatted_date)->where('Status','=',1)->select('id','UserID','RoomID')->get()->toArray();

        foreach($callstatus as $callstts)
        {
            $callid = $callstts['id'];
            $userid = $callstts['UserID'];
            $roomid = $callstts['RoomID'];

            $callstatuses = CallStatus::find($callid);
            $callstatuses->Status = 0;
            $callstatuses->save();

            $communication = DB::table('communications')->where('Visitor','=',$userid)->where('ChatID','=',$roomid)->select('Visitor','Company','CompanyUser','ChatID','Type','Message')->first();

            if($communication)
            {
                $input = array(
                    'Visitor' => $communication->Visitor,
                    'Company' => $communication->Visitor,
                    'CompanyUser' => $communication->Visitor,
                    'ChatID' => $communication->Visitor,
                    'Type' => $communication->Visitor,
                    'Message' => 'Call Ended',
                );

                $callsts = CallStatus::create($input);
            }
        }

    }
}
