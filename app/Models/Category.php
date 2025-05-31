<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Category extends Model
{
    //
    use Translatable,HasFactory;
    public $translatedAttributes = ['name'];

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function transaltions()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }
}
