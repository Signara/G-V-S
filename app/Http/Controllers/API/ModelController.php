<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use App\Package;
use DB;
use App\Http\Resources\ModelDetail as ModelDetailResource;

class ModelController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function modelDetail(Request $request)
    {
        $modelid = $request->ModelID;

        if(!empty($modelid))
        {
            $models = Models::where('id','=',$modelid)->get();

            return response()->json(['data' => ModelDetailResource::collection($models), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Model ID not available', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function modelList(Request $request)
    {
        $packageid = $request->PackageID;
        $companyid = $request->CompanyID;

        if(!empty($packageid))
        {
            $packages = Package::where('id','=',$packageid)->select('Stalls','Banners','OtherModels')->first();

            if(!empty($packages))
            {
                $modelsrelstalls = Models::whereIn('id',explode(',', $packages->Stalls))->get();

                $stalls = [];
                foreach ($modelsrelstalls as $modelsrelstall)
                {
                    $stalls[] = $modelsrelstall->id;
                }

                if($packages->Banners  === 'On')
                {
                    $modelsrelbanners = Models::where('Type','=','Banner')->get();

                    $banners = [];
                    foreach ($modelsrelbanners as $modelsrelbanner)
                    {
                        $banners[] = $modelsrelbanner->id;
                    }
                }

                if($packages->OtherModels === 'On')
                {
                    $modelsrelothers = Models::where('CompanyID','=',$companyid)->where('Type','=','Others')->get();

                    $others = [];
                    foreach ($modelsrelothers as $modelsrelother)
                    {
                        $others[] = $modelsrelother->id;
                    }
                }

                $modelsrelwaitingareas = Models::where('Type','=','WaitingArea')->get();

                $waitingarea = [];
                foreach ($modelsrelwaitingareas as $modelsrelwaitingarea)
                {
                    $waitingarea[] = $modelsrelwaitingarea->id;
                }

                $data = array_merge($stalls ?? [],$banners ?? [],$others ?? [],$waitingarea ?? []);

                $models = Models::whereIn('id',$data)->get();

                return response()->json(['data' => ModelDetailResource::collection($models), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Package ID not available', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
