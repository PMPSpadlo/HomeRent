<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    protected $table = "homes";
    protected $fillable = [
        'name','beds','price_per_day','discount'
    ];

    public function rent()
    {
        return $this->hasMany('App\Reservation', 'reservation_id', 'id');
    }

    public function CheckFreeBeds($id,$start_date,$end_date,$beds)
    {
        $reserved_beds = 0;
        $reservations = Home::GetAllReservations($id,$start_date,$end_date);
        foreach($reservations as $reservation){
            $reserved_beds += $reservation->beds;
        }
        $home = Home::GetHome($id);

//        if($home->beds >= ($reserved_beds+$beds)){
//            dd("YUP ".$home->beds." na zajetych ".($reserved_beds+$beds));
//        }else{
//            dd("NOPE ".$home->beds." na zajetych ".($reserved_beds+$beds));
//        }
        if($home->beds >= ($reserved_beds+$beds)){
            return true;
        }else{
            return false;
        }
    }

    public function GetAllReservations($id,$start_date,$end_date)
    {
        return DB::table('reservations')
            ->where('home_id','=', $id)
            ->where('reservation_start','>=',$start_date)
            ->where('reservation_end','<=',$end_date)->get();
    }

    public function GetHome($id)
    {
        return DB::table('homes')->where('id','=', $id)->first();
    }

    public function TotalCost($home,$days,$beds)
    {
        if($days > 7){
            return (($home->price_per_day * $days * $beds)*((100-$home->discount)/100));
        }
        return ($home->price_per_day * $days * $beds);
    }

}
