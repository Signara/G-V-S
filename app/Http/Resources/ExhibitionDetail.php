<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class ExhibitionDetail extends JsonResource
{
    public function toArray($request)
    {
        $sectorData = $this->getSectorName($this->Sector);
        $categoryData = $this->getCategoryName($this->Category);
        $tagData = $this->getTagName($this->Tag);
        $packageData = $this->getPackageName($this->Packages);
        $organiserData = $this->getOrganiserName($this->Organiser);
        if($this->Image == NULL && $this->Banner == NULL && $this->info_image == NULL && $this->PDF == NULL)
        {
            return [
                'Image' => NULL,
                'Banner' => NULL,
                'info_image' => NULL,
                'PDF' => NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Image == NULL && $this->Banner == NULL && $this->info_image == NULL)
        {
            return [
                'Image' => NULL,
                'Banner' => NULL,
                'info_image' => NULL,
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Banner == NULL && $this->info_image == NULL && $this->PDF == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => NULL,
                'info_image' => NULL,
                'PDF' => NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Image == NULL && $this->Banner == NULL)
        {
            return [
                'Image' => NULL,
                'Banner' => NULL,
                'info_image' => asset("storage/$this->info_image"),
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->info_image == NULL && $this->PDF == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => asset("storage/$this->Banner"),
                'info_image' => NULL,
                'PDF' => NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Banner == NULL && $this->info_image == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => NULL,
                'info_image' => NULL,
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Banner == NULL && $this->PDF == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => NULL,
                'info_image' => asset("storage/$this->info_image"),
                'PDF' => NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Image == NULL && $this->info_image == NULL)
        {
            return [
                'Image' => NULL,
                'Banner' => asset("storage/$this->Banner"),
                'info_image' => NULL,
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Image == NULL && $this->PDF == NULL)
        {
            return [
                'Image' => NULL,
                'Banner' => asset("storage/$this->Banner"),
                'info_image' => asset("storage/$this->info_image"),
                'PDF' => NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Image == NULL)
        {
            return [
                'Image' => NULL,
                'Banner' => asset("storage/$this->Banner"),
                'info_image' => asset("storage/$this->info_image"),
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->Banner == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => NULL,
                'info_image' => asset("storage/$this->info_image"),
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->info_image == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => asset("storage/$this->Banner"),
                'info_image' => NULL,
                'PDF' => asset("storage/$this->PDF"),
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else if($this->PDF == NULL)
        {
            return [
                'Image' => asset("storage/$this->Image"),
                'Banner' => asset("storage/$this->Banner"),
                'info_image' => asset("storage/$this->info_image"),
                'PDF' => NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
        else
        {
            return [
                'Image' => asset("storage/$this->Image") ?? NULL,
                'Banner' => asset("storage/$this->Banner") ?? NULL,
                'info_image' => asset("storage/$this->info_image") ?? NULL,
                'PDF' => asset("storage/$this->PDF") ?? NULL,
                'Name' => $this->Name,
                'DisplayName' => $this->display_name,
                'Description' => $this->Description ?? '',
                'Sector' => $sectorData,
                'Category' => $categoryData,
                'Tag' => $tagData,
                'StartDate' => $this->StartDate,
                'StartTime' => $this->StartTime,
                'EndDate' => $this->EndDate,
                'EndTime' => $this->EndTime,
                'Packages' => $packageData,
                'Organiser' => $organiserData,
            ];
        }
    }

    public function getSectorName($sectorId)
    {
        $sectorList = [];
        $sectordata = DB::table('sectors')->whereIn('id', explode(',',$sectorId))->select('name')->get()->toArray();

        foreach ($sectordata as $sect)
        {
            $sectorList[] = $sect->name;
        }
        $sectorName = '';
        $sectorName = implode(', ', $sectorList);
        return $sectorName;
    }

    public function getCategoryName($categoryId)
    {
        $categoryList = [];
        $categorydata = DB::table('categories')->whereIn('id', explode(',',$categoryId))->select('name')->get()->toArray();

        foreach ($categorydata as $cat)
        {
            $categoryList[] = $cat->name;
        }
        $categoryName = '';
        $categoryName = implode(', ', $categoryList);
        return $categoryName;
    }

    public function getTagName($tagId)
    {
        $tagList = [];
        $tagdata = DB::table('tags')->whereIn('id', explode(',',$tagId))->select('name')->get()->toArray();

        foreach ($tagdata as $tag)
        {
            $tagList[] = $tag->name;
        }
        $tagName = '';
        $tagName = implode(', ', $tagList);
        return $tagName;
    }

    public function getPackageName($packageId)
    {
        $packageList = [];
        $packagedata = DB::table('packages')->whereIn('id', explode(',',$packageId))->select('Name')->get()->toArray();

        foreach ($packagedata as $package)
        {
            $packageList[] = $package->Name;
        }
        $packageName = '';
        $packageName = implode(', ', $packageList);
        return $packageName;
    }

    public function getOrganiserName($companyId)
    {
           $company = DB::table('companies')->select('CommonName')->where('id', $companyId)->first();
           return $company->CommonName;
    }
}
