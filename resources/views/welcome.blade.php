@extends('layout.app')

@section('content')
    <div class="global-content text-center">
        <h1>Rent a home</h1>
        <form class="global-form">
            <div class="form-group">
                <label for="home">Choose a home:</label>
                <select class="form-control" id="home">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="beds">How many beds:</label>
                <input type="number" class="form-control" id="beds" placeholder=1>
            </div>
            <div class="form-group">
                <label for="beds">Start date:</label>
                <input type="date" class="form-control" id="start-date" value="2020-10-25">
            </div>
            <div class="form-group">
                <label for="beds">End date:</label>
                <input type="date" class="form-control" id="start-date" value="2020-10-26">
            </div>
            <button type="submit" class="btn btn-success" style="margin-bottom: 10px">Rent !</button>
        </form>
    </div>

@endsection
