<?php

namespace App;

use App\Sector;
use App\Category;
use App\Tag;
use App\Package;
use App\Company;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Image', 'Banner', 'Name', 'slug', 'Description', 'Sector', 'Category', 'Tag', 'StartDate', 'StartTime', 'EndDate', 'EndTime', 'Packages', 'Organiser', 'Admins', 'Status','keywords','PDF','facebook','twitter','instagram','youtube','linkedin','display_name','info_image','android_link','ios_link',
    ];

    /**
     * Get the category of the exhibition
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tags of the exhibition
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the sector of the exhibition
     *
     * @return \App\Sector
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Get the package of the exhibition
     *
     * @return \App\Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the company of the exhibition
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user of the exhibition
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the path to the Model
     *
     * @return string
     */
    public function path()
    {
        return "/storage/{$this->Image}";
    }

    /**
     * Get the path to the Model
     *
     * @return string
     */
    public function paths()
    {
        return "/storage/{$this->Banner}";
    }

    /**
     * Get the path to the Model
     *
     * @return string
     */
    public function pathssss()
    {
        return "/storage/{$this->info_image}";
    }

    /**
     * Get the path to the Model
     *
     * @return string
     */
    public function pathss()
    {
        return "/storage/{$this->PDF}";
    }

    /**
     * Get the route key for the models.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
