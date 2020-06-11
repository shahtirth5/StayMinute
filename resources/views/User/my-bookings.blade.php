@extends('User.layouts.layout')

@section('page')
    <div class="container-fluid">
        @foreach ($bookings as $booking)
            <?php
                $hotel_availability_details = DB::select('SELECT * FROM hotel_availability WHERE hotel_availability_id = ?', [$booking->hotel_availability_id])[0];
                $hotel = DB::select('SELECT * FROM hotels WHERE hotel_id = ?', [$hotel_availability_details->hotel_id])[0];
            ?>
            <div class="well">
                <p>Hotel Name : <strong class="text-primary">{{$hotel->hotel_name}}</strong></p>
                <p>Date : <strong>{{$hotel_availability_details->start_date}}</strong></p>
                <p>Start Time : <strong> {{$hotel_availability_details->start_time}}</strong></p>
                <p>End Time : <strong> {{$hotel_availability_details->end_time}}</strong></p>
                <p>Hotel booked at : <strong> {{$booking->created_at}}</strong></p>
                <p>Booking otp : <strong class="text-success">{{$booking->booking_otp}}</strong></p>
            </div>
        @endforeach
    </div>
@endsection