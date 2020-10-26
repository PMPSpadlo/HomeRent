@extends('layout.app')

@section('content')
    <div class="global-content text-center">
        <h1>Success !!! You rented a home</h1>
        <h2>Reservation ID: {{$new_reservation->id}}</h2>
        <h2>Home ID: {{$new_reservation->home_id}}</h2>
        <h2>Beds: {{$new_reservation->beds}}</h2>
        <h2>Total Cost: {{$new_reservation->total_cost}}</h2>
        <h2>From: {{$new_reservation->reservation_start}}</h2>
        <h2>To: {{$new_reservation->reservation_end}}</h2>
    </div>

@endsection
