<?php

namespace App\Http\Controllers;

use App\Participant;
use App\User;
use App\Package;
use App\Exhibition;
use App\Company;
use App\ParticipantType;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ParticipantRequest;
use DB;
use Mail;

class ParticipantController extends Controller
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
            $participants = Participant::join('exhibitions','exhibitions.id','=','participants.Exhibition')->join('companies','companies.id','=','participants.Company')->join('packages','packages.id','=','participants.Package')->join('users','users.id','=','participants.Admins')->join('participant_types','participant_types.id','=','participants.ParticipantType')->where('participants.Exhibition','=',$exhibition->id)->where('participants.id','=',auth()->user()->id)->select('participants.*','exhibitions.Name as Exhibition','companies.CommonName as Company','packages.Name as Package','users.name as User','participant_types.Type as ParticipantType')->get();
        } else {
            $participants = Participant::join('exhibitions','exhibitions.id','=','participants.Exhibition')->join('companies','companies.id','=','participants.Company')->join('packages','packages.id','=','participants.Package')->join('users','users.id','=','participants.Admins')->join('participant_types','participant_types.id','=','participants.ParticipantType')->where('participants.Exhibition','=',$exhibition->id)->select('participants.*','exhibitions.Name as Exhibition','companies.CommonName as Company','packages.Name as Package','users.name as User','participant_types.Type as ParticipantType')->get();
        }

        return view('exhibitions.participants.index', ['participants' => $participants , 'exhibition' => $exhibition]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exhibition $exhibition)
    {
        $exhpckg = explode(',', $exhibition->Packages);
        $packages = DB::table('packages')->whereIn('id',$exhpckg)->select('id','Name')->get();
        $companies = Company::all();
        $users = User::all();
        $participanttypes = ParticipantType::all();
        return view('exhibitions.participants.create',compact('exhibition','packages','companies','users','participanttypes'));
    }

    public function getPackages(Request $request)
    {
        $packages = Package::where('ParticipantType',$request->id)->pluck('Name','id');
        return response()->json($packages);
    }

    public function getProducts(Request $request)
    {
        $products = Product::where('Company',$request->id)->pluck('Name','id');
        return response()->json($products);
    }

    public function getUsers(Request $request)
    {
        $users = User::where('CompanyID',$request->id)->pluck('name','id');
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exhibition $exhibition, ParticipantRequest $request, Participant $model)
    {
        $enddatetitme = $request->EndDate.' '.$request->EndTime;

        $convertenddatetime = date('Y-m-d H:i:s',strtotime($enddatetitme));

        if(!empty($request->Products))
        {
            $participant = $model->create($request->merge([
                'Exhibition' =>$exhibition->id,
                'Admins' =>implode(',', $request->Admins),
                'Products' =>implode(',', $request->Products),
                'EndDate' => $convertenddatetime,
                'Status' =>1
            ])->all());
        }
        else
        {
            $participant = $model->create($request->merge([
                'Exhibition' =>$exhibition->id,
                'Admins' =>implode(',', $request->Admins),
                'Products' => '',
                'EndDate' => $convertenddatetime,
                'Status' =>1
            ])->all());
        }

        if(!empty($participant->Company) && !empty($participant->Exhibition))
        {
            $companydata = Company::where('id','=',$participant->Company)->select('Email','CommonName')->first();

            $exhibitiondata = Exhibition::where('id','=',$participant->Exhibition)->select('Name','StartDate','EndDate')->first();

            if(!empty($companydata) && !empty($exhibitiondata))
            {
                if(!empty($companydata->Email))
                {
                    $title = 'Your Stall has been booked!';
                    $emails = $companydata->Email;

                    Mail::send('emails.stallbooked', ['exhbtnname' => $exhibitiondata->Name , 'companyname' => $companydata->CommonName , 'startdate' => $exhibitiondata->StartDate , 'enddate' => $exhibitiondata->EndDate] , function($message) use($title,$emails){
                    $message->to($emails)
                            ->subject($title);
                    $message->from('dweekstudios@gmail.com','Virtu Expo');
                    });
                }
            }
        }

        return redirect()->route('participant.index', $exhibition)->withStatus(__('Participant successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibition $exhibition, Participant $participant)
    {
        $exhpckg = explode(',', $exhibition->Packages);
        $packages = DB::table('packages')->whereIn('id',$exhpckg)->select('id','Name')->get();
        $companies = Company::all();
        $participanttypes = ParticipantType::all();
        $users = User::where('CompanyID','=',$participant->Company)->select('id','name')->get();
        $products = Product::where('Company','=',$participant->Company)->select('id','Name')->get();
        $selectedUser = explode(',', $participant->Admins);
        $selectedProduct = explode(',', $participant->Products);
        return view('exhibitions.participants.edit', compact('exhibition','participant','users','selectedUser','packages','companies','participanttypes','products','selectedProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Exhibition $exhibition, ParticipantRequest $request, Participant $participant)
    {
        $enddatetitme = $request->EndDate.' '.$request->EndTime;

        $convertenddatetime = date('Y-m-d H:i:s',strtotime($enddatetitme));

        if(!empty($request->Products))
        {
            $participant->update(
                $request->merge([
                    'Exhibition' => $exhibition->id,
                    'Admins' =>implode(',', $request->Admins),
                    'EndDate' => $convertenddatetime,
                    'Products' =>implode(',', $request->Products)
                ])->all()
            );
        }
        else
        {
            $participant->update(
                $request->merge([
                    'Exhibition' => $exhibition->id,
                    'Admins' =>implode(',', $request->Admins),
                    'EndDate' => $convertenddatetime,
                    'Products' => ''
                ])->all()
            );
        }

        return redirect()->route('participant.index', $exhibition)->withStatus(__('Participant successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition, Participant $participant)
    {
        $participant->delete();

        return redirect()->route('participant.index', $exhibition)->withStatus(__('Participant successfully deleted.'));
    }
}
