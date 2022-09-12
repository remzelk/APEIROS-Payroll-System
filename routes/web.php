<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'HomeController@index');
Route::get('/Contact', 'HomeController@contact');

Route::get('/Admin', 'AdminController@index');
Route::get('/Admin/Profile', 'AdminController@profile');
Route::get('/Admin/AccountSettings', 'AdminController@accountsettings');
Route::get('/Admin/Credentials/Register', 'RegisterController@create');
Route::post('/Admin/Credentials/Register', 'RegisterController@store');

Route::get('/HumanResources', 'HumanResourcesController@index');
Route::get('/HumanResources/Profile', 'HumanResourcesController@profile');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings');

Route::get('/Accounting', 'AccountingController@index');
Route::get('/Accounting/Profile', 'AccountingController@profile');
Route::get('/Accounting/AccountSettings', 'AccountingController@accountsettings');

Route::get('/Employee', 'EmployeesController@index');
Route::get('/Employee/Profile', 'EmployeesController@profile');
Route::get('/Employee/Payslips-Current', 'EmployeesController@payslipscurrent');
Route::get('/Employee/Payslips-Archive', 'EmployeesController@payslipsarchive');
Route::get('/Employee/Schedule', 'EmployeesController@schedule');
Route::get('/Employee/Attendance', 'EmployeesController@attendance');
Route::get('/Employee/LeaveRequest', 'EmployeesController@leaverequest');
Route::get('/Employee/BIRForm2316', 'EmployeesController@bir');
Route::get('/Employee/AccountSettings', 'EmployeesController@accountsettings');

Route::resource('/Admin/Credentials/Admin', AdminCredentialsController::class);
Route::resource('/Admin/Credentials/HumanResources', HumanResourcesCredentialsController::class);
Route::resource('/Admin/Credentials/Accounting', AccountingCredentialsController::class);
Route::resource('/Admin/Credentials/Employee', EmployeeCredentialsController::class);
Route::resource('/Admin/EmployeeList', AdminEmployeeController::class);
Route::resource('/HumanResources/EmployeeList', HumanResourcesEmployeeController::class);
Route::resource('/Admin/Payroll', AdminEmployeePayrollController::class);
Route::resource('/Accounting/Payroll', AccountingEmployeePayrollController::class);
Route::resource('/Admin/DetachmentsWages', AdminDetachmentController::class);
Route::resource('/HumanResources/Detachments', HumanResourcesDetachmentController::class);
Route::resource('/Accounting/Wages', AccountingWageController::class);