<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    use Translatable, HasFactory;

    public $translatedAttributes = ['name'];
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function transaltions()
    {
        return $this->hasMany(CountryTranslation::class);
    }

    protected static function newFactory()
    {
        return CountryFactory::new();
    }
}
