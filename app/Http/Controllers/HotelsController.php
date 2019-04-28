<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Mail;
use DB;

class HotelsController extends Controller
{
    /**
     * The following function verifies hotel login and redirects to the dashboard if the credentials are correct
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request) {
        $hotel_name = $request->input('hotel_name');
        $hotel_password = $request->input('hotel_name');
        $result = DB::select('SELECT * FROM hotels where hotel_name = ? AND hotel_password = ?' ,[$hotel_name , $hotel_password]);
        if(sizeof($result) == 1) {
            session([
                'hotel_id' => $result[0]->hotel_id,
                'hotel_name' => $result[0]->hotel_name,
                'hotel_email' => $result[0]->hotel_email,
                'hotel_address' => $result[0]->hotel_address,
                'hotel_latitude' => $result[0]->hotel_latitude,
                'hotel_longitude' => $result[0]->hotel_longitude
            ]);
            return redirect("/dashboard");
        }
        session(['error' => "Invalid Email/Password"]);
        return back()->withInput();
    }     

    /**
     * The following function extracts the room types and goes to the publishAvailability view
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function publishAvailability(Request $request) {
        $hotel_id = $request->session()->get('hotel_id');
        $room_types = DB::select("SELECT room_type_id, room_type_name FROM room_types where hotel_id = ?" , [$hotel_id]);
        // dd($room_types);
        return view('Hotel/publishAvailability' , ["room_types" => $room_types]);
    }

    /**
     * The following function adds room availability slots and redirects to the same
     * TODO : Manage entries if dates are different
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addAvailability(Request $request) {
        $hotel_id = $request->session()->get('hotel_id');

        $start_date = $request->input('start_date');
        $st = $request->input('start_time');
        
        $end_date = $request->input('end_date');
        $et = $request->input('end_time');

        $pricing_per_hour = $request->input('pricing_per_hour');

        $room_type_id = $request->input('room_type_id');
        
        if($start_date == "" || $st == "" || $end_date == "" || $et == "" || $pricing_per_hour == "") {
            session(['error' => "Please fill all the fields"]);
            return back()->withInput();
        }

        $start_time = formatTime($st);
        $end_time = formatTime($et);

        if($start_date > $end_date) {
            session(['error' => "Start date cannot be ahead of end date"]);
            return back()->withInput();
        }
        if($start_date == $end_date) {
            if(isAhead($start_time, $end_time)){
                session(['error' => "Start time cannot be ahead of end time"]);
                return back()->withInput();
            }
            if($start_time == $end_time) {
                session(['error' => "Start time and end time cannot be same"]);
                return back()->withInput();
            }
        }

        $time_1 = explode(":",$start_time);
        $time_2 = explode(":",$end_time);
        $hh_1 = (int) $time_1[0];
        $hh_2 = (int) $time_2[0];
        for($i = $hh_1 ; $i <= $hh_2 - 1 ; $i++) {
            $result = HotelAvailability::create([
                'hotel_id' => $hotel_id,
                'start_date' => $start_date,
                'start_time' => (string)$i.":".$time_1[1].":00",
                'end_date' => $end_date,
                'end_time' => (string)($i+1).":".$time_1[1].":00",
                'pricing_per_hour' => $pricing_per_hour,
                'room_type_id' => $room_type_id,
                'isBooked' => 0
            ]);
        }
        return back()->withInput(); 
    }

    /**
     * The following function verifies hotel login and redirects to the dashboard if the credentials are correct
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPublishedAvailabilitiesByDate(Request $request) {
        $hotel_id = $request->session()->get('hotel_id');
        $date = $request->input('date');
        $room_types = array();
        $result_set = DB::select('SELECT * FROM hotel_availability WHERE hotel_id = ? AND start_date=? AND isBooked=0', [$hotel_id,$date]);
        foreach ($result_set as $result) {
            $room_type_id = $result->room_type_id;
            $room_type = DB::select("SELECT room_type_name FROM room_types where room_type_id = ? AND hotel_id = ?" , [$room_type_id, $hotel_id]);
            array_push($room_types, $room_type[0]->room_type_name);
        }
        return view("Hotel/viewPublishedAvailability" , ["result" => $result_set , "room_names" => $room_types]);
    }
}

/**
 * 
 */
function formatTime ($time) {
    $split = explode(" " , $time);
    $time = explode(":" , $split[0]);
    $hh = $time[0];
    $mm = $time[1];
    $am_pm = $split[1];
    if($am_pm == 'PM') {
        $hh = (int)$hh + 12;
        $hh = (string)$hh;
    }
    $t = $hh.":".$mm.":00";
    return $t;
}

/**
 * 
 */
function isAhead($start_time , $end_time) {
    $time_1 = explode(":", $start_time);
    $time_2 = explode(":", $end_time);

    if((int)$time_1[0] > (int)$time_2[0]) {
        return true;
    }
    if( (int)$time_1[0] == (int)$time_2[0] && (int)$time_1[1] > (int)$time_2[1]) {
        return true;
    }
    return false;
}
