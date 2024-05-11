<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SportsController;
use App\Http\Controllers\categoriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/sports", SportsController::class);
Route::resource("/categories", categoriesController::class);
Route::get('categories/{categories_id}/store', [sportsController::class, 'viewStores'])->name('categories.store');
