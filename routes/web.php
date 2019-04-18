<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 *  Route to the landing page 
 */
Route::get('/', function () {
    return view('landing');
});

/* 
| ---------------------------------------
| User Login 
| ---------------------------------------
*/

/**
 *  Route to Login page 
 */
Route::get('/login' , function() {
    return view('UserAuth/login');
});

/**
 *  Route to Sign Up page 
 */
Route::get('/register' , function() {
    return view('UserAuth/register');
});

/** 
 * Route where the basic registration is done where user is_active is set to 0 and email with
 *  account activation is sent 
 */
Route::post('/unverified-register' , 'UsersController@unverifiedRegister');

/**
 *  Route to Verify Account page 
 *  The following page is shown when verification email is sent
 */
Route::get('/verify-account' , function() {
    return view('UserAuth/verify-account');
});

/**
 *  Route to UserController@activateUser where the update query is done to set is_active flag of user to 1 
 *  and the activation_code is set to null
 */
Route::get('/activate-user/{activation_code}' , 'UsersController@activateUser');

/**
 *  Route where the login credentials are verified
 */
Route::post('/verifylogin' , 'UsersController@verify');

/* 
| ---------------------------------------
| Hotel Login 
| ---------------------------------------
*/

/**
 * Route to hotel login page
 */
Route::get('/hotel/login' , function() {
    return view('Hotel/login');
});
Route::get('/hotel' , function() {
    return view('Hotel/login');
});

Route::post('/verifyHotelLogin', 'HotelsController@verify');

/**
 * 
 */
Route::get('/dashboard' , function() {
    return view('Hotel/dashboard');
});