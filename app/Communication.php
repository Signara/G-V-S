<?php

namespace App;

use App\Company;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Visitor', 'Company', 'CompanyUser', 'ChatID', 'Type', 'Message', 'CreatedAt',
    ];

    /**
     * Get the company of the communication
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user of the communication
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the route key for the communication.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
