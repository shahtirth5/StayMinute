<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    /**
     * The name of table in database
     */
    protected $table = "room_images";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_type_id', 'room_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
