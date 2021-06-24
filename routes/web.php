<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\StaffController;
use App\Http\Controllers\WEB\TableController;
use App\Http\Controllers\WEB\MemberController;
use App\Http\Controllers\WEB\ItemController;
use App\Http\Controllers\WEB\InventoryController;
use App\Http\Controllers\WEB\BarController;
use App\Http\Controllers\WEB\InvoiceController;
use App\Http\Controllers\WEB\CancelItemController;
use App\Http\Controllers\WEB\LoginController;
use App\Http\Controllers\WEB\ReceiptController;
use App\Http\Controllers\WEB\AccountController;
use App\Http\Controllers\WEB\AdvanceController;
use App\Http\Controllers\WEB\CashController;
use App\Http\Controllers\WEB\PowerMoodController;
use App\Http\Controllers\WEB\InventoryTransferController;

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

    //General Items
    Route::get('general_item',[ItemController::class,'general'])->name('general.index');
//    Route::post('/general-items/search',[ItemController::class,'general_search'])->name('general.search');

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
    Route::get('/inventory_list',[InventoryController::class,'getItemList'])->name('inventory.list');
    Route::post('/inventory_transfer',[InventoryController::class,'transferItems'])->name('inventory.transfer');
    Route::post('/items_for_inv',[ItemController::class,'getItemsByTypeID'])->name('items.inventory');


    //Account
    Route::get('/monthly_financial',[AccountController::class,'monthly'])->name('monthly_financial.index');
    Route::post('/monthly_filter',[AccountController::class,'monthly_filter'])->name('monthly_financial.filter');
    Route::patch('ledger_update/{ledger}',[AccountController::class,'update'])->name('ledgers.update');
    Route::delete('ledgers/{ledger}',[AccountController::class,'delete'])->name('ledgers.delete');
    Route::get('/cash',[CashController::class,'index'])->name('cash.index');
    Route::get('/withdraw',[CashController::class,'withdraw'])->name('withdraw');

    //Advance
    Route::get('advance_transaction',[AdvanceController::class,'index'])->name('transaction.index');

});

Route::middleware('can:isCashier')->group(function () {
    //Invoice
    Route::get('invoices',[InvoiceController::class,'index'])->name('invoice');
    Route::get('invoice_detail/{id}',[InvoiceController::class,'detail'])->name('invoice.detail');
    Route::post('invoice_update',[InvoiceController::class,'update'])->name('invoice.update');
    Route::get('done_invoices',[InvoiceController::class,'done_index'])->name('done_invoice');
    Route::get('done_invoice_detail/{id}',[InvoiceController::class,'done_detail'])->name('done_invoice.detail');

    //Receipt
    Route::get('receipts',[ReceiptController::class,'index'])->name('receipt');
    Route::get('receipt_detail/{id}',[ReceiptController::class,'detail'])->name('receipt.detail');
    Route::get('done_receipts',[ReceiptController::class,'done_index'])->name('done_receipt');
    Route::get('done_receipt_detail/{id}',[ReceiptController::class,'done_detail'])->name('done_receipt.detail');
    Route::post('receipt_update',[ReceiptController::class,'update'])->name('receipt.update');

    //Credit
    Route::get('credits',[InvoiceController::class,'getCredits'])->name('credits');
    Route::post('pay_credits',[InvoiceController::class,'payCredit'])->name('pay_credits');

    //Power Mode
    Route::post('power_switch',[PowerMoodController::class,'switch'])->name('power_switch');


});


Route::middleware('can:isKitchenStaff')->group(function () {
    //Inventory
    Route::get('/transfer_item',[InventoryTransferController::class,'getTransferItem'])->name('transfer.item');
    Route::post('/confirm_item/{id}',[InventoryTransferController::class,'confirmItems'])->name('confirm.item');
    Route::get('/item_list',[InventoryTransferController::class,'getItemList'])->name('item.list');

    //cancel_item
    Route::get('cancel_items',[CancelItemController::class,'index'])->name('cancel_items');

    //kitchen_item
    Route::get('kitchen_items',[CancelItemController::class,'kitchenItems'])->name('kitchen_items');
    Route::post('update_kitchen_status/{kitchen_item}',[CancelItemController::class,'updateKitchenStatus'])->name('update_kitchen_status');
});

Route::get('/financial',[AccountController::class,'index'])->name('financial.index');
Route::post('account_title',[AccountController::class,'title'])->name('account_title');
Route::get('account_type',[AccountController::class,'type'])->name('account_type');
Route::post('ledger_create',[AccountController::class,'create'])->name('ledgers.create');

Route::get('account_staff',[AdvanceController::class,'staff'])->name('account_staff');

Route::view('/index', 'inventory_management.index');
Route::view('/create', 'log.create');
