<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class IndexController extends Controller
{
    public function __invoke(){
        return view('index',['companyName'=>auth()->user()->name]);
    }

}
