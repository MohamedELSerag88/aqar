<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    use Translatable, HasFactory;
    protected $fillable = ['country_id'];
    protected $casts = [
        'location' => 'array',
    ];
    public $translatedAttributes = ['name'];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function districts(){
        return $this->hasMany(District::class);
    }

    public function transaltions()
    {
        return $this->hasMany(CityTranslation::class);
    }

    protected static function newFactory()
    {
        return CityFactory::new();
    }
}
