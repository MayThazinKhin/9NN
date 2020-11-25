<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\StaffController;
use App\Http\Controllers\WEB\TableController;
use App\Http\Controllers\WEB\MemberController;
use App\Http\Controllers\WEB\ItemController;


Route::resource('staffs',StaffController::class);
Route::post('/staffs/search',[StaffController::class,'search'])->name('staffs.search');
Route::resource('items',ItemController::class);
Route::resource('members',MemberController::class);
Route::post('/members/search',[MemberController::class,'search'])->name('members.search');
Route::resource('tables',TableController::class);
Route::post('/tables/search',[TableController::class,'search'])->name('tables.search');

