<?php

namespace App;

use App\ParticipantType;
use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Description', 'Cost', 'ParticipantType', 'Stalls', 'Banners', 'OtherModels', 'WebPage', 'Status', 'VisitorData',
    ];

    /**
     * Get the participanttype of the package
     *
     * @return \App\ParticipantType
     */
    public function participanttype()
    {
        return $this->belongsTo(ParticipantType::class);
    }

    /**
     * Get the models of the package
     *
     * @return \App\Models
     */
    public function models()
    {
        return $this->belongsTo(Models::class);
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
