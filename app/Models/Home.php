<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function rent()
    {
        return $this->hasMany('App\Reservation', 'reservation_id', 'id');
    }
}
