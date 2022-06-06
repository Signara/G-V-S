<?php
/*

 =========================================================
 * Material Blog PRO Laravel - v1.0.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/material-dashboard-pro-laravel
 * Copyright 2019 Creative Tim (http://www.creative-tim.com) & UPDIVISION (http://www.updivision.com)

 * Designed by www.invisionapp.com Coded by www.creative-tim.com & www.updivision.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */
namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Company;
use App\CountryCode;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::leftjoin('roles','roles.id','=','users.role_id')->leftjoin('companies','companies.id','=','users.CompanyID')->select('users.*','roles.name as role_name','companies.CommonName as company_name')->get();
        //$this->authorize('manage-users', User::class);

        return view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user
     *
     * @param  \App\Role  $model
     * @return \Illuminate\View\View
     */
    public function create(Role $model, Company $companyModel , CountryCode $countryCode)
    {
        return view('dashboard.users.create', ['roles' => $model->get(['id', 'name']),'companies' => $companyModel->get(['id', 'CommonName']),'countrycodes' => $countryCode->get(['id', 'iso3','phonecode'])]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $user = $model->create($request->merge([
            'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
            'password' => Hash::make($request->get('password')),
            'Verification' => 1
        ])->all());

        $title = 'Registration Successful- World of possibilities awaits you';
        if(!empty($user->email))
        {
            $emails = $user->email;

            Mail::send('emails.registrationcomplete', ['name' => $user->name] , function($message) use($title,$emails){
            $message->to($emails)
                    ->subject($title);
            $message->from('dweekstudios@gmail.com','Virtu Expo');
            });
        }

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @param  \App\Role  $model
     * @return \Illuminate\View\View
     */
    public function edit(User $user, Role $model, Company $companyModel , CountryCode $countryCode)
    {
        return view('dashboard.users.edit', ['user' => $user->load('role'), 'roles' => $model->get(['id', 'name']),'user' => $user->load('company'), 'companies' => $companyModel->get(['id', 'CommonName']),'countrycodes' => $countryCode->get(['id', 'iso3','phonecode'])]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : $user->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([$hasPassword ? '' : 'password'])
        );

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
