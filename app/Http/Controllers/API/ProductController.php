<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Participant;
use DB;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function productList(Request $request)
    {
        $Companyid = $request->companyid;
        $Exhibitionid = $request->exhibitionid;

        if(!empty($Companyid) && !empty($Exhibitionid))
        {
            $products = Participant::where('Company','=',$Companyid)->where('Exhibition','=',$Exhibitionid)->where('Status','=',1)->select('Products')->get();

            $productid = [];
            foreach($products as $product)
            {
                $productids = explode(',', $product->Products);
                $productid = array_merge($productid, $productids);
            }

            $dataList  = collect( $productid )->unique();

            $productlist = Product::whereIn('id',$dataList)->where('status','=',1)->get();

            return response()->json(['data' => ProductResource::collection($productlist), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Oops No Data Found', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
