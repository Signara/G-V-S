<?php

namespace App;

use App\Exhibition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionRelGallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'gallery', 'ExhibitionId',
    ];

    /**
     * Get the exhibitionrelgallery of the exhibition
     *
     * @return \App\Exhibition
     */
    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }

    /**
     * Get the path to the Model
     *
     * @return string
     */
    public function multiplepath()
    {
        return "/storage/{$this->gallery}";
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
