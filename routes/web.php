<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\AdminController;

Route::resource('admins',AdminController::class);
