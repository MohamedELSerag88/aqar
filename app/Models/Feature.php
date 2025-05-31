<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\FeatureFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    use Translatable, HasFactory;

    public $translatedAttributes = ['name'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function transaltions()
    {
        return $this->hasMany(FeatureTranslation::class);
    }
    protected static function newFactory()
    {
        return FeatureFactory::new();
    }
}
