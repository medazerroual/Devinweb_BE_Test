<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Date;
use App\Time;
use App\City;
use Carbon\Carbon;

class DateController extends Controller
{
     //lister
     public function index(){}
        //afficher le formulaire de creation
        public function creat(){
            $newDate1 = new Date();

            $newDate1->day_name =  Carbon::now()->format('l');
            $newDate1->date = Carbon::now();
            $newDate1->save();


            $newDate1->city()->attach(City::where('slug', '=', 'rabat')->first());
            $newDate1->time()->attach(Time::where('span', '=', '9->12')->first());
            $newDate1->time()->attach(Time::where('span', '=', '14->18')->first());


            $newDate2 = new Date();

            $newDate2->day_name =  Carbon::now()->format('l');
            $newDate2->date = Carbon::now();
            $newDate2->save();


            $newDate2->city()->attach( City::where('slug', '=', 'tanger')->first());
            $newDate2->time()->attach(Time::where('span', '=', '9->13')->first());




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
