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
Route::get('/Admin/AccountSettings', 'AdminController@accountsettings');

Route::get('/HumanResources/Login', 'HumanResourcesController@login');
Route::get('/HumanResources', 'HumanResourcesController@index');
Route::get('/HumanResources/Profile', 'HumanResourcesController@profile');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings');

Route::get('/Accounting/Login', 'AccountingController@login');
Route::get('/Accounting', 'AccountingController@index');
Route::get('/Accounting/Profile', 'AccountingController@profile');
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

Route::resource('/Admin/AdminCredentials', AdminCredentialsController::class);
Route::resource('/Admin/HumanResourcesCredentials', AdminCredentialsController::class);
Route::resource('/Admin/AccountingCredentials', AdminCredentialsController::class);
Route::resource('/Admin/EmployeeCredentials', AdminCredentialsController::class);
Route::resource('/Admin/EmployeeList', AdminEmployeeListController::class);
Route::resource('/HumanResources/EmployeeList', HumanResourcesEmployeeListController::class);
Route::resource('/Admin/EmployeePayroll', AdminEmployeePayrollController::class);
Route::resource('/Accounting/EmployeePayroll', AccountingEmployeePayrollController::class);
Route::resource('/Admin/Detachments', AdminDetachmentController::class);
Route::resource('/HumanResources/Detachments', AdminEmployeePayrollController::class);
Route::resource('/Admin/Wages', AdminWageController::class);
Route::resource('/Accounting/Wages', AccountingWageController::class);