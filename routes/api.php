<?php

use Illuminate\Http\Request;
use App\Booking;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/search/get-all-hotels' , function(Request $request) {
    $keyword = $request->input("keyword");
    $result = DB::select("SELECT * FROM hotels WHERE (hotel_name like '%$keyword%') OR (hotel_address like '%$keyword%') OR (hotel_city like '%$keyword%')");
    return json_encode($result);
}); 

Route::post('/booking-availabilities', function(Request $request) {
    $hotel_id = $request->hotel_id;
    $date = $request->date;
    $room_type = $request->room_type;
    $no_of_rooms = $request->rooms;
    $result_set = array();
    for($i = 0 ; $i < 23 ; $i++) {
        $start_time = ($i > 9) ? (string)($i).":00:00" : "0".(string)($i).":00:00";
        $end_time = (($i+1) > 9) ? (string)(($i+1)).":00:00" : "0".(string)(($i+1)).":00:00";
        $result = DB::select('SELECT * FROM hotel_availability where (hotel_id = ? AND start_date = ? AND start_time = ? AND end_time = ? AND room_type_id = ? AND isBooked = 0) ORDER BY updated_at ASC LIMIT '.$no_of_rooms , [$hotel_id, $date, $start_time, $end_time, $room_type]);
        $hotel_availability = "";
        $pricing = 0;
        if(sizeof($result) > 0 && sizeof($result) >= $no_of_rooms){
            for($j = 0 ; $j < sizeof($result) ; $j++){
                $hotel_availability .= ','.$result[$j]->hotel_availability_id;
                $pricing += $result[$j]->pricing_per_hour;
            }
            $booking = (object) array("hotel_availability_id" => $hotel_availability, "start_date" => $date , "start_time" => $start_time, "end_date"=> $date , "end_time" => $end_time, "pricing_per_hour" => $pricing, "room_type_id" => $room_type);
            array_push($result_set,$booking);
        }
    }
    // $result = DB::select('SELECT * FROM hotel_availability where (hotel_id = ? AND start_date = ? AND room_type_id = ? AND isBooked = 0) ORDER BY updated_at', [$hotel_id, $date, $room_type]);
    return json_encode($result_set);
});

Route::post('/book-hotel', function(Request $request) {
    $done = false;
    $user_id = $request->user_id;
    $hotel_id = $request->hotel_id;
    $booking_date = $request->booking_date;
    $booking_room_type = $request->booking_room_type;
    $booking_timings = $request->booking_timings;
    DB::beginTransaction();
    for($i = 0 ; $i < sizeof($booking_timings) ; $i++) {
        $arr = formatTime($booking_timings[$i]);
        $hotel_availability = DB::select('SELECT hotel_availability_id FROM hotel_availability WHERE (start_date = ? AND start_time = ? AND end_time = ? AND room_type_id = ?) ORDER BY updated_at DESC LIMIT 1,1', [$booking_date, $arr[0], $arr[1], $booking_room_type]);
        $hotel_availability_id = $hotel_availability[0]->hotel_availability_id;
        echo $hotel_availability_id;
        $booking_result = Booking::create([
            'hotel_id' => $hotel_id,
            'booker_id' => $user_id,
            'booking_otp' => str_random(4),
            'hotel_availability_id' => $hotel_availability_id
        ]);
        $update_hotel_availability = DB::update('UPDATE hotel_availability set isBooked = 1 where hotel_availability_id = ?', [$hotel_availability_id]);
        if(!$booking_result && !$update_hotel_availabilitys) {
            $done = false;
            break;
        } else {
            $done = true;
        }
    }
    
    if(!$done) {
        DB::rollback();
    } else {
        DB::commit();
        return 'true';
    }
    return 'false';
});


function formatTime($time_range) {
    $arr = array();
    $x = explode("-", $time_range);
    for($i = 0 ; $i < sizeof($x) ; $i++) {
        if($x[$i] < 10) {
            $temp = '0'.$x[$i].':00:00';
            array_push($arr, $temp);
        } else {
            $temp = $x[$i].':00:00';
            array_push($arr, $temp);
        }
    }

    return $arr;
    
}

