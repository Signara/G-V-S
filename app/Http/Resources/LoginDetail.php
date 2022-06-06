<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class LoginDetail extends JsonResource
{
    public function toArray($request)
    {
        $companyData = $this->getCompanyName($this->CompanyID);
        $fcmTokenId = $this->getFcm($this->id);
        $tokenData = $this->getToken($this->id,$fcmTokenId);
        if(!empty($companyData->CommonName))
        {
            if($companyData->Logo == NULL)
            {
                return [
                    'id' => $this->id,
                    'Name' => $this->name,
                    'Email' => $this->email,
                    'Phone' => $this->Phone,
                    'Picture' => asset("storage/$this->picture"),
                    'Designation' => $this->Designation,
                    'CompanyID' => $this->CompanyID ?? 0,
                    'CompanyCommonName' => $companyData->CommonName,
                    'CompanyRegisteredName' => $companyData->RegisteredName ?? '',
                    'CompanyEmail' => $companyData->Email ?? '',
                    'CompanyPhone' => $companyData->Phone ?? 0,
                    'CompanyWebsite' => $companyData->Website ?? '',
                    'CompanyDescription' => $companyData->Description ?? '',
                    'CompanyAddress' => $companyData->Address ?? '',
                    'CompanyLogo' => '',
                    'user_character' => $this->user_character,
                    'role_id' => $this->role_id,
                    'Verification' => $this->Verification,
                    'token' => $tokenData,
                ];
            }
            else if($this->picture == NULL)
            {
                return [
                    'id' => $this->id,
                    'Name' => $this->name,
                    'Email' => $this->email,
                    'Phone' => $this->Phone,
                    'Picture' => '',
                    'Designation' => $this->Designation,
                    'CompanyID' => $this->CompanyID ?? 0,
                    'CompanyCommonName' => $companyData->CommonName,
                    'CompanyRegisteredName' => $companyData->RegisteredName ?? '',
                    'CompanyEmail' => $companyData->Email ?? '',
                    'CompanyPhone' => $companyData->Phone ?? 0,
                    'CompanyWebsite' => $companyData->Website ?? '',
                    'CompanyDescription' => $companyData->Description ?? '',
                    'CompanyAddress' => $companyData->Address ?? '',
                    'CompanyLogo' => asset("storage/$companyData->Logo"),
                    'user_character' => $this->user_character,
                    'role_id' => $this->role_id,
                    'Verification' => $this->Verification,
                    'token' => $tokenData,
                ];
            }
            else 
            {
                return [
                    'id' => $this->id,
                    'Name' => $this->name,
                    'Email' => $this->email,
                    'Phone' => $this->Phone,
                    'Picture' => asset("storage/$this->picture"),
                    'Designation' => $this->Designation,
                    'CompanyID' => $this->CompanyID ?? 0,
                    'CompanyCommonName' => $companyData->CommonName,
                    'CompanyRegisteredName' => $companyData->RegisteredName ?? '',
                    'CompanyEmail' => $companyData->Email ?? '',
                    'CompanyPhone' => $companyData->Phone ?? 0,
                    'CompanyWebsite' => $companyData->Website ?? '',
                    'CompanyDescription' => $companyData->Description ?? '',
                    'CompanyAddress' => $companyData->Address ?? '',
                    'CompanyLogo' => asset("storage/$companyData->Logo"),
                    'user_character' => $this->user_character,
                    'role_id' => $this->role_id,
                    'Verification' => $this->Verification,
                    'token' => $tokenData,
                ];
            }
        }
        else
        {
            if($companyData->Logo == NULL)
            {
                return [
                    'id' => $this->id,
                    'Name' => $this->name,
                    'Email' => $this->email,
                    'Phone' => $this->Phone,
                    'Picture' => asset("storage/$this->picture"),
                    'Designation' => $this->Designation,
                    'CompanyID' => $this->CompanyID ?? 0,
                    'CompanyCommonName' => '',
                    'CompanyRegisteredName' => $companyData->RegisteredName ?? '',
                    'CompanyEmail' => $companyData->Email ?? '',
                    'CompanyPhone' => $companyData->Phone ?? 0,
                    'CompanyWebsite' => $companyData->Website ?? '',
                    'CompanyDescription' => $companyData->Description ?? '',
                    'CompanyAddress' => $companyData->Address ?? '',
                    'CompanyLogo' => '',
                    'user_character' => $this->user_character,
                    'role_id' => $this->role_id,
                    'Verification' => $this->Verification,
                    'token' => $tokenData,
                ];
            }
            else if($this->picture == NULL)
            {
                return [
                    'id' => $this->id,
                    'Name' => $this->name,
                    'Email' => $this->email,
                    'Phone' => $this->Phone,
                    'Picture' => '',
                    'Designation' => $this->Designation,
                    'CompanyID' => $this->CompanyID ?? 0,
                    'CompanyCommonName' => '',
                    'CompanyRegisteredName' => $companyData->RegisteredName ?? '',
                    'CompanyEmail' => $companyData->Email ?? '',
                    'CompanyPhone' => $companyData->Phone ?? 0,
                    'CompanyWebsite' => $companyData->Website ?? '',
                    'CompanyDescription' => $companyData->Description ?? '',
                    'CompanyAddress' => $companyData->Address ?? '',
                    'CompanyLogo' => '',
                    'user_character' => $this->user_character,
                    'role_id' => $this->role_id,
                    'Verification' => $this->Verification,
                    'token' => $tokenData,
                ];
            }
            else 
            {
                return [
                    'id' => $this->id,
                    'Name' => $this->name,
                    'Email' => $this->email,
                    'Phone' => $this->Phone,
                    'Picture' => asset("storage/$this->picture"),
                    'Designation' => $this->Designation,
                    'CompanyID' => $this->CompanyID ?? 0,
                    'CompanyCommonName' => '',
                    'CompanyRegisteredName' => $companyData->RegisteredName ?? '',
                    'CompanyEmail' => $companyData->Email ?? '',
                    'CompanyPhone' => $companyData->Phone ?? 0,
                    'CompanyWebsite' => $companyData->Website ?? '',
                    'CompanyDescription' => $companyData->Description ?? '',
                    'CompanyAddress' => $companyData->Address ?? '',
                    'CompanyLogo' => '',
                    'user_character' => $this->user_character,
                    'role_id' => $this->role_id,
                    'Verification' => $this->Verification,
                    'token' => $tokenData,
                ];
            }
        }
    }

    public function getCompanyName($companyid)
    {
        $companydata = DB::table('companies')->where('id','=',$companyid)->select('CommonName','RegisteredName','Email','Phone','Website','Description','Address','Logo')->first();
        return $companydata;
    }

    public function getFcm($usersid)
    {
        $fcmtokenid = DB::table('user_tokens')->where('user_id','=',$usersid)->select('FcmToken')->orderBy('created_at', 'DESC')->first();
        return $fcmtokenid->FcmToken;
    }

    public function getToken($userid,$fcmtoken)
    {
        $tokendata = DB::table('user_tokens')->where('user_id','=',$userid)->where('FcmToken','=',$fcmtoken)->select('Token')->orderBy('created_at', 'DESC')->first();
        return $tokendata->Token;
    }
}
