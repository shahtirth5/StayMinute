<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The name of table in database
     */
    protected $table = "hotels";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_name', 'hotel_email', 'hotel_password', 'hotel_address', 'hotel_latitude', 'hotel_longitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'hotel_password'
    ];

}
