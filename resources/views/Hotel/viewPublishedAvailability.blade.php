@extends('Hotel.layouts.layout') 
@section('page')
<div class="container">
    <h3>View Published Availabilities</h3>
    <div>
        <form action="/hotel/getPublishedAvailabilitiesByDate" method="POST">
            {{ csrf_field() }}
            <input type="text" class="form-control date" placeholder="Date" name="date" readonly>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>Availability Id</th>
                    <th>Start Date</th>
                    <th>Start Time</th>
                    <th>End Date</th>
                    <th>End Time</th>
                    <th>Pricing</th>
                    <th>Room Type</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
            @if(isset($result))
            @for ($i = 0 ; $i < sizeof($result) ; $i++)
                <tr>
                    <td>{{$result[$i]->hotel_availability_id}}</td>
                    <td>{{$result[$i]->start_date}}</td>
                    <td>{{$result[$i]->start_time}}</td>
                    <td>{{$result[$i]->end_date}}</td>
                    <td>{{$result[$i]->end_time}}</td>
                    <td>{{$result[$i]->pricing_per_hour}}</td>
                    <td>{{$room_names[$i]}}</td>
                    <td>{{$result[$i]->created_at}}</td>
                    <td><a class="btn btn-info">Edit</a></td>
                    <td><a class="btn btn-danger">Delete</a></td>
                </tr>
            @endfor
            @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection