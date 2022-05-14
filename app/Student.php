<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'date_birth',
        'address',
        'nationality',
        'civil_status',
        'contact_no',
        'is_delete'
    ];
}
