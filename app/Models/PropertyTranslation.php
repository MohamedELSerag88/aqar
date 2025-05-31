<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyTranslation extends Model
{
    //
    protected $table = 'property_translation';

    protected $fillable = ['title', 'description'];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
