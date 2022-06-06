<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Communication;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Communication as CommunicationResource;

class CommunicationController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function fcm($message){

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        /*api_key available in:API Key - AIzaSyDmKYgVM7Fog05K0IpDZRzL8AO8uXAqL0M

this is wrong
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    $api_key = 'AAAAmYG4pAg:APA91bFL0OQ_I5PhsIobCZGrQ7i4tsO-askI4q9QoHZh5wRVpaXE-0evyGsqfSaelUwdLwtH9qSKOaOXK_-HumjXVcnNZYoluVrfKQpR-SeMx6KUYyrZX-lYas_C_sWptYN9mlJtzh8X';

        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public function communicationCreate(Request $request)
    {
        $visitor = $request->userid;
        $exhibition = $request->companyid;
        $companies = $request->companyuserid;
        $chatID = $request->roomID;
        $type = $request->type;
        $message = $request->message;

        $validator = Validator::make($request->all(), [
            'userid' => ['required'],
            'companyid' => ['required'],
            'companyuserid' => ['required'],
            'roomID' => ['required'],
            'type' => ['required'],
            'message' => ['required'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        $input = array(
            'Visitor' => $visitor,
            'Company' => $exhibition,
            'CompanyUser' => $companies,
            'ChatID' => $chatID,
            'Type' => $type,
            'Message' => $message,
        );

        $communications = Communication::create($input);
        $data['id'] = $communications->id;

        if($communications->Message == 'User Called')
        {
            $fcm = DB::table('users')->join('user_tokens','user_tokens.user_id','=','users.id')->where('users.id','=',$communications->CompanyUser)->select('user_tokens.FcmToken')->get();

            foreach ($fcm as $key => $value)
            {
                $fcmtoken = $fcm[$key]->FcmToken;

                if($fcmtoken != '')
                {
                    $text = 'Call Started';
                    $fields = array (

                        'to' => $fcmtoken,

                        'notification' => array(
                            "body" => $text,
                            "title" => 'Communication Start'
                        ),
                    );

                $this->fcm($fields);
                }
            }
        }

        return response()->json(['data' => $data, 'result' => true , 'message' => 'Communications Created Succesfully', 'statusCode' => 200], $this->successStatus);
    }

    public function communicationList(Request $request)
    {
        $UserId = $request->userid;
        $CompanyUserId = $request->companyuserid;
        $ChatId = $request->roomID;

        $communications = Communication::where('Visitor','=',$UserId)->where('CompanyUser','=',$CompanyUserId)->where('ChatID','=',$ChatId)->get();

        return response()->json(['data' => CommunicationResource::collection($communications), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
    }
}
