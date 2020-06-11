@extends('Hotel.layouts.layout')

@section('page')
    <div class="container-fluid">
        {{-- <h1>This is dashboard, as of now this is useless</h1> --}}
        @foreach ($rooms as $room)
            <h2>{{$room['room_type_name']}}</h2>
            <div id="hotel-images-carousel" class="owl-carousel owl-theme">
            @foreach ($room['room_images'] as $image) 
                <div class="item"><img src="data:image/jpeg;base64,{{$image}}" class="img-responsive"></div>
            @endforeach
            </div>
        <form method="POST" action="{{URL::to('/hotel/add_image')}}" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="room_type_id" value="{{$room['room_type_id']}}">
                    <input type="file" name = "room_image">
                    <input type="submit" class="btn btn-primary">
                </div>  
            </form>
        @endforeach
    </div>
@endsection