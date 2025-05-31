<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Database\Factories\DistrictFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    use Translatable, HasFactory;
    protected $fillable = [ 'direction_id'];

    public $translatedAttributes = ['name'];

    public function direction(){
        return $this->belongsTo(Direction::class);
    }

    public function transaltions()
    {
        return $this->hasMany(DistrictTranslation::class);
    }
    protected static function newFactory()
    {
        return DistrictFactory::new();
    }
}
