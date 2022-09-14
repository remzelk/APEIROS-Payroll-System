<?php
use Illuminate\Support\Facades\Route;
Route::get('/', 'HomeController@index');
Route::get('/Contact', 'HomeController@contact');

Auth:: routes();

Route::get('/Admin', 'AdminController@index')->name('Admin.index')->middleware('IsAdmin');
Route::get('/Admin/Profile', 'AdminController@profile')->name('Admin.profile')->middleware('IsAdmin');
Route::get('/Admin/AccountSettings', 'AdminController@accountsettings')->middleware('IsAdmin');
Route::get('/Admin/Credentials/Register', 'RegisterController@create')->middleware('IsAdmin');
Route::post('/Admin/Credentials/Register', 'RegisterController@store')->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Admin', AdminCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/HumanResources', HumanResourcesCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Accounting', AccountingCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Employee', EmployeeCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/EmployeeList', AdminEmployeeController::class)->middleware('IsAdmin');
Route::resource('/Admin/Payroll', AdminEmployeePayrollController::class)->middleware('IsAdmin');
Route::resource('/Admin/DetachmentsWages', AdminDetachmentController::class)->middleware('IsAdmin');


Route::get('/HumanResources', 'HumanResourcesController@index')->name('HumanResources.index')->middleware('IsHumanResources');
Route::get('/HumanResources/Profile', 'HumanResourcesController@profile');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings');
Route::resource('/HumanResources/EmployeeList', HumanResourcesEmployeeController::class);
Route::resource('/HumanResources/Detachments', HumanResourcesDetachmentController::class);

Route::get('/Accounting', 'AccountingController@index')->name('Accounting.index')->middleware('IsAccounting');
Route::get('/Accounting/Profile', 'AccountingController@profile');
Route::get('/Accounting/AccountSettings', 'AccountingController@accountsettings');
Route::resource('/Accounting/Payroll', AccountingEmployeePayrollController::class);
Route::resource('/Accounting/Wages', AccountingWageController::class);

Route::get('/Employee', 'EmployeesController@index')->name('Employee.index')->middleware('IsEmployee');
Route::get('/Employee/Profile', 'EmployeesController@profile');
Route::get('/Employee/Payslips-Current', 'EmployeesController@payslipscurrent');
Route::get('/Employee/Payslips-Archive', 'EmployeesController@payslipsarchive');
Route::get('/Employee/Schedule', 'EmployeesController@schedule');
Route::get('/Employee/Attendance', 'EmployeesController@attendance');
Route::get('/Employee/LeaveRequest', 'EmployeesController@leaverequest');
Route::get('/Employee/BIRForm2316', 'EmployeesController@bir');
Route::get('/Employee/AccountSettings', 'EmployeesController@accountsettings');

Route::get('redirects', [App\Http\Controllers\HomeController::class, 'index']);
