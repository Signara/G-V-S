<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exhibition;
use App\Participant;
use DB;
use App\Http\Resources\Exhibition as ExhibitionResource;
use App\Http\Resources\ExhibitionDetail as ExhibitionDetailResource;

class ExhibitionController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function exhibitionList(Request $request)
    {
        $curdate = date('Y-m-d');

        $exhibitions = Exhibition::where('Status','=',1)->where('StartDate','<=',$curdate)->where('EndDate','>=',$curdate)->get();

        if(!empty($exhibitions))
        {
            return response()->json(['data' => ExhibitionResource::collection($exhibitions), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Exhibition Status Inactive', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function exhibitionDetail(Request $request)
    {
        $Exhibitionid = $request->exhibitionid;

        if(!empty($Exhibitionid))
        {
            $exhibitions = Exhibition::where('id','=',$Exhibitionid)->get();

            return response()->json(['data' => ExhibitionDetailResource::collection($exhibitions), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Exhibition ID doesnt exist', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function getUserAccessType(Request $request)
    {
        $userID = $request->UserID;
        $exhibitionID = $request->ExhibitionID;

        $companyid = DB::table('companies')->where('CompanyAdminUserIDs','=',$userID)->select('id')->first();

        $roleid = DB::table('users')->where('id','=',$userID)->select('role_id')->first();

        $rolename = DB::table('roles')->where('id','=',$roleid->role_id)->select('name')->first();

        if($rolename->name == 'Dev Admin')
        {
            $accesstype = 'Organizer';

            return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else if($rolename->name == 'Member')
        {
            $cmpid = Exhibition::where('id','=',$exhibitionID)->select('Organiser')->first();

            $adminid = DB::table('companies')->where('id','=',$cmpid->Organiser)->select('CompanyAdminUserIDs')->first();

            if(!empty($adminid))
            {
                if($userID == $adminid->CompanyAdminUserIDs)
                {
                    $accesstype = 'Organizer';

                    return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                }
                else if(Participant::where('Exhibition','=',$exhibitionID)->where('Company','=',$companyid->id ?? '')->exists())
                {
                    $usrid = DB::table('companies')->where('id','=',$companyid->id ?? '')->select('CompanyAdminUserIDs')->first();

                    $users = $usrid->CompanyAdminUserIDs;

                    if($userID == $users)
                    {
                        $accesstype = 'Exhibitor';

                        return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                    }
                    else
                    {
                        $accesstype = 'Visitor';

                        return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                    }
                }
                else
                {
                    $accesstype = 'Visitor';

                    return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                }
            }
            else
            {
                if(Participant::where('Exhibition','=',$exhibitionID)->where('Company','=',$companyid->id ?? '')->exists())
                {
                    $usrid = DB::table('companies')->where('id','=',$companyid->id ?? '')->select('CompanyAdminUserIDs')->first();

                    $users = $usrid->CompanyAdminUserIDs;

                    if($userID == $users)
                    {
                        $accesstype = 'Exhibitor';

                        return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                    }
                    else
                    {
                        $accesstype = 'Visitor';

                        return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                    }
                }
                else
                {
                    $accesstype = 'Visitor';

                    return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                }
            }
        }
        else
        {
            if(Exhibition::where('id','=',$exhibitionID)->whereRaw("find_in_set(".$userID.",Admins)")->exists())
            {
                $accesstype = 'Organizer';

                return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
            else
            {
                $accesstype = 'Visitor';

                return response()->json(['data' => $accesstype, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
        }
    }
}
