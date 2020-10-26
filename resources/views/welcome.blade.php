@extends('layout.app')

@section('content')
    <div class="global-content text-center">
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        <h1>Rent a home</h1>
        <form class="global-form" method="POST" action="{{ route('reservation') }}">
            @csrf
            <div class="form-group">
                <label for="home">Choose a home:</label>
                <select class="form-control" id="home_id" name="home_id">
                    @foreach($homes as $home)
                        <option value="{{$home->id}}">{{$home->name}} (All beds: {{$home->beds}}) (Cost: {{$home->price_per_day}}$/day)</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="beds">How many beds:</label>
                <input type="number" class="form-control" id="beds" name="beds" value="1">
            </div>
            <div class="form-group">
                <label for="start_date">Start date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="2020-10-25">
            </div>
            <div class="form-group">
                <label for="end_date">End date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="2020-10-26">
            </div>
            <button type="submit" class="btn btn-success" style="margin-bottom: 10px">Rent !</button>
        </form>
    </div>

@endsection
