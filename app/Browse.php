<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Browse extends Model
{
    protected $fillable = [
        'image',
        'other_images',
        'video',
        'country',
        'title',
        'context',
        'created_by'
    ];
}
