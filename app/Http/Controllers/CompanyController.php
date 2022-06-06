<?php

namespace App\Http\Controllers;

use App\Company;
use App\Sector;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $model)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $companies = Company::whereRaw("find_in_set(".auth()->user()->id.",CompanyAdminUserIDs)")->get();
        } else {
            $companies = Company::all();
        }

        return view('companies.index', compact('companies'));
    }

    public function getCategories(Request $request)
    {
        $categories = Category::where('IndustryId',$request->id)->pluck('name','id');
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new Article
     *
     * @param  \App\Sector $sectorModel
     * @param  \App\Category $categoryModel
     * @param  \App\User $userModel
     * @return \Illuminate\View\View
     */
    public function create(Sector $sectorModel, Category $categoryModel)
    {
        $role = DB::table('roles')->where('name','=','Member')->select('id')->first();

        $companyIDs = DB::table('users')->where('role_id','=',$role->id)->whereNull('deleted_at')->select('CompanyID')->get();

        if($companyIDs)
        {
            $cmpID = [];

            foreach ($companyIDs as $companyID) 
            {
                $cmpID[] = $companyID->CompanyID;
            }

            $adminUsers = DB::table('users')->whereIn('CompanyID',$cmpID)->whereNull('deleted_at')->select('*')->get();
        }

        return view('companies.create', [
            'sectors' => $sectorModel->get(['id', 'name']),
            'users' => $adminUsers ?? ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request, Company $model)
    {
        $company = $model->create($request->merge([
            'Logo' =>$request->photo ? $request->file('photo')->store('company', 'public') : null,
            'Phone' =>$request->Phone,
            'Categories' =>implode(',', $request->Categories),
            'CompanyAdminUserIDs' =>$request->CompanyAdminUserIDs ?? NULL
        ])->all());

        return redirect()->route('company.index')->withStatus(__('Company successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $role = DB::table('roles')->where('name','=','Member')->select('id')->first();

        $companyIDs = DB::table('users')->where('role_id','=',$role->id)->whereNull('deleted_at')->select('CompanyID')->get();

        if($companyIDs)
        {
            $cmpID = [];

            foreach ($companyIDs as $companyID) 
            {
                $cmpID[] = $companyID->CompanyID;
            }

            $users = DB::table('users')->whereIn('CompanyID',$cmpID)->whereNull('deleted_at')->select('*')->get();
        }

        $sectors = Sector::all();
        $categories = Category::where('IndustryId',$company->Sectors)->select('name','id')->get();
        $selectdSector = $company->Sectors;
        $selectdCategory = explode(',', $company->Categories);
        $selectdUser = $company->CompanyAdminUserIDs;
        return view('companies.edit', compact('company','sectors','categories','users','selectdSector','selectdCategory','selectdUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update(
            $request->merge([
                'Logo' => $request->photo ? $request->photo->store('company', 'public') : $company->Logo,
                'Phone' =>$request->Phone,
                'Categories' =>implode(',', $request->Categories),
                'CompanyAdminUserIDs' =>$request->CompanyAdminUserIDs ?? NULL
            ])->except([$request->hasFile('photo') ? '' : 'picture'])
        );

        return redirect()->route('company.index')->withStatus(__('Company successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')->withStatus(__('Company successfully deleted.'));
    }
}
