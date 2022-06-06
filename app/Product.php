<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Company', 'Description', 'Image', 'Status', 'Price',
    ];

    /**
     * Get the company of the product
     *
     * @return \App\Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

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
     * Get the route key for the products.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
