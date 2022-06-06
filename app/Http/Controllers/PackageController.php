<?php

namespace App\Http\Controllers;

use App\Package;
use App\ParticipantType;
use App\Models;
use App\Participant;
use App\Exhibition;
use Illuminate\Http\Request;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin() || auth()->user()->isMember()) {
            $packages = Package::join('participant_types','participant_types.id','=','packages.ParticipantType')->leftjoin('models','models.id','=','packages.Stalls')->select('packages.*','participant_types.Type','models.Name as Stalls')->get();
        } else {
            $packages = Package::join('participant_types','participant_types.id','=','packages.ParticipantType')->leftjoin('models','models.id','=','packages.Stalls')->where('packages.id','=',auth()->user()->id)->select('packages.*','participant_types.Type','models.Name as Stalls')->get();
        }

        return view('packages.index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ParticipantType $participantTypeModel, Models $modelsModel)
    {
        return view('packages.create', [
            'participanttypes' => $participantTypeModel->get(['id', 'Type']),
            'models' => $modelsModel->where('Type','=','Stall')->get(['id', 'Name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request, Package $model)
    {
        if(!empty($request->Stalls))
        {
            $stall = implode(',', $request->Stalls);
        }
        $package = $model->create($request->merge([
            'Status' =>1,
            'WebPage' =>'On',
            'Stalls' =>$stall ?? NULL
        ])->all());

        return redirect()->route('package.index')->withStatus(__('Packages successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $participanttypes = ParticipantType::all();
        $models = Models::where('Type','=','Stall')->get();
        $selectdStall = explode(',', $package->Stalls);
        return view('packages.edit', compact('package','participanttypes','models','selectdStall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        if(!empty($request->Stalls))
        {
            $stall = implode(',', $request->Stalls);
        }
        $package->update(
            $request->merge([
                'Status' =>1,
                'WebPage' =>'On',
                'Stalls' =>$stall ?? NULL
            ])->all()
        );

        return redirect()->route('package.index')->withStatus(__('Packages successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        if(Exhibition::whereRaw("find_in_set(".$package->id.",Packages)")->select('id')->exists() && Participant::where('Package','=',$package->id)->select('id')->exists())
        {
            return redirect()->route('package.index')->withStatus(__('Package Use By An Exhibitions And Participants.'));
        }
        if(Exhibition::whereRaw("find_in_set(".$package->id.",Packages)")->select('id')->exists())
        {
            return redirect()->route('package.index')->withStatus(__('Package Use By An Exhibitions.'));
        }
        if(Participant::where('Package','=',$package->id)->select('id')->exists())
        {
            return redirect()->route('package.index')->withStatus(__('Package Use By A Participants.'));
        }
        else
        {
            $package->delete();
        }

        return redirect()->route('package.index')->withStatus(__('Packages successfully deleted.'));
    }
}
