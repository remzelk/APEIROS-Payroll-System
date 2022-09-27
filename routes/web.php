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
Route::get('/HumanResources/Profile', 'HumanResourcesController@profile')->middleware('IsHumanResources');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings')->middleware('IsHumanResources');
Route::resource('/HumanResources/EmployeeList', HumanResourcesEmployeeController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/Detachments', HumanResourcesDetachmentController::class)->middleware('IsHumanResources');

Route::get('/Accounting', 'AccountingController@index')->name('Accounting.index')->middleware('IsAccounting');
Route::get('/Accounting/Profile', 'AccountingController@profile')->middleware('IsAccounting');
Route::get('/Accounting/AccountSettings', 'AccountingController@accountsettings')->middleware('IsAccounting');
Route::resource('/Accounting/Payroll', AccountingEmployeePayrollController::class)->middleware('IsAccounting');
Route::resource('/Accounting/Wages', AccountingWageController::class)->middleware('IsAccounting');

Route::get('/Employee', 'EmployeesController@index')->name('Employee.index')->middleware('IsEmployee');
Route::get('/Employee/Payslips-Current', 'EmployeesController@payslipscurrent')->middleware('IsEmployee');
Route::get('/Employee/Payslips-Archive', 'EmployeesController@payslipsarchive')->middleware('IsEmployee');
Route::get('/Employee/Schedule', 'EmployeesController@schedule')->middleware('IsEmployee');
Route::get('/Employee/Attendance', 'EmployeesController@attendance')->middleware('IsEmployee');
Route::get('/Employee/LeaveRequest', 'EmployeesController@leaverequest')->middleware('IsEmployee');
Route::get('/Employee/BIRForm2316', 'EmployeesController@bir')->middleware('IsEmployee');
Route::get('/Employee/AccountSettings', 'EmployeesController@accountsettings')->middleware('IsEmployee');
Route::resource('/Employee/Profile', EmployeeProfileController::class)->middleware('IsEmployee');

Route::get('redirects', [App\Http\Controllers\HomeController::class, 'index']);
