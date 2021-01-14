<?php

use App\Http\Controllers\AppAccessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('detailuser-list', [DashboardController::class, 'detailuserList']);

//Management
Route::get('/management/users', [UsersController::class,'index'])->name('users');
Route::get('users-list', [UsersController::class, 'userList']);
Route::get('/management/detail-user', [UsersController::class, 'detail_user'])->name('detail-user');
Route::get('detail-user-list', [UsersController::class, 'detailUserList']);
Route::get('/management/position', [UsersController::class, 'position'])->name('position');
Route::get('position-list', [UsersController::class, 'positionList']);

//Application Access
Route::get('/applicationaccess/application', [AppAccessController::class, 'application'])->name('application');
Route::get('application-list', [AppAccessController::class, 'applicationList']);
Route::get('/applicationaccess/role', [AppAccessController::class, 'role'])->name('role');
Route::get('role-list', [AppAccessController::class, 'roleList']);
Route::get('/applicationaccess/authrole', [AppAccessController::class, 'authRole'])->name('authRole');
Route::get('authrole-list', [AppAccessController::class, 'authRoleList']);
