<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\StaffController;
use App\Http\Controllers\WEB\TableController;
use App\Http\Controllers\WEB\MemberController;
use App\Http\Controllers\WEB\ItemController;


Route::resource('staff',StaffController::class);
Route::resource('item',ItemController::class);
Route::resource('member',MemberController::class);
Route::resource('table',TableController::class);

