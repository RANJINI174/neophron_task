<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SportsController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource("/sports", SportsController::class);
