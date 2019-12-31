<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;

class TimeController extends Controller
{

     //lister
    public function index(){
        //$allTimes =  Time::all();
        //dd($allTimes);
        $result = [];

        foreach (Time::all() as $time) {
            $result[] = [
                'id' => $time->id,
                'delivery_at' => $time->span ,

            ];
        }

        return $result;

        //return view('city.index');
    }
     //afficher le formulaire de creation
     public function creat(){
        $newTime1 = new Time();

        $newTime1->span  = "9->12";
        $newTime1->save();

        $newTime2 = new Time();

        $newTime2->span  = "14->18";
        $newTime2->save();

        $newTime3 = new Time();

        $newTime3->span  = "10->13";
        $newTime3->save();

        $newTime4 = new Time();

        $newTime4->span  = "15->19";
        $newTime4->save();

        $newTime5 = new Time();

        $newTime5->span  = "9->13";
        $newTime5->save();

        $newTime6 = new Time();

        $newTime6->span  = "18->20";
        $newTime6->save();
     }
        //enregister
        public function store(){}

        //supprimer
        public function show(){}
        //récupérer puis mettre dans formulaire
        public function edit(){}
        //modifier
        public function update(){}
        //supprimer
        public function destrov(){}//
}
