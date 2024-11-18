<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Trip;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstName',
        'lastName',
        'fatherName',
        'motherName',
        'gender',
        'iss',
        'phoneNumber'
    ];

    public function trips(){
        return $this->belongsToMany(Trip::class);
    }
}
