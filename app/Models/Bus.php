<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Trip;

class Bus extends Model
{
    use HasFactory;

    protected $fillable=[
        'type','numOfSeats','driverName','helpDriverName','numberOfBus'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function user(){
        return $this->blongsTo(User::class);
    }

    public function trips(){
        return $this->hasMany(Trip::class);
    }
}
