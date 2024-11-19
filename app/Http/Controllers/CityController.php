<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityFormRequest;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCities=auth()->user()->cities()->where('name','!=','this city was deleted')->get();
        return view('city.viewAllCity',['allCities'=>$allCities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        return view('city.addCity',['msg'=>$req->msg]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityFormRequest $req)
    {
        $req->validated();
        $newCity=City::where('name',$req->cityName)->get();
        $user=User::find(auth()->id());
        if(sizeof($newCity)==0){
            $newCity=City::create(['name'=>$req->cityName]);
            $user->cities()->attach($newCity->id);
        } else
            $user->cities()->attach($newCity[0]->id);
        return redirect('/city');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req,string $id)
    {
        $city=City::find($id);
        return view('city.updateCity',[
            'msg'=>$req->msg,'cityId'=>$city->id,'cityName'=>$city->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city=City::find($id);
        $city->name='this city was deleted';
        $city->save();
        return redirect('/city');
    }
}
