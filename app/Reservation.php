<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable
        = [
            'reserved_date',
            'quantity',
            'user_id',
        ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
