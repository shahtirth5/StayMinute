<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Mail;
use DB;

class UsersController extends Controller
{
    /**
     * The following function verifies user login and redirects to the dashboard if the credentials are correct
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        $email = $request->input('login_email');    
        $password = $request->input('login_password');
        $result_set = DB::select("SELECT id,first_name,last_name,email,password FROM users WHERE email = ? AND is_active = ?", [$email , 1]);
        if(sizeof($result_set) == 1){
            if(Hash::check($password, $result_set[0]->password)) {
                $id = $result_set[0]->id;
                $first_name = $result_set[0]->first_name;
                $last_name = $result_set[0]->last_name;
                $email = $result_set[0]->email;
                session(['user_id' => $id, 'user_first_name' => $first_name , 'user_last_name' => $last_name , 'user_email' => $email]);
                return redirect("/user/dashboard")->withCookie(cookie()->forever('user_id', $id));
            } else {
                session(['error' => "Invalid Email/Password"]);
                return back()->withInput();
            }
        } else {
            session(['error' => "Invalid Email/Password"]);
            return back()->withInput();
        }
    }

    /**
     * The following function adds new user to database and sends a mail with verification link
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unverifiedRegister(Request $request) {
        $first_name = $request->input('sign_up_first_name');
        $last_name = $request->input('sign_up_last_name');
        $email = $request->input('sign_up_email');
        $phone = $request->input('sign_up_phone');
        $password = $request->input('sign_up_password');
        $confirm_password = $request->input('sign_up_confirm_password');
        $activation_code = str_random(30);
        $result = User::create([
            'first_name' => $first_name, 
            'last_name' => $last_name,
            'email' => $email,
            'phone_no' => $phone,
            'activation_code' => $activation_code,
            'password' => Hash::make($password)
        ]);

        
        //Sending Mail 
        $data = array('code'=>$activation_code,'name'=>$first_name. ' '. $last_name , 'email');
        Mail::send('UserAuth/verify-account', $data, function($message) {
            $message
                ->to(Input::get('sign_up_email'), Input::get('sign_up_first_name'). ' ' .Input::get('sign_up_last_name'))
                ->subject('Verify email')
                ->from('temp@gmail.com','Don\'t Reply');
        });

        return redirect('/login')->with('status','Successful');
    }

    
	/**
     * The following function activates the user when the activation code from mail is clicked and the account
	 * gets activated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activateUser(Request $request) {
        $activation_code = $request->activation_code;
        if(!$activation_code)
        {
            throw new InvalidValidationCodeException;
        }
        $user = User::whereActivationCode($activation_code)->first();
        if (!$user)
        {
            throw new InvalidConfirmationCodeException;
        }
        $result = DB::update("UPDATE users set activation_code = '', is_active = TRUE where activation_code = ?", [$activation_code]);
        return redirect(URL::to('/login'));
    }

    /**
     * 
     */
    public function myBookings(Request $request) {
        $booker_id = $request->session()->get('user_id');
        $my_bookings = DB::select('SELECT * from bookings WHERE booker_id = ? ORDER BY created_at ASC', [$booker_id]);
        return view('User/my-bookings')->with('bookings', $my_bookings);
    }

    /**
     * The following function logs the user out of his account
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $request->session()->flush();
        $cookie = Cookie::forget('user_id');
        return redirect('/login')->withCookie($cookie);
    }

   
}
