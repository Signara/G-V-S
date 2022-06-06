<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newsletter_email', 'newsletter',
    ];

    /**
     * Get the route key for the newsletter.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
