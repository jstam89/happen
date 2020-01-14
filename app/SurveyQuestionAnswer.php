<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'answer',
            'question_id',
        ];
}
