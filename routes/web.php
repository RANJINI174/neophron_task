<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SportsController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\groupsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\TaxController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/sports", SportsController::class);
Route::resource("/categories", categoriesController::class);
Route::get('categories/{categories_id}/sports', [SportsController::class, 'viewStores'])->name('categories.store');
// Route::resource("/customers", CustomersController::class);
// Route::resource("/groups", groupsController::class);
Route::resource("/customers", CustomerController::class);
Route::resource("/groups", groupsController::class);
Route::get('groups/{groups_id}/customer', [CustomerController::class, 'viewStores'])->name('groups.store');
Route::view('register','auth.register');
Route::post("store",[registerController::class,'store']);
Route::view('home','home');
Route::view('login','auth.login');
Route::post('authendicate',[loginController::class,'authendicate']);
//Route::get('logout',[loginController::class.'logout']);
Route::get('logout',[loginController::class, 'logout']);
Route::resource("/sales", SaleController::class);
Route::resource("/saleItems", SaleItemController::class);
// Route::get("/view_invoice", SaleItemController::class);


Route::get('/admincart/{id}', [SaleController::class, 'admincart']);
Route::post('/admincart/{id}/show2', [SaleController::class, 'show2']);
Route::get('/admincart/invoice/{id}', [SaleController::class, 'viewInvoice']);
Route::get('/admincart/invoice/{id}/generate', [SaleController::class, 'generateInvoice']);
Route::resource("/tax", TaxController::class);




