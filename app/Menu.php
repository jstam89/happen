<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'title',
            'info',
            'menu_image',
            'takeout_date',
        ];

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
