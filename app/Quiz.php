<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        '1_question',
        '1_answerA',
        '1_answerB',
        '1_answerC',
        '1_answerD',
        '1_correctAnswer',
        '2_question',
        '2_answerA',
        '2_answerB',
        '2_answerC',
        '2_answerD',
        '2_correctAnswer',
        '3_question',
        '3_answerA',
        '3_answerB',
        '3_answerC',
        '3_answerD',
        '3_correctAnswer',
        '4_question',
        '4_answerA',
        '4_answerB',
        '4_answerC',
        '4_answerD',
        '4_correctAnswer',
        '5_question',
        '5_answerA',
        '5_answerB',
        '5_answerC',
        '5_answerD',
        '5_correctAnswer',
        'created_by'
    ];
}
