<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'menu_id',
            'user_id',
        ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
