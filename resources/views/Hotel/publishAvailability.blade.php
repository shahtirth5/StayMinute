@extends('Hotel.layouts.layout') 
@section('page')
<div class="container">
    {{--
    <h1>This is to publish availability of a room for a specific timeslot</h1> --}}
    <form method="POST" action="{{URL::to('/hotel/addAvailability')}}">
        <div class="ml-4 mr-4">
            @if(session('error')) 
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                {{session()->forget('error')}}
            @endif
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="start_date" class="mr-2 mt-1">Start Date </label>
                        <input type="text" autocomplete="off" readonly name="start_date" class="form-control date">
                        <label for="start_time" class="mr-2 mt-1">Start Time </label>
                        <input type="text" autocomplete="off" readonly name="start_time" class="form-control time">
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="end_date" class="mr-2 mt-1">End Date </label>
                        <input type="text" autocomplete="off" readonly name="end_date" class="form-control date">
                        <label for="end_time" class="mr-2 mt-1">End Time </label>
                        <input type="text" autocomplete="off" readonly name="end_time" class="form-control time">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Price Per Hour" name="pricing_per_hour" class="form-control"/>
            </div>
            <div class="form-group">
                @if (isset($room_types))
                    <select name="room_type_id" class="form-control">
                        @for ($i = 0 ; $i < sizeof($room_types) ; $i++)
                            <option value="{{$room_types[$i]->room_type_id}}">{{$room_types[$i]->room_type_name}}</option>
                        @endfor
                    </select>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-1">Publish</button>
        </div>
    </form>
</div>
@endsection