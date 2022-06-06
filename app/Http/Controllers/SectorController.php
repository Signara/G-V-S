<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use App\Http\Requests\SectorRequest;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sector $model)
    {
        return view('sectors.index', ['sectors' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorRequest $request, Sector $model)
    {
        $model->create($request->merge([
            'picture' =>$request->photo ? $request->file('photo')->store('sectors', 'public') : null,
        ])->all());
        return redirect()->route('sector.index')->withStatus(__('Sector successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        return view('sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(SectorRequest $request, Sector $sector)
    {
        $sector->update($request->merge([
            'picture' => $request->photo ? $request->photo->store('sectors', 'public') : null,
        ])->except([$request->hasFile('photo') ? '' : 'picture']));

        return redirect()->route('sector.index')->withStatus(__('Sector successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();

        return redirect()->route('sector.index')->withStatus(__('Sector successfully deleted.'));
    }
}
