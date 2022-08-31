<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
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
Route::resource('/Admin/EmployeeList', AdminEmployeeController::class);
Route::resource('/HumanResources/EmployeeList', HumanResourcesEmployeeController::class);
Route::resource('/Admin/EmployeePayroll', AdminEmployeePayrollController::class);
Route::resource('/Accounting/EmployeePayroll', AccountingEmployeePayrollController::class);
Route::resource('/Admin/DetachmentsWages', AdminDetachmentController::class);
Route::resource('/HumanResources/Detachments', AdminEmployeePayrollController::class);
Route::resource('/Accounting/Wages', AccountingWageController::class);