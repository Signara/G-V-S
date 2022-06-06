<?php

namespace App\Http\Controllers;

use App\Company;
use App\PromotionalMaterial;
use Illuminate\Http\Request;
use App\Http\Requests\PromotionalMaterialRequest;
use DB;

class PromotionalMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PromotionalMaterial $model)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $promotionalmaterials = PromotionalMaterial::join('companies','companies.id','=','promotional_materials.Company')->whereRaw("find_in_set(".auth()->user()->id.",companies.CompanyAdminUserIDs)")->select('promotional_materials.*','companies.CommonName as company')->get();
        } else {
            $promotionalmaterials = PromotionalMaterial::join('companies','companies.id','=','promotional_materials.Company')->select('promotional_materials.*','companies.CommonName as company')->get();
        }

        return view('promotionalmaterials.index', ['promotionalmaterials' => $promotionalmaterials]);
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
        return view('promotionalmaterials.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionalMaterialRequest $request, PromotionalMaterial $model)
    {
        if($request->Type == 'Image')
        {
            $this->validate($request, [
                'photo' => 'required|mimes:png,jpeg|max:2048',
                'picture' => 'nullable|mimes:png,jpeg|max:2048',
            ]);

            $promotionalmaterial = $model->create($request->merge([
                'File' => $request->photo ? $request->photo->store('prommatfile', 'public') : null,
                'Thumbnail' => $request->picture ? $request->picture->store('prommatthumbnail', 'public') : null,
                'Status' => 1
            ])->all());

            return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully created.'));
        }
        if($request->Type == 'Brochure')
        {
            $this->validate($request, [
                'photo' => 'required|mimes:pdf|max:2048',
                'picture' => 'nullable|mimes:pdf|max:2048',
            ]);

            $promotionalmaterial = $model->create($request->merge([
                'File' => $request->photo ? $request->photo->store('prommatfile', 'public') : null,
                'Thumbnail' => $request->picture ? $request->picture->store('prommatthumbnail', 'public') : null,
                'Status' => 1
            ])->all());

            return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully created.'));
        }
        if($request->Type == 'Video')
        {
            $this->validate($request, [
                'photo' => 'required|mimes:mp4|max:20048',
                'picture' => 'nullable|mimes:mp4|max:20048',
            ]);

            $promotionalmaterial = $model->create($request->merge([
                'File' => $request->photo ? $request->photo->store('prommatfile', 'public') : null,
                'Thumbnail' => $request->picture ? $request->picture->store('prommatthumbnail', 'public') : null,
                'Status' => 1
            ])->all());

            return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully created.'));
        }
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
    public function edit(PromotionalMaterial $promotionalmaterial)
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

        return view('promotionalmaterials.edit', compact('promotionalmaterial','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionalMaterialRequest $request, PromotionalMaterial $promotionalmaterial)
    {
        if($request->Type == 'Image')
        {
            $this->validate($request, [
                'photo' => 'nullable|mimes:png,jpeg|max:2048',
                'picture' => 'nullable|mimes:png,jpeg|max:2048',
            ]);

            $promotionalmaterial->update(
                $request->merge([
                    'File' => $request->photo ? $request->photo->store('prommatfile', 'public') : $promotionalmaterial->File,
                    'Thumbnail' => $request->picture ? $request->picture->store('prommatthumbnail', 'public') : $promotionalmaterial->Thumbnail
                ])->all()
            );

            return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully updated.'));
        }
        if($request->Type == 'Brochure')
        {
            $this->validate($request, [
                'photo' => 'nullable|mimes:pdf|max:2048',
                'picture' => 'nullable|mimes:pdf|max:2048',
            ]);

            $promotionalmaterial->update(
                $request->merge([
                    'File' => $request->photo ? $request->photo->store('prommatfile', 'public') : $promotionalmaterial->File,
                    'Thumbnail' => $request->picture ? $request->picture->store('prommatthumbnail', 'public') : $promotionalmaterial->Thumbnail
                ])->all()
            );

            return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully updated.'));
        }
        if($request->Type == 'Video')
        {
            $this->validate($request, [
                'photo' => 'nullable|mimes:mp4|max:20048',
                'picture' => 'nullable|mimes:mp4|max:20048',
            ]);

            $promotionalmaterial->update(
                $request->merge([
                    'File' => $request->photo ? $request->photo->store('prommatfile', 'public') : $promotionalmaterial->File,
                    'Thumbnail' => $request->picture ? $request->picture->store('prommatthumbnail', 'public') : $promotionalmaterial->Thumbnail
                ])->all()
            );

            return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully updated.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionalMaterial $promotionalmaterial)
    {
        $promotionalmaterial->delete();

        return redirect()->route('promotionalmaterial.index')->withStatus(__('Promotional Materials successfully deleted.'));
    }
}
