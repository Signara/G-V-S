<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use DB;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Visitor $model)
    {
        $role = DB::table('roles')->where('id','=',auth()->user()->role_id)->select('name')->first();
        if ($role->name == 'Member')
        {
            $visitors = Visitor::join('exhibitions','exhibitions.id','=','visitors.Exhibition')->join('users','users.id','=','visitors.Visitor')->join('companies','companies.id','=','visitors.Companies')->whereRaw("find_in_set(".auth()->user()->id.",companies.CompanyAdminUserIDs)")->select('visitors.*','users.name as Visitor','exhibitions.name as Exhibition')->get();
        }
        else
        {
            $visitors = Visitor::join('exhibitions','exhibitions.id','=','visitors.Exhibition')->join('users','users.id','=','visitors.Visitor')->join('companies','companies.id','=','visitors.Companies')->select('visitors.*','users.name as Visitor','exhibitions.name as Exhibition')->get();
        }
        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
