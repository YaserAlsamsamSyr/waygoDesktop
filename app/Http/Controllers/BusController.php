<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusFormRequest;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\User;
class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses=Bus::orderBy('numberOfBus','desc')->where('user_id',auth()->id())->paginate(4);
        return view('bus.viewAllBuses',['allBuses'=>$buses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        return view('bus.createBus',['msg'=>$req->msg]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusFormRequest $req)
    {
        $req->validated();
        $use=User::find(auth()->id());
        $bus=$use->buses()->where('numberOfBus','=',$req->numberOfBus)->get();
        if(sizeof($bus)>0)
           return redirect('/bus/create?msg=true');
        $newBus=[
            'type'=>$req->type,
            'numOfSeats'=>$req->numberOfSeats,
            'driverName'=>$req->driverName,
            'helpDriverName'=>$req->helpDriverName,
            'numberOfBus'=>$req->numberOfBus
        ];
        $use->buses()->create($newBus);
        return redirect('/bus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $busTrips=Bus::find($id);
        return view('bus.tripsOfBus',['busTrips'=>$busTrips->trips]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bus=Bus::find($id);
        return view('bus.updateBus',['bus'=>$bus]);
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
        Bus::where('id', $id)->firstorfail()->delete();
        return redirect('/bus');
    }
}
