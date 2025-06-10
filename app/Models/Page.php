<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //;
    use Translatable, HasFactory;
    public $translatedAttributes = ['text'];

    protected $fillable = ['slug'];

    protected static function newFactory()
    {
        return PageFactory::new();
    }

    public function transaltions()
    {
        return $this->hasMany(PageTranslation::class);
    }
}
