<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContractsController;
//use App\Http\Controllers\Contract_docController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\OperationalsController;
use App\Http\Controllers\Progress_statusController;

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

// Route::get('/', function () {
//     return view('welcome');
Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/login/api/ui', [AuthController::class, 'callapiusinglaravelui'])->name('loginui');

Route:: view('/operationals','v_operational')->middleware('authapi');
Route::resource('/',ClientsController::class)->middleware('authapi');
// Route::resource('/',[ClientsController::class]);
Route::resource('/contracts',ContractsController::class)->middleware('authapi');
Route::get('/contracts/{contract}/ammend', [ContractsController::class, 'ammend'])->middleware('authapi');
Route::put('/contracts/{contract}', [ContractsController::class, 'upammend'])->middleware('authapi');
Route::post('/contract_doc/{contract_doc}', [ContractsController::class, 'destroyDoc'])->middleware('authapi');

Route::resource('/projects', ProjectsController::class)->middleware('authapi');
Route::get('/projects/{project}/ammend', [ProjectsController::class, 'ammend'])->middleware('authapi');
Route::put('/projects/{project}', [ProjectsController::class, 'upammend'])->middleware('authapi');
Route::post('/progress_item/{progress_item}', [ProjectsController::class, 'destroyItem'])->middleware('authapi');
Route::post('/project_cost/{project_cost}', [ProjectsController::class, 'destroyCost'])->middleware('authapi');

Route::resource('/operationals', OperationalsController::class)->middleware('authapi');
Route::post('/progress_doc', [OperationalsController::class, 'uploadProgress'])->middleware('authapi');
Route::get('/changestatus/{changestatus}', [OperationalsController::class, 'changeStatus'])->middleware('authapi');
Route::get('/progress_doc/{progress_doc}', [OperationalsController::class, 'destroyDoc'])->middleware('authapi');

Route::resource('/progress_status', Progress_statusController::class)->middleware('authapi');
