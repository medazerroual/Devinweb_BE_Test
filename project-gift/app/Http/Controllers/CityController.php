<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Time;
use App\Date;
use Carbon\Carbon;
use DB;
class CityController extends Controller
{
    //lister
    public function index(){
        //$allCity =  City::all();
       // dd($allCity);


        $result = [];

        foreach (City::all() as $city) {
            $result[] = [
                'id' => $city->id,
                'city' => $city->name,
                'slug' => $city->slug,
                'delivery_times' => $city->time

            ];
        }

        return $result ;

        //return view('city.index');
    }
    //afficher le formulaire de creation
    public function creat(){

        $newCity_rabat = new City();

        $newCity_rabat->name = "Rabat";
        $newCity_rabat->slug = "rabat";
        $newCity_rabat->save();

        $newCity_casa = new City();
        $newCity_casa->name = "Casa";
        $newCity_casa->slug = "casa";
        $newCity_casa->save();

        $newCity_tanger = new City();
        $newCity_tanger->name = "Tanger";
        $newCity_tanger->slug = "tanger";
        $newCity_tanger->save();
    }

    public function attach(){
        $cityRabat = City::where('slug', '=', 'rabat')->first();
        $timeRabat1 = Time::where('span', '=', '9->12')->first();
        $timeRabat2 = Time::where('span', '=', '14->18')->first();

        $cityRabat->time()->attach($timeRabat1);
        $cityRabat->time()->attach($timeRabat2);

        $cityCasa = City::where('slug', '=', 'casa')->first();
        $timeCasa1 = Time::where('span', '=', '10->13')->first();
        $timeCasa2 = Time::where('span', '=', '15->19')->first();

        $cityCasa->time()->attach($timeCasa1);
        $cityCasa->time()->attach($timeCasa2);

        $cityTanger = City::where('slug', '=', 'tanger')->first();
        $timeTanger1 = Time::where('span', '=', '9->13')->first();
        $timeTanger2 = Time::where('span', '=', '14->18')->first();
        $timeTanger3 = Time::where('span', '=', '18->20')->first();

        $cityTanger->time()->attach($timeTanger1);
        $cityTanger->time()->attach($timeTanger2);
        $cityTanger->time()->attach($timeTanger3);

        //dd( $time1);
    }

    public function getCityTime($id){

        $result = [];
        $city = City::where('id', '=',$id)->first();

            $result[] = [
                'id' => $city->id,
                'city' => $city->name,
                'slug' => $city->slug,
                'delivery_times' => $city->time

            ];

        return $result ;

    }

    //ajouter delivery dates city
    public function deliveryDatesCities(){

        $cityRabat = City::where('slug', '=', 'rabat')->first();
        $timeRabat1 = Time::where('span', '=', '9->12')->first();
        $timeRabat2 = Time::where('span', '=', '14->18')->first();

        $cityRabat->time()->attach($timeRabat1);
        $cityRabat->time()->attach($timeRabat2);

    }


    //afficher les date selon nb du jour
    public function deliveryDatesTimes($id,$nb_day){

        $result = [];
        $resultDate = [];


      // $date = Date::where('date', '>=', $towDay)->get();
         $towDay = Carbon::today()->subDays($nb_day);
        //   $dates = Date::where('date', '>=', $towDay)->get();
        //  $city = City::where('id', '=', $id)->get();



        // foreach ($dates as $date) {
        //     $result['dates'] = [
        //         'day_name'=> $date->day_name,
        //         'date'=> $date->date,
        //         'delivery_times' => $date->time,
        //     ];
        // }


        // foreach ($city as $c) {
        //      $result[] = [
        //          'dates' => $c->date->time,
        //          'ttttttttttttt' => $c->time,
        //     ];
        // }

        $city = DB::table('cities')
        ->where('cities.id', '=', $id)
        ->join('city_date', 'cities.id', '=', 'city_date.city_id')
        ->join('dates', 'dates.id', '=', 'city_date.date_id')
        ->where('dates.date', '>=', $towDay)
        ->select('cities.*','dates.*' )
        ->get();

        $date = DB::table('dates')
        ->join('date_time', 'dates.id', '=', 'date_time.date_id')
        ->join('times', 'times.id', '=', 'date_time.time_id')
        ->where('dates.date', '>=', $towDay)
        ->select( 'dates.*', 'times.id','times.span' ,'times.created_at' ,'times.updated_at'  )
        ->get();

 foreach ($city as $c) {

        foreach ($date as $d) {

            if ($c->date == $d->date) {

             $result[] = [
                'day_name'=> $d->day_name,
                 'date'=> $d->date,
                 //'delivery_times' => $d->time,
            ];

            $result[]['delivery_times'] = [
                'id'=> $d->id,
                 'span'=> $d->span,
                 'created_at'=> $d->created_at,
                 'updated_at'=> $d->updated_at,
                 //'delivery_times' => $d->time,
            ];


        }

        }

     }

        return  $result;


    }
    //enregister
    public function store(){

    }
    //récupérer puis mettre dans formulaire
    public function edit(){}
    //modifier
    public function update(){

    }
    //supprimer
    public function destrov(){}//
}
