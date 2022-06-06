<?php

namespace App\Http\Controllers;

use App\Exhibition;
use App\Sector;
use App\Category;
use App\Tag;
use App\Package;
use App\Company;
use App\User;
use App\ExhibitionRelGallery;
use Illuminate\Http\Request;
use App\Http\Requests\ExhibitionRequest;
use DB;
use Illuminate\Support\Str;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $exhibitions = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->whereRaw("find_in_set(".auth()->user()->id.",exhibitions.Admins)")->select('exhibitions.*','companies.CommonName as company')->get();
        } else {
            $exhibitions = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->select('exhibitions.*','companies.CommonName as company')->get();
        }

        return view('exhibitions.index', ['exhibitions' => $exhibitions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sector $sectorModel, Tag $tagModel, Package $packageModel, Company $companyModel, User $userModel)
    {
        $role = DB::table('roles')->where('name','=','Admin')->select('id')->first();
        return view('exhibitions.create', [
            'sectors' => $sectorModel->get(['id', 'name']),
            'tags' => $tagModel->get(['id', 'name']),
            'packages' => $packageModel->get(['id', 'Name']),
            'companies' => $companyModel->get(['id', 'CommonName']),
            'users' => User::where('role_id','=',$role->id)->select('*')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExhibitionRequest $request, Exhibition $model)
    {
        if(!empty($request->Admins))
        {
            $admin = implode(',', $request->Admins);
        }
        $exhibition = $model->create($request->merge([
            'Image' => $request->photo ? $request->photo->store('exhibitionimage', 'public') : null,
            'Banner' => $request->picture ? $request->picture->store('exhibitionbanner', 'public') : null,
            'info_image' => $request->inf_img ? $request->inf_img->store('exhibitioninfoimg', 'public') : null,
            'PDF' => $request->pdf ? $request->pdf->store('exhibitionpdf', 'public') : null,
            'Sector' =>implode(',', $request->Sector),
            'Tag' =>implode(',', $request->Tag),
            'Admins' =>$admin ?? null,
            'Packages' =>implode(',', $request->Packages),
            'StartDate' =>date('Y-m-d', strtotime($request->StartDate)),
            'EndDate' =>date('Y-m-d', strtotime($request->EndDate)),
            'StartTime' => '00:00',
            'EndTime' => '00:00',
            'Status' =>1
        ])->all());

        return redirect()->route('exhibition.index')->withStatus(__('Exhibitions successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function show(Exhibition $exhibition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibition $exhibition)
    {
        $role = DB::table('roles')->where('name','=','Admin')->select('id')->first();
        $sectors = Sector::all();
        $tags = Tag::all();
        $packages = Package::all();
        $companies = Company::all();
        $users = User::where('role_id','=',$role->id)->select('*')->get();
        $selectdSector = explode(',', $exhibition->Sector);
        $selectdTag = explode(',', $exhibition->Tag);
        $selectdPackage = explode(',', $exhibition->Packages);
        $selectdUser = explode(',', $exhibition->Admins);
        return view('exhibitions.edit', compact('exhibition','sectors','tags','packages','companies','users','selectdSector','selectdTag','selectdPackage','selectdUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function update(ExhibitionRequest $request, Exhibition $exhibition)
    {
        if(!empty($request->Admins))
        {
            $admin = implode(',', $request->Admins);
        }
        $exhibition->update(
            $request->merge([
                'Image' => $request->photo ? $request->photo->store('exhibitionimage', 'public') : $exhibition->Image,
                'Banner' => $request->picture ? $request->picture->store('exhibitionbanner', 'public') : $exhibition->Banner,
                'info_image' => $request->inf_img ? $request->inf_img->store('exhibitioninfoimg', 'public') : $exhibition->info_image,
                'PDF' => $request->pdf ? $request->pdf->store('exhibitionpdf', 'public') : $exhibition->PDF,
                'Sector' =>implode(',', $request->Sector),
                'Tag' =>implode(',', $request->Tag),
                'Admins' =>$admin ?? null,
                'StartDate' =>date('Y-m-d', strtotime($request->StartDate)),
                'EndDate' =>date('Y-m-d', strtotime($request->EndDate)),
                'StartTime' => '00:00',
                'EndTime' => '00:00',
                'Packages' =>implode(',', $request->Packages)
            ])->all()
        );

        return redirect()->route('exhibition.index')->withStatus(__('Exhibitions successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition)
    {
        $exhibition->delete();

        return redirect()->route('exhibition.index')->withStatus(__('Exhibitions successfully deleted.'));
    }
}
