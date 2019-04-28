<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelAvailability extends Model
{
    /**
     * The name of table in database
     */
    protected $table = "hotel_availability";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id', 'start_date', 'start_time', 'end_date', 'end_time' , 'pricing_per_hour','room_type_id' ,'isBooked'
    ];


}
