<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master2');
});

Route::get('/Dashboard', [DashboardController::class, 'index']);
Route::get('users-list', [DashboardController::class, 'userList']);
Route::get('position-list', [DashboardController::class, 'positionList']);
Route::get('detailuser-list', [DashboardController::class, 'detailuserList']);
