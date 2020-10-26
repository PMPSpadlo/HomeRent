<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('welcome', compact('homes'));
    }

    protected function CreateReservation(Request $request)
    {
        $home_id = $request->home_id;
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $days = $start_date->diffInDays($end_date, false);
        $beds = $request->beds;
        $home = (new \App\Models\Home)->GetHome($home_id);
        if((new \App\Models\Home)->CheckFreeBeds($home_id,$start_date,$end_date,$beds) === true
            && ($start_date < $end_date)
            && ($beds >= 1 )
            && ($start_date > Carbon::now())
        ){
            $total_cost = (new \App\Models\Home)->TotalCost($home,$days,$beds);
            $new_reservation = Reservation::create([
                'home_id' => $home_id,
                'beds' => $beds,
                'total_cost' => $total_cost,
                'reservation_start' => $start_date,
                'reservation_end' => $end_date,
            ]);
            return view('success', compact('new_reservation'));
        }else{
            return redirect()->route('index')->with('fail', "We don't have free beds for your reservation");
        }

    }


}
