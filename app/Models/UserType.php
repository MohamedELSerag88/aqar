<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //

    use Translatable;
    public $translatedAttributes = ['name'];

    public function transaltions()
    {
        return $this->hasMany(UserTypeTranslation::class);
    }
}
