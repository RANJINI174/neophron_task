<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SportsController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\groupsController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\loginController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/sports", SportsController::class);
Route::resource("/categories", categoriesController::class);
Route::get('categories/{categories_id}/store', [sportsController::class, 'viewStores'])->name('categories.store');
Route::resource("/customers", customersController::class);
Route::resource("/groups", groupsController::class);
Route::view('register','auth.register');
Route::post("store",[registerController::class,'store']);
Route::view('home','home');
Route::view('login','auth.login');
Route::post('authendicate',[loginController::class,'authendicate']);
//Route::get('logout',[loginController::class.'logout']);
Route::get('logout',[loginController::class, 'logout']);
