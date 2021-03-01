<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\TableController;
use App\Http\Controllers\API\SessionController;
use App\Http\Controllers\API\PeriodController;

Route::middleware('jwt-auth')->group(function () {

    Route::post('items',[ItemController::class,'getItemsByCategoryID'])->name('items');
    Route::post('type_items',[ItemController::class,'getItemsByTypeID']);


    Route::post('sell_items',[OrderController::class,'orderItems']);

    Route::get('tables',[TableController::class,'getTables']);

    Route::post('start_session',[SessionController::class,'startSession']);
    Route::post('session_details',[SessionController::class,'getSessionById']);
    Route::post('order_items',[SessionController::class,'orderItems'])->name('order_items');
    Route::post('cancel_order_items',[SessionController::class,'orderItems'])->name('cancel_order_items');
    Route::post('get_order_items',[SessionController::class,'getOrderItems']);
    Route::get('current_time',[SessionController::class,'getCurrentTime']);
    Route::post('end_session',[SessionController::class,'endSession']);

    Route::post('start_period',[PeriodController::class,'startPeriod']);
    Route::post('restart_period',[PeriodController::class,'restartPeriod']);
    Route::post('end_period',[PeriodController::class,'endPeriod']);
    Route::post('get_table_periods',[PeriodController::class,'getAllPeriodsBySessionId']);
});

Route::post('login',[LoginController::class,'login'])->name('login');
Route::post('categories',[ItemController::class,'getItemCategoriesByType'])->name('categories');
