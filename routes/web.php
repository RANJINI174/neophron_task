<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SportsController;
use App\Http\Controllers\categoriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/sports", SportsController::class);
Route::resource("/categories", categoriesController::class);

