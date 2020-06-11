<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The name of table in database
     */
    protected $table = "bookings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booker_id', 'booking_otp', 'hotel_availability_id'
    ];
}
