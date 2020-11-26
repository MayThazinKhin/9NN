<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\StaffController;
use App\Http\Controllers\WEB\TableController;
use App\Http\Controllers\WEB\MemberController;
use App\Http\Controllers\WEB\ItemController;
use App\Http\Controllers\WEB\InventoryController;
use App\Http\Controllers\WEB\FinancialController;

//staffs
Route::resource('staffs',StaffController::class);
Route::post('/staffs/search',[StaffController::class,'search'])->name('staffs.search');
Route::post('/staffs/change_password/{staff}',[StaffController::class,'changePassword'])->name('staffs.change_password');

//Items
Route::resource('items',ItemController::class);
Route::post('/items/search',[ItemController::class,'search'])->name('items.search');

//Members
Route::resource('members',MemberController::class);
Route::post('/members/search',[MemberController::class,'search'])->name('members.search');

//Tables
Route::resource('tables',TableController::class);
Route::post('/tables/search',[TableController::class,'search'])->name('tables.search');

//Inventories
Route::get('/inventories',[InventoryController::class,'index'])->name('inventory.index');
Route::get('/inventories/create',[InventoryController::class,'create'])->name('inventory.create');
Route::post('/inventories/create',[InventoryController::class,'store'])->name('inventory.store');

//Financial
Route::get('/financial',[FinancialController::class,'index'])->name('financial.index');




