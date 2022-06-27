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
Route::get('/Admin', 'AdminController@index');
Route::get('/Admin/Profile', 'AdminController@profile');
Route::get('/Admin/EmployeeList', 'AdminController@employeelist');
Route::get('/Admin/EmployeeList/Add', 'AdminController@addemployee');
Route::get('/Admin/Detachments', 'AdminController@detachments');
Route::get('/Admin/Detachments/Add', 'AdminController@adddetachments');
Route::get('/Admin/Detachments/Edit', 'AdminController@editdetachments');
Route::get('/Admin/Wages', 'AdminController@wages');
Route::get('/Admin/Wages/Add', 'AdminController@addwages');
Route::get('/Admin/Wages/Edit', 'AdminController@editwages');
Route::get('/Admin/EmployeePayroll', 'AdminController@employeepayroll');
Route::get('/Admin/AccountSettings', 'AdminController@accountsettings');

Route::get('/HumanResources/Login', 'HumanResourcesController@login');
Route::get('/HumanResources', 'HumanResourcesController@index');
Route::get('/HumanResources/Profile', 'HumanResourcesController@profile');
Route::get('/HumanResources/EmployeeList', 'HumanResourcesController@employeelist');
Route::get('/HumanResources/EmployeeList/Add', 'HumanResourcesController@addemployee');
Route::get('/HumanResources/Detachments', 'HumanResourcesController@detachments');
Route::get('/HumanResources/Detachments/Add', 'HumanResourcesController@adddetachments');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings');

Route::get('/Accounting/Login', 'AccountingController@login');
Route::get('/Accounting', 'AccountingController@index');
Route::get('/Accounting/Profile', 'AccountingController@profile');
Route::get('/Accounting/EmployeePayroll', 'AccountingController@employeepayroll');
Route::get('/Accounting/Wages', 'AccountingController@wages');
Route::get('/Accounting/AccountSettings', 'AccountingController@accountsettings');

Route::get('/Employee/Login', 'EmployeesController@login');
Route::get('/Employee', 'EmployeesController@index');
Route::get('/Employee/Profile', 'EmployeesController@profile');
Route::get('/Employee/Payslips', 'EmployeesController@payslips');
Route::get('/Employee/Schedule', 'EmployeesController@schedule');
Route::get('/Employee/Attendance', 'EmployeesController@attendance');
Route::get('/Employee/LeaveRequest', 'EmployeesController@leaverequest');
Route::get('/Employee/BIRForm2316', 'EmployeesController@bir');
Route::get('/Employee/AccountSettings', 'EmployeesController@accountsettings');


