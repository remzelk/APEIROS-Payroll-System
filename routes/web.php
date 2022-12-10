<?php

Route::get('/', 'HomeController@index');
Route::get('/Contact', 'HomeController@contact');

Auth::routes();


Route::get('/Admin/AccountSettings/ChangePassword', 'AdminChangePasswordController@index')->middleware('IsAdmin');
Route::post('/Admin/AccountSettings/ChangePassword', 'AdminChangePasswordController@changePassword')->name('change.password')->middleware('IsAdmin');
Route::resource('/Admin/AccountSettings/ChangeName', AdminChangeNameController::class)->middleware('IsAdmin');
Route::get('/Admin/AccountSettings', 'AdminController@index')->middleware('IsAdmin');
Route::resource('/Admin/Payroll/SSS', AdminSSSController::class)->middleware('IsAdmin');
Route::resource('/Admin/Payroll', AdminEmployeePayrollController::class)->middleware('IsAdmin');
Route::get('/Admin/Credentials/Register', 'RegisterController@create')->middleware('IsAdmin');
Route::post('/Admin/Credentials/Register', 'RegisterController@store')->middleware('IsAdmin');
Route::get('/Admin/Payroll/{paycode}/{id}', 'AdminEmployeePayrollController@editpayroll')->middleware('IsAdmin');
Route::get('/Admin/BIRForm2316/view/{id}', 'AdminBIRController@view')->middleware('IsAdmin');
Route::get('/Admin/BIRForm2316/download/{id}', 'AdminBIRController@download')->name('adminbir')->middleware('IsAdmin');
Route::get('/Admin/DigitalAttendance/{paycode}/{id}', 'AdminDigitalAttendanceController@editattendance')->middleware('IsAdmin');
Route::get('/Admin/LeaveRequests/Archive', 'AdminLeaveRequestsController@archive')->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Admin', AdminCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/HumanResources', HumanResourcesCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Accounting', AccountingCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Employee', EmployeeCredentialsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Credentials/Chief', ChiefCredentialsController::class)->middleware('IsAdmin');
Route::get('/Admin/Attendance/{paycode}/{id}', 'AdminAttendanceController@attendance')->middleware('IsAdmin');
Route::resource('/Admin/Attendance', AdminAttendanceController::class)->middleware('IsAdmin');
Route::resource('/Admin/DigitalAttendance', AdminDigitalAttendanceController::class)->middleware('IsAdmin');
Route::resource('/Admin/ProfileList', AdminProfileListController::class)->middleware('IsAdmin');
Route::resource('/Admin/SocialBenefits', AdminSocialBenefitsController::class)->middleware('IsAdmin');
Route::resource('/Admin/PayrollCode', AdminPayrollCodeController::class)->middleware('IsAdmin');
Route::resource('/Admin/LeaveRequests', AdminLeaveRequestsController::class)->middleware('IsAdmin');
Route::resource('/Admin/Detachments', AdminDetachmentController::class)->middleware('IsAdmin');
Route::resource('/Admin/BIRForm2316', AdminBIRController::class)->middleware('IsAdmin');
Route::resource('/Admin/AssignDetachments', AdminAssignDetachmentController::class)->middleware('IsAdmin');
Route::resource('/Admin', AdminAnnouncementController::class)->middleware('IsAdmin');

