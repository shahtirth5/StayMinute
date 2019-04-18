<?php

namespace App\Http\Controllers;

use App\Hotel;
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
}
