<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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


Route::get('/', 'HomeController@index');

Route::get('/Admin/Login', 'AdminController@login');
Route::get('/Admin/EmployeeList', 'AdminController@EmployeeList');
Route::get('/Admin/AccountSettings', 'AdminController@accountsettings');

Route::get('/HumanResources/Login', 'HumanResourcesController@login');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings');

Route::get('/Accounting/Login', 'AccountingController@login');
Route::get('/Accounting/AccountSettings', 'AccountingController@accountsettings');

Route::get('/Employee/Login', 'EmployeesController@login');
Route::get('/Employee/{id}/Profile', 'EmployeesController@profile');
Route::get('/Employee/AccountSettings', 'EmployeesController@accountsettings');


