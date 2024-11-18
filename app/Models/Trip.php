<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bus;
use App\Models\Customer;
use App\Models\City;

class Trip extends Model
{
    use HasFactory;

    protected $fillable=[
        'ticketPrice','date','bus_id','availabelSeats'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function user(){
         return $this->belongsTo(User::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }

    public function customers(){
        return $this->belongsToMany(Customer::class);
    }

    public function cities(){
        return $this->belongsToMany(City::class);
    }
}