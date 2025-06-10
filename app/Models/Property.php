<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Property extends Model
{
    //
    use Translatable, HasFactory;
    protected $fillable = [
        'price',
        'area',
        'age',
        'street_width',
        'bathrooms',
        'halls',
        'apartments',
        'bedrooms',
        'purpose',
        'category_id',
        'user_id',
        'district_id',
        'latitude',
        'longitude',
        'floors',
        'furnished',
        'rent_type'
    ];
    protected $casts = [
    ];

    public $filterColumns =[
        'floors',
        'bathrooms',
        'halls',
        'bedrooms',
        'age',
        'furnished',
        'rent_type'
    ];

    public $translatedAttributes = ['title','description'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function features(){
        return $this->belongsToMany(Feature::class,'property_features');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaltions()
    {
        return $this->hasMany(PropertyTranslation::class);
    }

    protected static function newFactory()
    {
        return PropertyFactory::new();
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }


}
