<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'question',
            'type',
            'survey_id'
        ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
