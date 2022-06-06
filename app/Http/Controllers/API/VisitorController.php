<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;
use App\Company;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CompanyDetail as CompanyDetailResource;

class VisitorController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function visitorCreate(Request $request)
    {
        $visitor = $request->userid;
        $exhibition = $request->exhibitionid;
        $companies = $request->companyid;

        $validator = Validator::make($request->all(), [
            'userid' => ['required'],
            'exhibitionid' => ['required'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        $input = array(
            'Visitor' => $visitor,
            'Exhibition' => $exhibition,
            'Companies' => $companies,
        );

        $visitors = Visitor::create($input);
        $data['id'] = $visitors->id;

        return response()->json(['data' => $data, 'result' => true , 'message' => 'Visitors Created Succesfully', 'statusCode' => 200], $this->successStatus);
    }

    public function visitorList(Request $request)
    {
        $visitor = $request->userid;
        $exhibition = $request->exhibitionid;

        $validator = Validator::make($request->all(), [
            'userid' => ['required'],
            'exhibitionid' => ['required'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        if(!empty($visitor) && !empty($exhibition))
        {
            $companies = Visitor::where('Visitor','=',$visitor)->where('Exhibition','=',$exhibition)->select('Companies')->get();

            $companyid = [];
            foreach($companies as $company)
            {
                $companyids = explode(',', $company->Companies);
                $companyid = array_merge($companyid, $companyids);
            }

            $dataList  = collect( $companyid )->unique();

            $companylist = DB::table('companies')->whereIn('id',$dataList)->get();

            $fd = fopen($visitor.'-'.$exhibition.'-'.'visitor.csv','w');

            $columns = array('Common Name', 'Email', 'Phone', 'Website', 'Logo', 'Sectors', 'Categories');
            fputcsv($fd, $columns);

            foreach ($companylist as $companylst)
            {
                $sectorList = [];
                $sectordata = DB::table('sectors')->whereIn('id', explode(',',$companylst->Sectors))->select('name')->get()->toArray();

                foreach ($sectordata as $sect)
                {
                    $sectorList[] = $sect->name;
                }
                $sectorName = '';
                $sectorName = implode(', ', $sectorList);

                $categoryList = [];
                $categorydata = DB::table('categories')->whereIn('id', explode(',',$companylst->Categories))->select('name')->get()->toArray();

                foreach ($categorydata as $cat)
                {
                    $categoryList[] = $cat->name;
                }
                $categoryName = '';
                $categoryName = implode(', ', $categoryList);

                $data = array(
                    'Common Name' => $companylst->CommonName,
                    'Email' => $companylst->Email,
                    'Phone' => $companylst->Phone,
                    'Website' => $companylst->Website,
                    'Logo' => asset("storage/$companylst->Logo"),
                    'Sectors' => $sectorName,
                    'Categories' => $categoryName,
                  );

                  fputcsv($fd, $data);
            }

            fclose($fd);

            $csv = asset($visitor.'-'.$exhibition.'-'.'visitor.csv');

            return response()->json(['companyData' => CompanyDetailResource::collection($companylist), 'CSV' => $csv, 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
    }

}
