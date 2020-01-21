<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable
        = [
            'quantity',
            'reserved_date',
            'user_id',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
