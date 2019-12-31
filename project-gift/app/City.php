<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Time;
use App\Date;

class City extends Model
{
    public function time(){
        return $this->belongsToMany(Time::class);
    }

    public function date(){
        return $this->belongsToMany('App\Date');
    }


}
