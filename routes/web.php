<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UpdateController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/index',IndexController::class)->middleware('auth')->name('index');
Route::resource('/trip', TripController::class)->middleware('auth');
Route::resource('/bus',BusController::class)->middleware('auth');
Route::resource('/city',CityController::class)->middleware('auth');

Route::post('/bus/update',[UpdateController::class,'updateBus'])->middleware('auth')->name('updateBus');
Route::post('/city/update',[UpdateController::class,'updateCity'])->middleware('auth')->name('updateCity');

Route::prefix('/customer')->middleware('auth')->group(function () {
    Route::post('/addNewCustomers',[CustomerController::class,'addNewCustomers'])->name('createCustomer');
    Route::delete('/deleteCustomer/{id}/{tripId}',[CustomerController::class,'deleteCustomer']);
    Route::get('/openAddCustomer/{id}',[CustomerController::class,'openAddCustomer']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
