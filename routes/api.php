<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\TableController;
use App\Http\Controllers\API\SessionController;

Route::middleware('jwt-auth')->group(function () {
    Route::post('categories',[ItemController::class,'getItemCategoriesByType'])->name('categories');
    Route::post('items',[ItemController::class,'getItemsByCategoryID'])->name('items');

    Route::post('sell_items',[OrderController::class,'orderItems']);

    Route::get('tables',[TableController::class,'getTables']);

    Route::post('start_session',[SessionController::class,'startSession']);
    Route::get('get_time',[SessionController::class,'getTime']);
});



Route::post('login',[LoginController::class,'login'])->name('login');
