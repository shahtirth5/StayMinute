<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    <div class="hidden" id="hotel_id">
        {{$hotel_details->hotel_id}}
    </div>
    <div class="hidden" id="user_id">
        {{session()->get('user_id')}}
    </div>
    <div class="container-fluid">
        <h2>{{$hotel_details->hotel_name}}</h2>

        <div class="panel m-1 p-1">
            <p><strong>Address : </strong>
                <div class="inline-block">
                    {{$hotel_details->hotel_address}}
                </div>
            </p>
            <p><strong>City : </strong>{{$hotel_details->hotel_city}}</p>
        </div>

        <div class="panel p-1 m-1">
            <h2><em>Book A Room !!</em></h2>
            <br>
            <form id="booking_form">
                <label for="booking_date">Date </label>
                <input type="text" autocomplete="off" readonly id="booking_date" name="booking_date"
                    class="form-control date mb-1">

                <label for="booking_room_type">Room Type : </label>

                <select id="booking_room_type" name="booking_room_type" class="form-control mb-1">
                    <?php 
                    $query = DB::select('SELECT room_type_id,room_type_name FROM room_types where hotel_id = ?', [$hotel_details->hotel_id]);
                ?>
                    @foreach ($query as $room_type)
                    <option value="{{$room_type->room_type_id}}">{{$room_type->room_type_name}}</option>
                    @endforeach
                </select>

                <label for="no_of_rooms">No Of Rooms : </label>
                <select name="no_of_rooms" id="no_of_rooms" class="form-control mb-1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>

                <div class="" id="timings" style="position: relative;">
                    <div id="checkbox-button">
                        <label for="0-1">
                            <input type="checkbox" disabled id="0-1" name="booking[]"><span>12:00 AM - 1:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="1-2">
                            <input type="checkbox" disabled id="1-2" name="booking[]"><span>1:00 AM - 2:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="2-3">
                            <input type="checkbox" disabled id="2-3" name="booking[]"><span>2:00 AM - 3:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="3-4">
                            <input type="checkbox" disabled id="3-4" name="booking[]"><span>3:00 AM - 4:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="4-5">
                            <input type="checkbox" disabled id="4-5" name="booking[]"><span>4:00 AM - 5:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="5-6">
                            <input type="checkbox" disabled id="5-6" name="booking[]"><span>5:00 AM - 6:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="6-7">
                            <input type="checkbox" disabled id="6-7" name="booking[]"><span>6:00 AM - 7:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="7-8">
                            <input type="checkbox" disabled id="7-8" name="booking[]"><span>7:00 AM - 8:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="8-9">
                            <input type="checkbox" disabled id="8-9" name="booking[]"><span>8:00 AM - 9:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="9-10">
                            <input type="checkbox" disabled id="9-10" name="booking[]"><span>9:00 AM - 10:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="10-11">
                            <input type="checkbox" disabled id="10-11" name="booking[]"><span>10:00 AM - 11:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="11-12">
                            <input type="checkbox" disabled id="11-12" name="booking[]"><span>11:00 AM - 12:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="12-13">
                            <input type="checkbox" disabled id="12-13" name="booking[]"><span>12:00 PM - 1:00 AM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="11-12">
                            <input type="checkbox" disabled id="11-12" name="booking[]"><span>11:00 AM - 12:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="12-13">
                            <input type="checkbox" disabled id="12-13" name="booking[]"><span>12:00 PM - 1:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="13-14">
                            <input type="checkbox" disabled id="13-14" name="booking[]"><span>1:00 PM - 2:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="14-15">
                            <input type="checkbox" disabled id="14-15" name="booking[]"><span>2:00 PM - 3:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="15-16">
                            <input type="checkbox" disabled id="15-16" name="booking[]"><span>3:00 PM - 4:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="16-17">
                            <input type="checkbox" disabled id="16-17" name="booking[]"><span>4:00 PM - 5:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="17-18">
                            <input type="checkbox" disabled id="17-18" name="booking[]"><span>5:00 PM - 6:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="18-19">
                            <input type="checkbox" disabled id="18-19" name="booking[]"><span>6:00 PM - 7:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="19-20">
                            <input type="checkbox" disabled id="19-20" name="booking[]"><span>7:00 PM - 8:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="20-21">
                            <input type="checkbox" disabled id="20-21" name="booking[]"><span>8:00 PM - 9:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="21-22">
                            <input type="checkbox" disabled id="21-22" name="booking[]"><span>9:00 PM - 10:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="22-23">
                            <input type="checkbox" disabled id="22-23" name="booking[]"><span>10:00 PM - 11:00 PM</span>
                        </label>
                    </div>
                    <div id="checkbox-button">
                        <label for="23-0">
                            <input type="checkbox" disabled id="23-0" name="booking[]"><span>11:00 PM - 12:00 AM</span>
                        </label>
                    </div>
                    {{-- <div class="clearfix"></div> --}}
                    <img src="{{ URL::to('/') }}/images/loader.gif" alt="" class="center hidden" id="loader">
                </div>
                <div class="clearfix mb-2"></div>
                <p id="booking_cost">Total cost would be : ₹ <strong>0</strong></p>                
            </form>
            <form action="{{URL::to('/hotel/booking')}}"  method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="booking_details" id="booking_details">
                <button class="btn btn-lg btn-default pull-right" id="book_hotel" type="submit">Book</button>
                <div class="clearfix"></div>    
            </form>

        </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>