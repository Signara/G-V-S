<?php

namespace App;

use App\Sector;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CommonName', 'slug', 'RegisteredName', 'Email', 'Phone', 'Website', 'Description', 'Address', 'Logo', 'Sectors', 'Categories', 'CompanyAdminUserIDs','keywords','facebook','twitter','instagram','youtube','linkedin',
    ];

    /**
     * Get the category of the article
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the sector of the article
     *
     * @return \App\Sector
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Get the user of the article
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the path to the picture
     *
     * @return string
     */
    public function path()
    {
        return "/storage/{$this->Logo}";
    }

    /**
     * Get the route key for the article.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
