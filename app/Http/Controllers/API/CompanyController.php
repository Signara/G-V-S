<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Participant;
use DB;
use App\Http\Resources\CompanyDetail as CompanyDetailResource;

class CompanyController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function companyDetail(Request $request)
    {
        $companyid = $request->companyid;

        if(!empty($companyid))
        {
            $companies = Company::where('id','=',$companyid)->get();

            return response()->json(['data' => CompanyDetailResource::collection($companies), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Company ID doesnt exist', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function companyRepresentative(Request $request)
    {
        $companyid = $request->companyid;
        $exhibitionid = $request->exhibitionid;

        if(!empty($companyid) && !empty($exhibitionid))
        {
            $participantusers = Participant::where('Company','=',$companyid)->where('Exhibition','=',$exhibitionid)->get()->toArray();

            $usrs = array();

            foreach($participantusers as $partusers)
            {
                $user = explode(',', $partusers['Admins']);

                $usrs = array_merge($usrs, $user);
            }

            $data = DB::table('users')->whereIn('id',$usrs)->where('deleted_at','=',NULL)->select('users.id','users.name','users.Designation')->get();

            return response()->json(['data' => $data, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Oops No Data Found.', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function companyCreate(Request $request)
    {
        $CommonName = $request->CommonName;
        $RegisteredName = $request->RegisteredName;
        $Email = $request->Email;
        $Phone = $request->Phone;
        $Website = $request->Website;
        $Description = $request->Description;
        $Address = $request->Address;
        $Sectors = $request->Sectors;
        $Categories = $request->Categories;
        $CompanyAdminUserIDs = $request->CompanyAdminUserIDs;
        $keywords = $request->keywords;

        $input = array(
            'CommonName' => $CommonName,
            'RegisteredName' => $RegisteredName,
            'Email' => $Email,
            'Phone' => $Phone,
            'Website' => $Website,
            'Description' => $Description,
            'Address' => $Address,
            'Logo' => $request->photo ? $request->file('photo')->store('company', 'public') : null,
            'Sectors' => $Sectors,
            'Categories' => $Categories,
            'CompanyAdminUserIDs' => $CompanyAdminUserIDs,
            'keywords' => $keywords,
            'slug' => strtolower($CommonName)
            );

        $company = Company::create($input);
        $data['id'] = $company->id;

        return response()->json(['data' => $data, 'result' => true , 'message' => 'Company Created Succesfully', 'statusCode' => 200], $this->successStatus);
    }

    public function companyList(Request $request)
    {
        $company = Company::all();

        if(!empty($company))
        {
            return response()->json(['data' => CompanyDetailResource::collection($company), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Oopps No Data Found..', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
