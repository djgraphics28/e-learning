<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizHistory extends Model
{
    protected $fillable = [
        'student_id',
        'quiz_id',
        'score'
    ];
}
