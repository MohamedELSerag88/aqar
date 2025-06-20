<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    //
    protected $table = 'country_translation';
    protected $fillable = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
