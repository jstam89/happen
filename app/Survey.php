<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
            'type',
            'isActive'
        ];

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }
}
