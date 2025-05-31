<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\DirectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    //
    use Translatable, HasFactory;
    protected $fillable = ['city_id'];

    public $translatedAttributes = ['name'];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function transaltions()
    {
        return $this->hasMany(DirectionTranslation::class);
    }
    protected static function newFactory()
    {
        return DirectionFactory::new();
    }
}
