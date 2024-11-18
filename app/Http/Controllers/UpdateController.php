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
            $city=City::where('name',$req->cityName)->get();
            if(sizeof($city)>0)
                 return redirect('/city/'.$req->cityId.'?msg=true');
            $city=City::find($req->cityId);
            $city->name=$req->cityName;
            $city->save();
            return redirect('/city');
    }
}
