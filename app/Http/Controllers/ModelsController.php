<?php

namespace App\Http\Controllers;

use App\Models;
use App\Package;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\ModelsRequest;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Models $models)
    {
        if (auth()->user()->isAdmin()) {
            $models = $models->get();
        } else {
            $models = Models::all();
        }

        return view('models.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $companyModel)
    {
        return view('models.create', [
            'companies' => $companyModel->get(['id', 'CommonName'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelsRequest $request, Models $models)
    {
        $model = $models->create($request->merge([
            'Image' => $request->photo ? $request->photo->store('modelsimage', 'public') : null,
            'Model' => $request->picture ? $request->picture->store('modelsbanner', 'public') : null,
            'Status' => 1
        ])->all());

        return redirect()->route('model.index')->withStatus(__('Models successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function show(Models $models)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function edit(Models $models)
    {
        $companies = Company::all();
        return view('models.edit',compact('models','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function update(ModelsRequest $request, Models $models)
    {
        $models->update(
            $request->merge([
                'Image' => $request->photo ? $request->photo->store('modelsimage', 'public') : $models->Image,
                'Model' => $request->picture ? $request->picture->store('modelsbanner', 'public') : $models->Model,
            ])->all()
        );

        return redirect()->route('model.index')->withStatus(__('Models successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function destroy(Models $models)
    {
        if(Package::where('Stalls','=',$models->id)->select('id')->exists())
        {
            return redirect()->route('model.index')->withErrors('Model Use By A Package.');
        }
        else
        {
            $models->delete();
        }

        return redirect()->route('model.index')->withStatus(__('Models successfully deleted.'));
    }
}
