<?php

namespace App\Models;

use Database\Factories\MediaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $appends = ['full_path', 'file_type'];
    public $relationKeys = [];

    public $trasnaltionsData =[
    ];
    public $filesData =[
    ];

    public function mediaable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFullPathAttribute()
    {
        if(str_contains($this->path, 'https') ){
            return $this->path;
        }
        return \URL::to('') . '/' . $this->path;
    }
    public function getFileTypeAttribute()
    {
        if (str_contains($this->type, 'video')) {
            return 'video';
        }
        if (str_contains($this->type, 'audio')) {
            return 'audio';
        }
        if (str_contains($this->type, 'pdf')) {
            return 'pdf';
        }
        return 'image';
    }

    protected static function newFactory()
    {
        return MediaFactory::new();
    }
}
