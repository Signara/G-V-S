<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode',
    ];

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
     * Get the route key for the article.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
