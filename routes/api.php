<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\LoginController;

Route::middleware('jwt-auth')->group(function () {
    Route::post('categories',[ItemController::class,'getItemCategoriesByType'])->name('categories');
    Route::post('items',[ItemController::class,'getItemsByCategoryID'])->name('items');
});


Route::post('login',[LoginController::class,'login'])->name('login');
