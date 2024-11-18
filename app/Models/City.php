<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Trip;

class City extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    protected $hidden=[
        'created_at','updated_at'
    ];
    
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function trips(){
        return $this->belongsToMany(Trip::class);
    }
}
