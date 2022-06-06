<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionalMaterial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Title', 'Company', 'Type', 'File', 'Thumbnail', 'Status',
    ];

    /**
     * Get the company of the promotionalmaterial
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the path to the File
     *
     * @return string
     */
    public function path()
    {
        return "/storage/{$this->File}";
    }

    /**
     * Get the path to the Thumbnail
     *
     * @return string
     */
    public function paths()
    {
        return "/storage/{$this->Thumbnail}";
    }

    /**
     * Get the route key for the promotionalmaterial.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
