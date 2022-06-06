<?php

namespace App\Http\Controllers;

use App\Company;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $model)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $products = Product::join('companies','companies.id','=','products.Company')->whereRaw("find_in_set(".auth()->user()->id.",companies.CompanyAdminUserIDs)")->select('products.*','companies.CommonName as company')->get();
        } else {
            $products = Product::join('companies','companies.id','=','products.Company')->select('products.*','companies.CommonName as company')->get();
        }

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $companyModel)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $companies = Company::whereRaw("find_in_set(".auth()->user()->id.",CompanyAdminUserIDs)")->select('id','CommonName')->get();
        }
        else
        {
            $companies = Company::all();
        }
        return view('products.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)
    {
        $product = $model->create($request->merge([
            'Image' => $request->photo ? $request->file('photo')->store('productimage', 'public') : null,
            'Status' => 1
        ])->all());

        return redirect()->route('product.index')->withStatus(__('Products successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $companies = Company::whereRaw("find_in_set(".auth()->user()->id.",CompanyAdminUserIDs)")->select('id','CommonName')->get();
        }
        else
        {
            $companies = Company::all();
        }
        return view('products.edit', compact('product','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update(
            $request->merge([
                'Image' => $request->photo ? $request->photo->store('productimage', 'public') : $product->Image
            ])->all()
        );

        return redirect()->route('product.index')->withStatus(__('Products successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->withStatus(__('Products successfully deleted.'));
    }
}
