<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Date;

class Time extends Model
{

    public function city(){
        return $this->belongsToMany(City::class);
    }

    public function date(){
        return $this->belongsToMany(Date::class);
    }
}
