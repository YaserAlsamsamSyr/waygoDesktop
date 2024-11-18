<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripCity extends Model
{
    use HasFactory;

    protected $fillable=[
        'destination'
    ];
}
