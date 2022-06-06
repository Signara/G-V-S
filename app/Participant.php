<?php

namespace App;

use App\User;
use App\Package;
use App\Exhibition;
use App\Company;
use App\ParticipantType;
use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Exhibition', 'Company', 'ParticipantType', 'Package', 'StartDate', 'StartTime', 'EndDate', 'EndTime', 'Admins', 'Status','products_allowed', 'Products',
    ];

    /**
     * Get the exhibition of the hall
     *
     * @return \App\Exhibition
     */
    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }

    /**
     * Get the company of the hall
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the participanttype of the hall
     *
     * @return \App\ParticipantType
     */
    public function participanttype()
    {
        return $this->belongsTo(ParticipantType::class);
    }

    /**
     * Get the package of the hall
     *
     * @return \App\Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the user of the hall
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
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
