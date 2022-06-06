<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserToken;
use App\Company;
use App\Inquiry;
use DB;
use App\Http\Resources\LoginDetail as LoginDetailResource;
use App\Http\Resources\UserDetail as UserDetailResource;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public $successStatus = 200;
    public $falseStatus = 404;
    public $validationStatus = 400;

    public function login(Request $request)
    {
        if(is_numeric($request->email))
        {
            if(Auth::attempt([
                'Phone' => $request->email,
                'password' => $request->password
            ]))

            {
                $user = Auth::user();

                $input = array(
                'Token' => $user->createToken('MyApp')->accessToken,
                'FcmToken' => $request->FcmToken,
                'user_id' => $user->id
                );

                $usertokens = UserToken::create($input);

                $user = User::find($user->id);
                $user->last_login_at = date('Y-m-d h:i:s');
                $user->last_login_ip = $request->getClientIp();
                $user->save();

                $userdata = User::join('user_tokens','user_tokens.user_id','=','users.id')->where('users.id','=',$user->id)->where('user_tokens.FcmToken','=',$request->FcmToken)->select('users.*','user_tokens.FcmToken')->get();

                return response()->json(['data' => LoginDetailResource::collection($userdata), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
            else
            {
                return response()->json(['result' => false , 'message' => 'Invalid Username or Password. Please try again.', 'statusCode' => 404], $this->falseStatus);
            }
        }
        else
        {
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]))

            {
                $user = Auth::user();

                $input = array(
                'Token' => $user->createToken('MyApp')->accessToken,
                'FcmToken' => $request->FcmToken,
                'user_id' => $user->id
                );

                $usertokens = UserToken::create($input);

                $user = User::find($user->id);
                $user->last_login_at = date('Y-m-d h:i:s');
                $user->last_login_ip = $request->getClientIp();
                $user->save();

                $userdata = User::where('users.id','=',$user->id)->select('users.*')->get();

                $fcm = $request->FcmToken;

                return response()->json(['data' => LoginDetailResource::collection($userdata), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
            }
            else
            {
                return response()->json(['result' => false , 'message' => 'Invalid Username or Password. Please try again.', 'statusCode' => 404], $this->falseStatus);
            }
        }
    }

    public function saveCharacter(Request $request)
    {
        $userid = $request->user_id;
        $usercharacter = $request->user_character;

        if(DB::table('users')->where('id','=',$userid)->exists())
        {
            $user = User::find($userid);
            if(!empty($usercharacter)) { $user->user_character = $usercharacter; }
            $user->save();

            return response()->json(['result' => true , 'message' => 'Save Character Updated Succesfully', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Error.', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function userDetails(Request $request)
    {
        $userid = $request->user_id;

        if(DB::table('users')->where('id','=',$userid)->exists())
        {
            $user = User::where('id','=',$userid)->get();

            return response()->json(['data' => UserDetailResource::collection($user), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'User ID not available.', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function logout(Request $request)
    {
        $fcmtoken = $request->FcmToken;

        if (Auth::check()) {
            $request->user()->token()->revoke();
            $request->user()->token()->delete();

            $usertoken = DB::table('user_tokens')->where('FcmToken','=',$fcmtoken)->delete();

            return response()->json(['result' => true ,'message' => 'Logout Succesfully...', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false,'message' => 'Error'], 401);
        }
    }

    public function userCreate(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $Phone = $request->Phone;
        $Designation = $request->Designation;
        $CompanyID = $request->CompanyID;
        $CountryCode = $request->country_code;

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1'],
            'email' => ['required', 'min:1', 'unique:users'],
            'password' => ['required', 'min:1'],
            'Phone' => ['required', 'min:1', 'max:10', 'unique:users'],
            'Designation' => ['required', 'min:1'],
            'CompanyID' => ['required', 'min:1'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        $input = array(
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'Phone' => $Phone,
            'country_code' => $CountryCode,
            'Designation' => $Designation,
            'CompanyID' => $CompanyID,
            'slug' => strtolower($name),
            'role_id' => 3,
            'OTP' => rand(1000,9999),
            'OTPDatetime' => date('Y-m-d h:i:s'),
            'Verification' => 0
            );

        $user = User::create($input);
        $data['id'] = $user->id;

        if(!empty($user->id))
        {
            $title = 'Send OTP';
            $emails = $user->email;

            Mail::send('emails.otp', ['name' => $user->name , 'otp' => $user->OTP] , function($message) use($title,$emails){
            $message->to($emails)
                    ->subject($title);
            $message->from('dweekstudios@gmail.com','Virtu Expo');
            });

            return response()->json(['data' => $data, 'result' => true , 'message' => 'OTP Send Succesfully', 'statusCode' => 200], $this->successStatus);
        }
    }

    public function verifyOTP(Request $request)
    {
        $otp = $request->OTP;
        $userid = $request->id;
        $fcmtoken = $request->FcmToken;

        $validator = Validator::make($request->all(), [
            'OTP' => ['required', 'min:1'],
            'id' => ['required', 'min:1'],
        ]);
        if($validator->fails())
        {
            return response()->json(['result' => false,'message' => $validator->messages(), 'statusCode' => 400], $this->validationStatus);
        }

        $otpdatetime = DB::table('users')->where('OTP','=',$request->OTP)->where('id','=',$userid)->select('OTPDatetime','id')->first();

        if(!empty($otpdatetime->OTPDatetime))
        {
            $curdatetime = date('Y-m-d h:i:s');

            $newtime = date('Y-m-d h:i:s', strtotime('+5 minutes', strtotime($otpdatetime->OTPDatetime)));

            if((!empty($otpdatetime->id)) && ($newtime >= $curdatetime))
            {
                $user = User::find($otpdatetime->id);
                $user->Verification = 1;
                $user->save();

                if($user->Verification == 1)
                {
                    $input = array(
                    'Token' => $user->createToken('MyApp')->accessToken,
                    'FcmToken' => $request->FcmToken,
                    'user_id' => $user->id
                    );

                    $usertokens = UserToken::create($input);

                    $userd = User::find($user->id);
                    $userd->last_login_at = date('Y-m-d h:i:s');
                    $userd->last_login_ip = $request->getClientIp();
                    $userd->save();

                    $userdata = User::where('users.id','=',$user->id)->select('users.*')->get();

                    return response()->json(['data' => LoginDetailResource::collection($userdata), 'result' => true , 'message' => 'Succesfull', 'statusCode' => 200], $this->successStatus);
                }

                $title = 'Registration Successful- World of possibilities awaits you';
                $emails = $user->email;

                Mail::send('emails.registrationcomplete', ['name' => $user->name] , function($message) use($title,$emails){
                $message->to($emails)
                        ->subject($title);
                $message->from('dweekstudios@gmail.com','Virtu Expo');
                });
            }
            else
            {
                return response()->json(['result' => false , 'message' => 'Invalid OTP.', 'statusCode' => 404], $this->falseStatus);
            }
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Incorrect OTP!.', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function changePassword(Request $request)
    {
        $userid = $request->user_id;
        $newpass = $request->new_password;

        if(!empty($userid) && !empty($newpass)) {
            $user = User::find($request->user_id);
            $user->password = Hash::make($newpass);
            $user->save();

            return response()->json(['result' => true ,'message' => 'Password Successfully Updated!', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false ,'message' => 'Error', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function editProfilePic(Request $request)
    {
        $userid = $request->id;
        $photo = $request->photo;

        if(!empty($userid) && !empty($photo)) {
            $user = User::find($request->id);
            $user->picture = $request->photo ? $request->photo->store('profile', 'public') : null;
            $user->save();

            return response()->json(['result' => true ,'message' => 'Profile Picture Successfully Updated!', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false ,'message' => 'Error', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function getOTP(Request $request)
    {
        $emailorphone = $request->emailorphone;

        if(!empty($emailorphone))
        {
            if(is_numeric($request->emailorphone))
            {
                $getotp = DB::table('users')->where('Phone','=',$emailorphone)->select('id')->first();

                if(empty($getotp))
                {
                    return response()->json(['result' => false ,'message' => 'Not Found Phone', 'statusCode' => 404], $this->falseStatus);
                }

                if(!empty($getotp->id))
                {
                    $user = User::find($getotp->id);
                    $user->OTP = rand(1000,9999);
                    $user->OTPDatetime = date('Y-m-d h:i:s');
                    $user->save();

                    $data = User::where('id','=',$user->id)->select('id')->get();

                    $title = 'Send OTP';
                    $emails = $user->email;

                    Mail::send('emails.otp', ['name' => $user->name , 'otp' => $user->OTP] , function($message) use($title,$emails){
                    $message->to($emails)
                            ->subject($title);
                    $message->from('dweekstudios@gmail.com','Virtu Expo');
                    });

                    return response()->json(['data' => $data, 'result' => true , 'message' => 'OTP Send Succesfully', 'statusCode' => 200], $this->successStatus);
                }
            }
            else
            {
                $getotp = DB::table('users')->where('email','=',$emailorphone)->select('id')->first();

                if(empty($getotp))
                {
                    return response()->json(['result' => false ,'message' => 'Not Found Email', 'statusCode' => 404], $this->falseStatus);
                }

                if(!empty($getotp->id))
                {
                    $user = User::find($getotp->id);
                    $user->OTP = rand(1000,9999);
                    $user->OTPDatetime = date('Y-m-d h:i:s');
                    $user->save();

                    $data = User::where('id','=',$user->id)->select('id')->get();

                    $title = 'Send OTP';
                    $emails = $user->email;

                    Mail::send('emails.otp', ['name' => $user->name , 'otp' => $user->OTP] , function($message) use($title,$emails){
                    $message->to($emails)
                            ->subject($title);
                    $message->from('dweekstudios@gmail.com','Virtu Expo');
                    });

                    return response()->json(['data' => $data, 'result' => true , 'message' => 'OTP Send Succesfully', 'statusCode' => 200], $this->successStatus);
                }
            }
        }
        else
        {
            return response()->json(['result' => false ,'message' => 'Error', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function createInquiry(Request $request)
    {
        $UserID = $request->UserID;
        $CompanyID = $request->CompanyID;
        $ExhibitionID = $request->ExhibitionID;
        $curdatetime = date('Y-m-d h:i:s');
        $description = $request->Description;

        if(!empty($UserID) && !empty($CompanyID) && !empty($ExhibitionID))
        {
            $user = DB::table('users')->where('id','=',$UserID)->select('*')->first();

            $companyname = DB::table('companies')->where('id','=',$user->CompanyID)->select('CommonName')->first();

            $exhibitions = DB::table('exhibitions')->where('id','=',$ExhibitionID)->select('Name')->first();

            $company = DB::table('companies')->where('id','=',$CompanyID)->select('Email')->first();

            $input = array(
                'UserID' => $UserID,
                'CompanyID' => $CompanyID,
                'ExhibitionID' => $ExhibitionID,
                'Date' => $curdatetime,
                'Description' => $description
            );

            $inquiries = Inquiry::create($input);
            $data['id'] = $inquiries->id;

            if(!empty($company->Email))
            {
                $title = 'You have recieved an inquiry form the following user:';
                $emails = $company->Email;

                Mail::send('emails.inquiry', ['Name' => $user->name ,'CompanyName' => $companyname->CommonName , 'Email' => $user->email ,'Phone' => $user->Phone , 'Designation' => $user->Designation , 'Exhibition' => $exhibitions->Name] , function($message) use($title,$emails){
                $message->to($emails)
                        ->subject($title);
                $message->from('dweekstudios@gmail.com','Virtu Expo');
                });
            }

            return response()->json(['data' => $data, 'result' => true , 'message' => 'Inquiry Create Succesfully', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false ,'message' => 'Error', 'statusCode' => 404], $this->falseStatus);
        }
    }

    public function updateUserDetail(Request $request)
    {
        $userid = $request->user_id;
        $name = $request->name;
        $about = $request->about;
        $slug = $request->slug;
        $email = $request->email;
        $roleid = $request->role_id;
        $Phone = $request->Phone;
        $Designation = $request->Designation;
        $CompanyID = $request->CompanyID;
        $usercharacter = $request->user_character;
        $countrycode = $request->country_code;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $youtube = $request->youtube;
        $linkedin = $request->linkedin;

        if(DB::table('users')->where('id','=',$userid)->exists())
        {
            $user = User::find($userid);
            if(!empty($name)) { $user->name = $name; }
            if(!empty($about)) { $user->about = $about; }
            if(!empty($slug)) { $user->slug = $slug; }
            if(!empty($email)) { $user->email = $email; }
            if(!empty($roleid)) { $user->role_id = $roleid; }
            if(!empty($Phone)) { $user->Phone = $Phone; }
            if(!empty($Designation)) { $user->Designation = $Designation; }
            if(!empty($CompanyID)) { $user->CompanyID = $CompanyID; }
            if(!empty($usercharacter)) { $user->user_character = $usercharacter; }
            if(!empty($countrycode)) { $user->country_code = $countrycode; }
            if(!empty($facebook)) { $user->facebook = $facebook; }
            if(!empty($twitter)) { $user->twitter = $twitter; }
            if(!empty($youtube)) { $user->youtube = $youtube; }
            if(!empty($linkedin)) { $user->linkedin = $linkedin; }
            $user->save();

            return response()->json(['result' => true , 'message' => 'User Detail Updated Succesfully', 'statusCode' => 200], $this->successStatus);
        }
        else
        {
            return response()->json(['result' => false , 'message' => 'Error.', 'statusCode' => 404], $this->falseStatus);
        }
    }
}
