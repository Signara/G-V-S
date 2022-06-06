<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ExhibtionID', 'HallID', 'CompanyID', 'ModelID', 'Colour1', 'Colour2', 'Banner1', 'Banner2', 'Banner3', 'Banner4', 'Status', 'PX', 'PY', 'PZ', 'RX', 'RY', 'RZ','prefabName','SX','SY','SZ','StallId',
    ];
}
