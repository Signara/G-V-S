<?php

namespace App\Http\Controllers;

use App\Hall;
use App\Exhibition;
use Illuminate\Http\Request;
use App\Http\Requests\HallRequest;
use DB;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exhibition $exhibition)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member') {
            $halls = Hall::join('exhibitions','exhibitions.id','=','halls.Exhibition')->where('halls.Exhibition','=',$exhibition->id)->where('halls.id','=',auth()->user()->id)->select('halls.*','exhibitions.Name as Exhibition')->get();
        } else {
            $halls = Hall::join('exhibitions','exhibitions.id','=','halls.Exhibition')->where('halls.Exhibition','=',$exhibition->id)->select('halls.*','exhibitions.Name as Exhibition')->get();
        }

        return view('exhibitions.halls.index', ['halls' => $halls , 'exhibition' => $exhibition]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exhibition $exhibition)
    {
        return view('exhibitions.halls.create',compact('exhibition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exhibition $exhibition, HallRequest $request, Hall $model)
    {
        $hall = $model->create($request->merge([
            'Exhibition' =>$exhibition->id,
            'Status' =>1
        ])->all());

        return redirect()->route('hall.index', $exhibition)->withStatus(__('Hall successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibition $exhibition, Hall $hall)
    {
        return view('exhibitions.halls.edit', compact('exhibition','hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Exhibition $exhibition, HallRequest $request, Hall $hall)
    {
        $hall->update(
            $request->merge([
                'status' => 1
            ])->all()
        );

        return redirect()->route('hall.index', $exhibition)->withStatus(__('Hall successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition, Hall $hall)
    {
        $hall->delete();

        return redirect()->route('hall.index', $exhibition)->withStatus(__('Hall successfully deleted.'));
    }
}
