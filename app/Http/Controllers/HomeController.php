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

use App\Http\Controllers\Blog\BlogController;
use App\User;
use App\Article;
use App\Exhibition;
use App\Company;
use App\Tag;
use App\Sector;
use Illuminate\Http\Request;
use DB;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends BlogController
{
    /**
     * Show the application home
     *
     * @return \Illuminate\View\View
     */
    public function index(User $user, Article $article)
    {
        $featuredtags = Tag::where('name','=','Featured')->select('id')->first();
        $threesixtytags = Tag::where('name','=','360 Days')->select('id')->first();
        $trendingtags = Tag::where('name','=','Trending')->select('id')->first();
        $livetags = Tag::where('name','=','Live')->select('id')->first();

        $curdate = date('Y-m-d');

        $industries = Sector::orderBy('created_at', 'desc')->take(8)->get();

        $featured_articles = [];

        if(!empty($featuredtags))
        {
            $featured_articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->whereRaw("find_in_set(".$featuredtags->id.",exhibitions.Tag)")->where('exhibitions.StartDate','<=',$curdate)->where('exhibitions.EndDate','>=',$curdate)->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->take(3)->get();
        }

        $threesixty_articles = [];

        if(!empty($threesixtytags))
        {
            $threesixty_articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->whereRaw("find_in_set(".$threesixtytags->id.",exhibitions.Tag)")->where('exhibitions.StartDate','<=',$curdate)->where('exhibitions.EndDate','>=',$curdate)->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->take(3)->get();
        }

        $trending_articles = [];

        if(!empty($trendingtags))
        {
            $trending_articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->whereRaw("find_in_set(".$trendingtags->id.",exhibitions.Tag)")->where('exhibitions.StartDate','<=',$curdate)->where('exhibitions.EndDate','>=',$curdate)->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->take(3)->get();
        }

        $live_articles = [];

        if(!empty($livetags))
        {
            $live_articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->whereRaw("find_in_set(".$livetags->id.",exhibitions.Tag)")->where('exhibitions.StartDate','<=',$curdate)->where('exhibitions.EndDate','>=',$curdate)->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->take(3)->get();
        }

        $latest_articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->where('exhibitions.StartDate','<=',$curdate)->where('exhibitions.EndDate','>=',$curdate)->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->take(3)->get();
        //$authors = $user->userIsAuthor()->take(4)->get();

        return view('blog.home', compact(['featured_articles', 'latest_articles', 'threesixty_articles', 'trending_articles', 'live_articles', 'industries']));
    }

    public function generateotp()
    {
        return view('generateotp');
    }

    public function otp()
    {
        return view('otp');
    }

    public function sendotp(Request $request)
    {
        $otp = rand(1111,9999);
        $otpdatetime = date('Y-m-d h:i:s');
        $emails = $request->email;
        $title = 'Send OTP';

        if(is_numeric($emails))
        {
            $user = DB::table('users')->where('phone','=',$emails)->select('name')->first();
        }
        else
        {
            $user = DB::table('users')->where('email','=',$emails)->select('name')->first();
        }

        if(is_numeric($emails))
        {
            DB::table('users')
            ->where('Phone', $emails)
            ->limit(1)
            ->update(array('OTP' => $otp,'OTPDatetime' => $otpdatetime));
        }
        else
        {
            DB::table('users')
            ->where('email', $emails)
            ->limit(1)
            ->update(array('OTP' => $otp,'OTPDatetime' => $otpdatetime));

            Mail::send('emails.otp', ['name' => $user->name , 'otp' => $otp] , function($message) use($title,$emails){
                $message->to($emails)
                        ->subject($title);
                $message->from('dweekstudios@gmail.com','Virtu Expo');
                });
        }

        return redirect()->route('otp', $emails)->withStatus(__('OTP Sent Successfully.'));
    }

    public function loginotp(Request $request,$emails)
    {
        if(is_numeric($emails))
        {
            $otpdatetime = DB::table('users')->where('OTP','=',$request->OTP)->where('Phone','=',$emails)->select('OTPDatetime','password','email')->first();
        }
        else
        {
            $otpdatetime = DB::table('users')->where('OTP','=',$request->OTP)->where('email','=',$emails)->select('OTPDatetime','password','email')->first();
        }

        if(!empty($otpdatetime->OTPDatetime))
        {
            $curdatetime = date('Y-m-d h:i:s');

            $newtime = date('Y-m-d h:i:s', strtotime('+5 minutes', strtotime($otpdatetime->OTPDatetime)));

            if((!empty($otpdatetime->OTPDatetime)) && ($newtime >= $curdatetime))
            {
                if(is_numeric($emails))
                {
                    DB::table('users')
                    ->where('OTP', $request->OTP)
                    ->where('Phone', $emails)
                    ->limit(1)
                    ->update(array('Verification' => 1,'last_login_at' => $curdatetime,'last_login_ip' => $request->getClientIp()));

                    if(Auth::attempt(['Phone' => $emails, 'OTP' => $request->OTP]))
                    {
                        $request->session()->regenerate();

                        return redirect('/dashboard')->withStatus(__('Login Successfull.'));
                    }
                }
                else
                {
                    DB::table('users')
                    ->where('OTP', $request->OTP)
                    ->where('email', $emails)
                    ->limit(1)
                    ->update(array('Verification' => 1,'last_login_at' => $curdatetime,'last_login_ip' => $request->getClientIp()));

                    if(Auth::attempt(['email' => $emails, 'OTP' => $request->OTP]))
                    {
                        $request->session()->regenerate();

                        return redirect('/dashboard')->withStatus(__('Login Successfull.'));
                    }
                }
            }
            else
            {
                return redirect()->route('home')->withErrors(__('Invalid OTP.'));
            }
        }
        else
        {
            return redirect()->route('otp', $emails)->withErrors(__('Incorrect OTP!'));
        }
    }

    public function authenticate(Request $request)
    {
        if(is_numeric($request->Phone))
        {
            $roleid = DB::table('users')->where('Phone','=',$request->Phone)->select('id','role_id','CompanyID')->first();

            if(empty($roleid))
            {
                return back()->withErrors([
                    'Phone' => 'The provided credentials do not match our records.',
                ]);
            }

            $role = DB::table('roles')->where('id','=',$roleid->role_id)->select('name')->first();

            if($role->name == 'Member')
            {
                if(DB::table('companies')->where('id','=',$roleid->CompanyID)->whereRaw("find_in_set(".$roleid->id.",CompanyAdminUserIDs)")->select('id')->exists())
                {
                    if(Auth::attempt(['Phone' => $request->Phone, 'password' => $request->password]))
                    {
                        $request->session()->regenerate();

                        return redirect()->intended('dashboard');
                    }
                    else
                    {
                        return back()->withErrors([
                            'Phone' => 'The provided credentials do not match our records.',
                        ]);
                    }
                }
                else
                {
                    return back()->withErrors([
                        'Phone' => 'The provided credentials do not match our records.',
                    ]);
                }
            }
            else if(Auth::attempt(['Phone' => $request->Phone, 'password' => $request->password]))
            {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'Phone' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {
            $roleid = DB::table('users')->where('email','=',$request->Phone)->select('id','role_id','CompanyID')->first();

            if(empty($roleid))
            {
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }

            $role = DB::table('roles')->where('id','=',$roleid->role_id)->select('name')->first();

            if($role->name == 'Member')
            {
                if(DB::table('companies')->where('id','=',$roleid->CompanyID)->whereRaw("find_in_set(".$roleid->id.",CompanyAdminUserIDs)")->select('id')->exists())
                {
                    if(Auth::attempt(['email' => $request->Phone, 'password' => $request->password]))
                    {
                        $request->session()->regenerate();

                        return redirect()->intended('dashboard');
                    }
                    else
                    {
                        return back()->withErrors([
                            'email' => 'The provided credentials do not match our records.',
                        ]);
                    }
                }
                else
                {
                    return back()->withErrors([
                        'email' => 'The provided credentials do not match our records.',
                    ]);
                }
            }
            else if(Auth::attempt(['email' => $request->Phone, 'password' => $request->password]))
            {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

}
