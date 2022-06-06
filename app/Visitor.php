<?php

namespace App;

use App\User;
use App\Exhibition;
use App\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Visitor', 'Exhibition', 'Companies',
    ];

    /**
     * Get the exhibition of the visitor
     *
     * @return \App\Exhibition
     */
    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }

    /**
     * Get the company of the visitor
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user of the visitor
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the route key for the visitor.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
