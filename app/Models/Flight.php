<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
     protected $fillable = [
        'name','type','species','height','weight',
        'hp','attack','defense','image_url'
    ];
}
