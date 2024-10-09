<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('trucks.index');
});

use App\Http\Controllers\TruckController;

Route::resource('trucks', TruckController::class);

use App\Http\Controllers\TruckSubunitController;

Route::resource('subunits', TruckSubunitController::class);
