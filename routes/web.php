<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\StaffController;
use App\Http\Controllers\WEB\TableController;
use App\Http\Controllers\WEB\MemberController;
use App\Http\Controllers\WEB\ItemController;
use App\Http\Controllers\WEB\InventoryController;
use App\Http\Controllers\WEB\FinancialController;
use App\Http\Controllers\WEB\BarController;
use App\Http\Controllers\WEB\InvoiceController;
use App\Http\Controllers\WEB\CancelItemController;
use App\Http\Controllers\WEB\LoginController;
use App\Http\Controllers\WEB\ReceiptController;

//login
Route::get('',[LoginController::class,'index']);
Route::get('login',[LoginController::class,'index']);
Route::post('login',[LoginController::class,'login'])->name('staff_login');
Route::get('logout',[LoginController::class,'logout'])->name('staff_logout');

Route::middleware('can:isAdmin')->group(function () {
    //staffs
    Route::resource('staffs',StaffController::class);
    Route::post('/staffs/search',[StaffController::class,'search'])->name('staffs.search');
    Route::post('/staffs/change_password/{staff}',[StaffController::class,'changePassword'])->name('staffs.change_password');

    //Items
    Route::resource('items',ItemController::class);
    Route::post('/items/search',[ItemController::class,'search'])->name('items.search');
    Route::post('categories',[ItemController::class,'getItemCategoriesByType'])->name('type_categories');

    //Bars
    Route::resource('bars',BarController::class);
    Route::post('/bars/search',[BarController::class,'search'])->name('bars.search');

    //Members
    Route::resource('members',MemberController::class);
    Route::post('/members/search',[MemberController::class,'search'])->name('members.search');

    //Tables
    Route::resource('tables',TableController::class);
    Route::post('/tables/search',[TableController::class,'search'])->name('tables.search');

    //Inventories
    Route::get('/inventories',[InventoryController::class,'index'])->name('inventory.index');
    Route::get('/inventories/create',[InventoryController::class,'create'])->name('inventory.create');
    Route::post('/inventories',[InventoryController::class,'store'])->name('inventory.store');
    Route::post('items_for_inv',[ItemController::class,'getItemsByTypeID'])->name('items.inventory');
});

Route::middleware('can:isCashier')->group(function () {
    //Invoice
    Route::get('invoices',[InvoiceController::class,'index'])->name('invoice');
    Route::get('invoice_detail/{id}',[InvoiceController::class,'detail'])->name('invoice.detail');
    Route::post('invoice_update',[InvoiceController::class,'update'])->name('invoice.update');

    //Receipt
    Route::get('receipts',[ReceiptController::class,'index'])->name('receipt');
    Route::get('receipt_detail/{id}',[ReceiptController::class,'detail'])->name('receipt.detail');
    Route::post('receipt_update',[ReceiptController::class,'update'])->name('receipt.update');

    //Credit
    Route::get('credits',[InvoiceController::class,'getCredits'])->name('credits');
});

Route::middleware('can:isKitchenStaff')->group(function () {
    //cancel_item
    Route::get('cancel_items',[CancelItemController::class,'index'])->name('cancel_items');

    //kitchen_item
    Route::get('kitchen_items',[CancelItemController::class,'kitchenItems'])->name('kitchen_items');
    Route::post('update_kitchen_status/{item}',[CancelItemController::class,'updateKitchenStatus'])->name('update_kitchen_status');
});

Route::middleware('can:isAccountant')->group(function () {
    //Financial
    Route::get('/financial',[FinancialController::class,'index'])->name('financial.index');
    Route::get('/secondary/{id}',[FinancialController::class,'secondary'])->name('secondary');
});


















Route::get("/index", function(){
    return view("menu_invoice.index");
});

Route::get("/detail", function(){
    return view("menu_invoice.detail");
});
