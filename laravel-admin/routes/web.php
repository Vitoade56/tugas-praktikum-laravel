<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'home']);
Route::get('/product',   [DashboardController::class, 'product']);
Route::get('/service',   [DashboardController::class, 'service']);
Route::get('/contact',   [DashboardController::class, 'contact']);
Route::get('/about',     [DashboardController::class, 'about']);
Route::resource('admin', AdminController::class)->except(['show']);
