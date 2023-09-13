<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable=['name','property_types'];

    public $timestamps = false;

    public static  function filterPropertyType( $propertyTypeId )
    {
        return Amenity::where('property_types','like', '%'.$propertyTypeId.'%');
    }
}
