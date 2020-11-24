<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\StaffController;
use App\Http\Controllers\WEB\TableController;
use App\Http\Controllers\WEB\MemberController;
use App\Http\Controllers\WEB\ItemController;


Route::resource('staffs',StaffController::class);
Route::resource('items',ItemController::class);
Route::resource('members',MemberController::class);
Route::resource('tables',TableController::class);

