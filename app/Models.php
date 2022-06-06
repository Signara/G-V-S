<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Image', 'Name', 'Description', 'xValue', 'yValue', 'zValue', 'Model', 'Type', 'Status','prefabName','CompanyID',
    ];

    /**
     * Get the path to the Image
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
        return "/storage/{$this->Model}";
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
