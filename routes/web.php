<?php
use App\Models\Application;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/Contact', 'HomeController@contact');

Auth::routes();


Route::get('/Admin/AccountSettings', 'AdminController@accountsettings')->middleware('IsAdmin');
Route::get('/Admin/Credentials/Register', 'RegisterController@create')->middleware('IsAdmin');
Route::post('/Admin/Credentials/Register', 'RegisterController@store')->middleware('IsAdmin');
Route::get('/Admin/ApplicationList/download/{id}', 'AdminApplicationController@download')->name('downloadapplication')->middleware('IsAdmin');
Route::get('/Admin/Attendance/download/{id}', 'AdminAttendanceController@download')->name('downloadattendance')->middleware('IsAdmin');
Route::get('/Admin/Attendance/view/{id}', 'AdminAttendanceController@view')->name('viewattendance')->middleware('IsAdmin');
Route::get('/Admin/Payroll/{paycode}/{id}', 'AdminEmployeePayrollController@editpayroll')->middleware('IsAdmin');
Route::get('/Admin/DigitalAttendance/{paycode}/{id}', 'AdminDigitalAttendanceController@editattendance')->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Admin', AdminCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/HumanResources', HumanResourcesCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Accounting', AccountingCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Employee', EmployeeCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Chief', ChiefCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Application', AdminApplicationController::class)->middleware('IsAdmin');
Route::resource('/Admin/Attendance', AdminAttendanceController::class)->middleware('IsAdmin');
Route::resource('/Admin/DigitalAttendance', AdminDigitalAttendanceController::class)->middleware('IsAdmin');
Route::resource('/Admin/SocialBenefits', AdminSocialBenefitsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Payroll', AdminEmployeePayrollController::class)->middleware('IsAdmin');
Route::resource('/Admin/PayrollCode', AdminPayrollCodeController::class)->middleware('IsAdmin');
Route::resource('/Admin/Detachments', AdminDetachmentController::class)->middleware('IsAdmin');
Route::resource('/Admin/AssignDetachments', AdminAssignDetachmentController::class)->middleware('IsAdmin');
Route::resource('/Admin', AdminAnnouncementController::class)->middleware('IsAdmin');

Route::get('/HumanResources/ApplicationList/download/{id}', 'HumanResourcesApplicationController@download')->name('hrdownloadapplication')->middleware('IsHumanResources');
Route::get('/HumanResources/Attendance/download/{id}', 'HumanResourcesAttendanceController@download')->name('hrdownloadattendance')->middleware('HumanResources');
Route::get('/HumanResources/Attendance/view/{id}', 'HumanResourcesAttendanceController@view')->name('hrviewattendance')->middleware('IsHumanResources');
Route::get('/HumanResources/DigitalAttendance/{paycode}/{id}', 'HumanResourcesDigitalAttendanceController@editattendance')->middleware('IsHumanResources');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@accountsettings')->middleware('IsHumanResources');
Route::resource('/HumanResources/ApplicationList', HumanResourcesApplicationController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/Attendance', HumanResourcesAttendanceController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/Detachments', HumanResourcesDetachmentController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/DigitalAttendance', HumanResourcesDigitalAttendanceController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/AssignDetachments', HumanResourcesAssignDetachmentController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources', HumanResourcesAnnouncementController::class)->middleware('IsHumanResources');

Route::get('/Accounting', 'AccountingController@index')->name('Accounting.index')->middleware('IsAccounting');
Route::get('/Accounting/AccountSettings', 'AccountingController@accountsettings')->middleware('IsAccounting');
Route::get('/Accounting/Payroll/{paycode}/{id}', 'AccountingEmployeePayrollController@editpayroll')->middleware('IsAccounting');
Route::resource('/Accounting/SocialBenefits', AccountingSocialBenefitsController::class)->middleware('IsAccounting');
Route::resource('/Accounting/Payroll', AccountingEmployeePayrollController::class)->middleware('IsAccounting');
Route::resource('/Accounting/PayrollCode', AccountingPayrollCodeController::class)->middleware('IsAccounting');

Route::get('/Employee', 'EmployeesController@index')->name('Employee.index')->middleware('IsEmployee');
Route::get('/Employee/LeaveRequest', 'EmployeesController@leaverequest')->middleware('IsEmployee');
Route::get('/Employee/BIRForm2316', 'EmployeesController@bir')->middleware('IsEmployee');
Route::get('/Employee/AccountSettings', 'EmployeesController@accountsettings')->middleware('IsEmployee');
Route::resource('/Employee/Payslips', EmployeePayslipsController::class)->middleware('IsEmployee');
Route::resource('/Employee/Application', EmployeeApplicationController::class)->middleware('IsEmployee');

Route::get('/Chief', 'ChiefController@index')->name('Chief.index')->middleware('IsChief');
Route::get('/Chief/LeaveRequest', 'ChiefController@leaverequest')->middleware('IsChief');
Route::get('/Chief/BIRForm2316', 'ChiefController@bir')->middleware('IsChief');
Route::get('/Chief/AccountSettings', 'ChiefController@accountsettings')->middleware('IsChief');
Route::resource('/Chief/Payslips', ChiefPayslipsController::class)->middleware('IsChief');
Route::resource('/Chief/Attendance', ChiefAttendanceController::class)->middleware('IsChief');
Route::resource('/Chief/Application', ChiefApplicationController::class)->middleware('IsChief');

Route::get('redirects', [App\Http\Controllers\HomeController::class, 'index']);
