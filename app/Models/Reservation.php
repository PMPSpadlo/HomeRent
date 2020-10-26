<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";
    protected $fillable = [
        'home_id','beds','total_cost','reservation_start','reservation_end'
    ];

    public function home()
    {
        return $this->belongsTo('App\Home', 'home_id', 'id');
    }
}
