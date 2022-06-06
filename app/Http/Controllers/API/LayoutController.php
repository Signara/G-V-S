<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Layout;
use App\Company;
use App\Exhibition;
use App\Participant;
use App\Models;
use DB;
use App\Http\Resources\Layout as LayoutResource;
use Mail;

class LayoutController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function createLayout(Request $request)
    {
        $Exhibtion = $request->ExhibtionID;
        $Hall = $request->HallID;
        $Company = $request->CompanyID;
        $Model = $request->ModelID;
        $Colour1 = $request->Colour1;
        $Colour2 = $request->Colour2;
        $Status = $request->Status;
        $PX = $request->PX;
        $PY = $request->PY;
        $PZ = $request->PZ;
        $RX = $request->RX;
        $RY = $request->RY;
        $RZ = $request->RZ;
        $SX = $request->SX;
        $SY = $request->SY;
        $SZ = $request->SZ;
        $prefabName = $request->prefabName;
        $StallId = $request->StallId;

        $input = array(
            'ExhibtionID' => $Exhibtion,
            'HallID' => $Hall,
            'CompanyID' => $Company,
            'ModelID' => $Model,
            'Colour1' => $Colour1,
            'Colour2' => $Colour2,
            'Banner1' => $request->Banner1,
            'Banner2' => $request->Banner2,
            'Banner3' => $request->Banner3,
            'Banner4' => $request->Banner4,
            'Status' => $Status,
            'PX' => $PX,
            'PY' => $PY,
            'PZ' => $PZ,
            'RX' => $RX,
            'RY' => $RY,
            'RZ' => $RZ,
            'SX' => $SX,
            'SY' => $SY,
            'SZ' => $SZ,
            'prefabName' => $prefabName,
            'StallId' => $StallId,
        );

        $layouts = Layout::create($input);
        $data['id'] = $layouts->id;
        $data['StallId'] = $layouts->StallId;

        $company = Company::where('id','=',$Company)->select('Email')->first();

        $modeltype = Models::where('id','=',$Model)->where('Type','=','Stall')->select('id')->first();

        $exhibitionpackage = Exhibition::join('participants','participants.Exhibition','=','exhibitions.id')->join('packages','packages.id','=','participants.Package')->where('exhibitions.id','=',$Exhibtion)->select('exhibitions.Name as exhibitionname','packages.Name as packagename')->first();

        if(!empty($exhibitionpackage))
        {
            if(!empty($company->Email) && !empty($modeltype->id))
            {
                $title = 'Your personalized stall is ready!';
                $emails = $company->Email;

                Mail::send('emails.stallready', ['exhbtnname' => $exhibitionpackage->exhibitionname , 'packagename' => $exhibitionpackage->packagename] , function($message) use($title,$emails){
                $message->to($emails)
                        ->subject($title);
                $message->from('dweekstudios@gmail.com','Virtu Expo');
                });
            }
        }

        return response()->json(['data' => $data, 'result' => true , 'message' => 'Layout Created Succesfully', 'statusCode' => 200], $this->successStatus);
    }

    public function updateLayout(Request $request)
    {
        $LayoutId = $request->id;
        $Exhibtion = $request->ExhibtionID;
        $Hall = $request->HallID;
        $Company = $request->CompanyID;
        $Model = $request->ModelID;
        $Colour1 = $request->Colour1;
        $Colour2 = $request->Colour2;
        $Status = $request->Status;
        $PX = $request->PX;
        $PY = $request->PY;
        $PZ = $request->PZ;
        $RX = $request->RX;
        $RY = $request->RY;
        $RZ = $request->RZ;
        $SX = $request->SX;
        $SY = $request->SY;
        $SZ = $request->SZ;
        $prefabName = $request->prefabName;
        $StallId = $request->StallId;

        if(DB::table('layouts')->where('id','=',$LayoutId)->exists())
        {
            $layout = Layout::find($LayoutId);
            $layout->ExhibtionID = $Exhibtion;
            $layout->HallID = $Hall;
            $layout->CompanyID = $Company;
            $layout->ModelID = $Model;
            $layout->Colour1 = $Colour1;
            $layout->Colour2 = $Colour2;
            $layout->Banner1 = $request->Banner1;
            $layout->Banner2 = $request->Banner2;
            $layout->Banner3 = $request->Banner3;
            $layout->Banner4 = $request->Banner4;
            $layout->Status = $Status;
            $layout->PX = $PX;
            $layout->PY = $PY;
            $layout->PZ = $PZ;
            $layout->RX = $RX;
            $layout->RY = $RY;
            $layout->RZ = $RZ;
            $layout->SX = $SX;
            $layout->SY = $SY;
            $layout->SZ = $SZ;
            $layout->prefabName = $prefabName;
            $layout->StallId = $StallId;
            $layout->save();

            return response()->json(['result' => true , 'message' => 'Layout Updated Succesfully', 'statusCode' => 200], $this->successStatus);
        }
    }

    public function deleteLayout(Request $request)
    {
        $layoutid = $request->id;

        if(!empty($layoutid))
        {
            $layouts = Layout::where('id','=',$layoutid)->delete();

            $layouts = Layout::where('StallId','=',$layoutid)->delete();

            return response()->json(['result' => true , 'message' => 'Layout deleted Succesfully', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Error', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function layoutList(Request $request)
    {
        $exhibitionid = $request->ExhibtionID;
        $hallid = $request->HallID;

        if($exhibitionid)
        {
            $curdatetime = date('Y-m-d H:i:s');

            $companyids = Participant::where('EndDate','>',$curdatetime)->where('Exhibition','=',$exhibitionid)->select('Company','EndDate')->get();

            if($companyids)
            {
                $company = [];

                foreach ($companyids as $cmpid)
                {
                    $company[] = $cmpid->Company;
                }

                $layouts = Layout::where('ExhibtionID','=',$exhibitionid)->whereIn('CompanyId',$company)->where('HallID','=',$hallid)->get();

                return response()->json(['data' => LayoutResource::collection($layouts), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
            else
            {
                return response()->json(['data' => [], 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Oops No Data Found', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function changeLayoutStatus(Request $request)
    {
        $curdate = date('Y-m-d');

        $curtime = date('h:i A');

        $crtime = explode(':',$curtime);

        $currentime = $curtime[1].':'.$crtime[1];

        if($curtime > '11:00 AM' OR $curtime > '11:00 PM')
        {
            $currentime = date('h:i A');
        }

        if(Participant::where('EndDate','<=',$curdate)->where('EndTime','<=',$currentime)->exists())
        {
            $exhibitionid = Participant::where('EndDate','<=',$curdate)->where('EndTime','<=',$currentime)->select('Exhibition')->get();

            foreach ($exhibitionid as $exhbtnid)
            {
                $exhibition = $exhbtnid->Exhibition;

                $layoutid = Layout::where('ExhibtionID','=',$exhibition)->select('id')->first();

                if(!empty($layoutid->id))
                {
                    $layout = Layout::find($layoutid->id);
                    $layout->Status = 0;
                    $layout->save();
                }
            }
        }
    }
}
