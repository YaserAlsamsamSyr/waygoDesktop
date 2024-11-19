<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusFormRequest;
use App\Http\Requests\CityFormRequest;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\City;

class UpdateController extends Controller
{
    public function updateBus(BusFormRequest $req){
        $req->validated();
        $bus=Bus::find($req->busId);
        $bus->numberOfBus=$req->numberOfBus;
        $bus->driverName=$req->driverName;
        $bus->helpDriverName=$req->helpDriverName;
        $bus->save();
        return redirect('/bus');
    }

    public function updateCity(CityFormRequest $req){
            $req->validated();
            $city=auth()->user()->cities()->where('name',$req->cityName)->get();
            if(sizeof($city)==0){
                $city=City::where('name',$req->cityName)->get();
                auth()->user()->cities()->detach($req->cityId);
                if(sizeof($city)==0){
                    $city=City::create(['name'=>$req->cityName]);
                    auth()->user()->cities()->attach($city);    
                } else{
                    auth()->user()->cities()->attach($city[0]);
                }    
            }
            return redirect('/city');
    }
}
