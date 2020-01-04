<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $int)
 */
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
            'quantity',
            'ordered_at'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
