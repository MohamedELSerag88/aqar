<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    //
    protected $table = 'feature_translation';

    protected $fillable = ['name'];
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
