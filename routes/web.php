<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Http;
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


Route::get('list', [App\Http\Controllers\EmployeesController::class, 'listEmployees']);
Route::get('list/{email}', [App\Http\Controllers\EmployeesController::class, 'SearchEmployeesEmail']);
Route::get('list/{min}/{max}', [App\Http\Controllers\EmployeesController::class, 'SearchEmployeesSalary']);
Route::get('details/{id}', [App\Http\Controllers\EmployeesController::class, 'DetailsEmployees']);