Route::get('/HumanResources/AccountSettings/ChangePassword', 'HumanResourcesChangePasswordController@index')->middleware('IsHumanResources');
Route::post('/HumanResources/AccountSettings/ChangePassword', 'HumanResourcesChangePasswordController@changePassword')->name('hrchange.password')->middleware('IsHumanResources');
Route::resource('/HumanResources/AccountSettings/ChangeName', HumanResourcesChangeNameController::class)->middleware('IsHumanResources');
Route::get('/HumanResources/AccountSettings', 'HumanResourcesController@index')->middleware('IsHumanResources');
Route::get('/HumanResources/DigitalAttendance/{paycode}/{id}', 'HumanResourcesDigitalAttendanceController@editattendance')->middleware('IsHumanResources');
Route::get('/HumanResources/BIRForm2316/view/{id}', 'HumanResourcesBIRController@view')->middleware('IsHumanResources');
Route::get('/HumanResources/BIRForm2316/download/{id}', 'HumanResourcesBIRController@download')->name('hrbir')->middleware('IsHumanResources');
Route::get('/HumanResources/LeaveRequests/Archive', 'HumanResourcesLeaveRequestsController@archive')->middleware('IsHumanResources');
Route::resource('/HumanResources/ProfileList', HumanResourcesProfileListController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/BIRForm2316', HumanResourcesBIRController::class)->middleware('IsHumanResources');
Route::get('/HumanResources/Attendance/{paycode}/{id}', 'HumanResourcesAttendanceController@attendance')->middleware('IsHumanResources');
Route::resource('/HumanResources/Attendance', HumanResourcesAttendanceController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/LeaveRequests', HumanResourcesLeaveRequestsController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/Detachments', HumanResourcesDetachmentController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/DigitalAttendance', HumanResourcesDigitalAttendanceController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources/AssignDetachments', HumanResourcesAssignDetachmentController::class)->middleware('IsHumanResources');
Route::resource('/HumanResources', HumanResourcesAnnouncementController::class)->middleware('IsHumanResources');

Route::get('/Accounting/AccountSettings/ChangePassword', 'AccountingChangePasswordController@index')->middleware('IsAccounting');
Route::post('/Accounting/AccountSettings/ChangePassword', 'AccountingChangePasswordController@changePassword')->name('accountingchange.password')->middleware('IsAccounting');
Route::resource('/Accounting/AccountSettings/ChangeName', AccountingChangeNameController::class)->middleware('IsAccounting');
Route::get('/Accounting/AccountSettings', 'AccountingController@settings')->middleware('IsAccounting');
Route::get('/Accounting', 'AccountingController@index')->name('Accounting.index')->middleware('IsAccounting');
Route::get('/Accounting/Payroll/{paycode}/{id}', 'AccountingEmployeePayrollController@editpayroll')->middleware('IsAccounting');
Route::resource('/Accounting/SocialBenefits', AccountingSocialBenefitsController::class)->middleware('IsAccounting');
Route::resource('/Accounting/Payroll/SSS', AccountingSSSController::class)->middleware('IsAccounting');
Route::resource('/Accounting/Payroll', AccountingEmployeePayrollController::class)->middleware('IsAccounting');
Route::resource('/Accounting/PayrollCode', AccountingPayrollCodeController::class)->middleware('IsAccounting');

Route::get('/Employee/AccountSettings/ChangePassword', 'EmployeeChangePasswordController@index')->middleware('IsEmployee');
Route::post('/Employee/AccountSettings/ChangePassword', 'EmployeeChangePasswordController@changePassword')->name('employeechange.password')->middleware('IsEmployee');
Route::resource('/Employee/AccountSettings/ChangeName', EmployeeChangeNameController::class)->middleware('IsEmployee');
Route::get('/Employee/AccountSettings', 'EmployeesController@settings')->middleware('IsEmployee');
Route::get('/Employee', 'EmployeesController@index')->name('Employee.index')->middleware('IsEmployee');
Route::get('/Employee/BIRForm2316/view/{id}', 'EmployeeBIRController@view')->middleware('IsEmployee');
Route::get('/Employee/BIRForm2316/download/{id}', 'EmployeeBIRController@download')->name('employeebir')->middleware('IsEmployee');
Route::resource('/Employee/BIRForm2316', EmployeeBIRController::class)->middleware('IsEmployee');
Route::resource('/Employee/LeaveRequests', EmployeeLeaveRequestsController::class)->middleware('IsEmployee');
Route::resource('/Employee/Payslips', EmployeePayslipsController::class)->middleware('IsEmployee');
Route::resource('/Employee/Profile', EmployeeProfileController::class)->middleware('IsEmployee');

Route::get('/Chief/AccountSettings/ChangePassword', 'ChiefChangePasswordController@index')->middleware('IsChief');
Route::post('/Chief/AccountSettings/ChangePassword', 'ChiefChangePasswordController@changePassword')->name('chiefchange.password')->middleware('IsChief');
Route::resource('/Chief/AccountSettings/ChangeName', ChiefChangeNameController::class)->middleware('IsChief');
Route::get('/Chief/AccountSettings', 'ChiefController@settings')->middleware('IsChief');
Route::get('/Chief', 'ChiefController@index')->name('Chief.index')->middleware('IsChief');
Route::get('/Chief/BIRForm2316/view/{id}', 'ChiefBIRController@view')->middleware('IsChief');
Route::get('/Chief/BIRForm2316/download/{id}', 'ChiefBIRController@download')->name('chiefbir')->middleware('IsChief');
Route::get('/Chief/Attendance/{paycode}/{id}', 'ChiefAttendanceController@editattendance')->middleware('IsChief');
Route::resource('/Chief/LeaveRequests', ChiefLeaveRequestsController::class)->middleware('IsChief');
Route::resource('/Chief/BIRForm2316', ChiefBIRController::class)->middleware('IsChief');
Route::resource('/Chief/Payslips', ChiefPayslipsController::class)->middleware('IsChief');
Route::resource('/Chief/Attendance', ChiefAttendanceController::class)->middleware('IsChief');
Route::resource('/Chief/Profile', ChiefProfileController::class)->middleware('IsChief');

Route::get('redirects', [App\Http\Controllers\HomeController::class, 'index']);