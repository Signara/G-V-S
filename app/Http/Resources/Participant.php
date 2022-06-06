<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class Participant extends JsonResource
{
    public function toArray($request)
    {
        $participantTypeData = $this->getParticipantType($this->ParticipantType);
        $packageData = $this->getPackageName($this->Package);
        $companyData = $this->getOrganiserName($this->Company);
        $userData = $this->getAdminName($this->Admins);
        $layoutData = $this->getLayout($this->Company,$this->Exhibition);
        return [
            'ParticipantID' => $this->id,
            'CompanyID' => $this->Company,
            'ExhibitionID' => $this->Exhibition,
            'CompanyData' => $companyData,
            'ParticipantType' => $participantTypeData,
            'PackageID' => $this->Package,
            'PackageName' => $packageData,
            'StartDate' => $this->StartDate,
            'StartTime' => $this->StartTime,
            'EndDate' => date('m/d/Y', strtotime($this->EndDate)),
            'EndTime' => $this->EndTime,
            'layout' => $layoutData,
        ];
    }

    public function getParticipantType($participantTypeId)
    {
        $participanttypes = DB::table('participant_types')->where('id','=',$participantTypeId)->select('Type')->first();

        return $participanttypes->Type;
    }

    public function getPackageName($packageId)
    {
        $package = DB::table('packages')->where('id','=',$packageId)->select('Name')->first();

        return $package->Name;
    }

    public function getOrganiserName($companyId)
    {
           $companies = DB::table('companies')->select('*')->where('id', $companyId)->get()->toArray();

           $company = [];

           foreach ($companies as $key => $value)
           {
               $company[$key]['ID'] = $value->id;
               $company[$key]['CommonName'] = $value->CommonName;
               $company[$key]['Email'] = $value->Email ?? '';
               $company[$key]['Phone'] = $value->Phone ?? '';
               $company[$key]['Website'] = $value->Website ?? '';
               $company[$key]['Logo'] = asset("storage/$value->Logo") ?? '';
               $company[$key]['Sectors'] = $value->Sectors ?? 0;
               $company[$key]['Categories'] = $value->Categories ?? '';
               $company[$key]['CompanyLink'] = asset("company/$value->slug");
           }

           return $company;
    }

    public function getLayout($companyId,$exhibitionId)
    {
           $layout = DB::table('layouts')->select('*')->where('CompanyID', $companyId)->where('ExhibtionID', $exhibitionId)->get();
           return $layout;
    }

    public function getAdminName($userId)
    {
        $adminList = [];
        $admindata = DB::table('users')->whereIn('id', explode(',',$userId))->select('name')->get()->toArray();

        foreach ($admindata as $admin)
        {
            $adminList[] = $admin->name;
        }
        $userName = '';
        $userName = implode(', ', $adminList);
        return $userName;
    }
}
