<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTypeTranslation extends Model
{
    //
    protected $table = 'user_type_translation';

    protected $fillable = ['name'];

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }
}
