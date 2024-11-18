<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Bus;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TripFormRequest;
class TripController extends Controller
{
    /*
    * Display a listing of the resource.
    */
    public function index(Request $req)
    {
        if($req->isAvilable=='yes'){
            $trips=Trip::where('date','>=',now())->where('user_id',auth()->id())->get();
            return view('trip.viewAllTrips',['allTrips'=>$trips,'isAvilable'=>'yes']);
        } else if($req->isAvilable=='no'){
            $trips=Trip::where('date','<',now())->where('user_id',auth()->id())->get();    
            return view('trip.viewAllTrips',['allTrips'=>$trips,'isAvilable'=>'no']);         
        } else
            return redirect()->route('index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get all cities and buses number
        $allBuses=auth()->user()->buses()->select('numberOfBus','id')->get();
        $allCities=auth()->user()->cities()->where('name','!=','this city was deleted')->get();
        //
        return view('trip.create',[
            'buses'=>$allBuses,'cities'=>$allCities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripFormRequest $req)
    {
        $req->validated();
        $bus=Bus::select('numOfSeats')->where('id','=',$req->busNumber)->get();
        $newTrip=new Trip([
            'ticketPrice'=>$req->totalPrice,
            'date'=>$req->date,
            'bus_id'=>$req->busNumber,
            'availabelSeats'=>$bus[0]->numOfSeats
        ]);
        $addnew=User::find(auth()->id());
        $tripAdded=$addnew->trips()->save($newTrip);
        $tripAdded->cities()->attach($req->from, ['destination' => 'from']);
        $tripAdded->cities()->attach($req->to, ['destination' => 'to']);
        return redirect('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req,string $id)
    {
        $trip=Trip::find($id);
        return view('trip.allCustomerInTrip',['trip'=>$trip,'msg'=>$req->isAvilable]);
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
    public function destroy(Request $req,string $id)
    {
        Trip::where('id', $id)->firstorfail()->delete();
        return redirect('/trip?isAvilable='.$req->isAvilable);
    }
}
