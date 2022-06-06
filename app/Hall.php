<?php

namespace App;

use App\Exhibition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Exhibition', 'SrNo', 'Name', 'Description', 'StartDate', 'StartTime', 'Status', 'FloorColor',
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
     * Get the route key for the models.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
