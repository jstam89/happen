<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function where(string $string, string $string1, $id)
    {
    }
    
    public static function find(int $int)
    {
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
