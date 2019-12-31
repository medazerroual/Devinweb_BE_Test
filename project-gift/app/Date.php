<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Time;
use App\City;

class Date extends Model
{
    public function time(){
        return $this->belongsToMany(Time::class);
    }

    public function city(){
        return $this->belongsToMany(City::class);

    }
}
