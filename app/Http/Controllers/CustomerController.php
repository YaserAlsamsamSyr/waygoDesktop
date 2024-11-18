<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Customer;
use App\Http\Requests\CustomerFormRequest;
class CustomerController extends Controller
{
    public function deleteCustomer(string $id,String $tripId){
        Customer::where('id', $id)->firstorfail()->delete();
        $trip=Trip::find($tripId);
        $trip->availabelSeats++;
        $trip->save();
        return redirect('/trip/'.$tripId.'?isAvilable=yes');
    }

    public function addNewCustomers(CustomerFormRequest $req){
        $req->validated();
        $newCus=[
            'firstName'=>$req->fName,
            'lastName'=>$req->lName,
            'fatherName'=>$req->faName,
            'motherName'=>$req->mName,
            'gender'=>$req->gender,
            'iss'=>$req->iss,
            'phoneNumber'=>$req->phoneNumber
        ];
        $trip=Trip::find($req->tripId);
        if($trip->availabelSeats==0)
            return redirect('/customer/openAddCustomer/'.$req->tripId.'?isCreated=full');
        $createNewCus=Customer::create($newCus);
        $trip->customers()->attach($createNewCus->id);
        $trip->availabelSeats--;
        $trip->save();
        return redirect('/customer/openAddCustomer/'.$req->tripId.'?isCreated=true');
    }

    public function openAddCustomer(Request $req,String $id){
        return view('trip.addCustomer',['isCreated'=>$req->isCreated,'tripId'=>$id]);
    }
}
