<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\StudentClassController;
use App\Http\Controllers\backend\setup\StudentYearController;
use App\Http\Controllers\backend\setup\StudentGroupController;
use App\Http\Controllers\backend\setup\StudentShiftController;
use App\Http\Controllers\backend\setup\Student_FeeCategoryController;
use App\Http\Controllers\backend\setup\Student_FeeAmountController;
use App\Http\Controllers\backend\setup\ExamTypeController;
use App\Http\Controllers\backend\setup\SchoolSubjectController;
use App\Http\Controllers\backend\setup\AssignSubjectController;
use App\Http\Controllers\backend\setup\DesignationController;
use App\Http\Controllers\backend\student\StudentRegController;
use App\Http\Controllers\backend\student\StudentRollController;
use App\Http\Controllers\backend\student\RegistrationFeeController;
use App\Http\Controllers\backend\student\MonthlyFeeController;
use App\Http\Controllers\backend\student\ExamFeeController;
use App\Http\Controllers\backend\employee\EmployeeRegController;
use App\Http\Controllers\backend\employee\EmployeeSalaryController;
use App\Http\Controllers\backend\employee\EmployeeLeaveController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Admin.index');
})->name('dashboard');

Route::group(['middleware' => 'auth'],function(){

// student All Route
Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

// student data

Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class, 'UserView'])->name('user.view'); 
    Route::get('/add',[UserController::class, 'UserAdd'])->name('user.add'); 
    Route::post('/store',[UserController::class, 'UserStore'])->name('user.store'); 
    Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('user.edit'); 
    Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('user.update'); 
    Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('user.delete'); 
});

// student profile

Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class, 'ProfileEdit'])->name('profile.edit'); 
    Route::post('/store',[ProfileController::class, 'ProfileStore'])->name('profile.store'); 
    Route::get('/password/view',[ProfileController::class, 'PasswordView'])->name('password.view'); 
    Route::post('/password/update',[ProfileController::class, 'PasswordUpdate'])->name('password.updatee');  
 

});

// student setup management
// student class 

Route::prefix('setups')->group(function(){
    Route::get('/student/class/view',[StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add',[StudentClassController::class, 'AddStudent'])->name('student.class.add');
    Route::post('/student/class/store',[StudentClassController::class, 'StoreStudent'])->name('student.class.store');
    Route::get('/student/class/edit/{id}',[StudentClassController::class, 'EditStudent'])->name('student.class.edit');
    Route::post('/student/class/update/{id}',[StudentClassController::class, 'UpdateStudent'])->name('student.class.update');
    Route::get('/student/class/delete/{id}',[StudentClassController::class, 'DeleteStudent'])->name('student.class.delete');

// student year route
    Route::get('/student/year/view',[StudentYearController::class, 'ViewYearStudent'])->name('student.year.view');
    Route::get('/student/year/add',[StudentYearController::class, 'AddYearStudent'])->name('student.year.add');
    Route::post('/student/year/store',[StudentYearController::class, 'StoreYearStudent'])->name('student.year.store');
    Route::get('/student/year/edit/{id}',[StudentYearController::class, 'EditYearStudent'])->name('student.year.edit');
    Route::post('/student/year/update/{id}',[StudentYearController::class, 'UpdateYearStudent'])->name('student.year.update');
    Route::get('/student/year/delete/{id}',[StudentYearController::class, 'DeleteYearStudent'])->name('student.year.delete');

    
// student group route
    Route::get('/student/group/view',[StudentGroupController::class, 'ViewGroupStudent'])->name('student.group.view');
    Route::get('/student/group/add',[StudentGroupController::class, 'AddGroupStudent'])->name('student.group.add');
    Route::post('/student/group/store',[StudentGroupController::class, 'StoreGroupStudent'])->name('student.group.store');
    Route::get('/student/group/edit/{id}',[StudentGroupController::class, 'EditGroupStudent'])->name('student.group.edit');
    Route::post('/student/group/update/{id}',[StudentGroupController::class, 'UpdateGroupStudent'])->name('student.group.update');
    Route::get('/student/group/delete/{id}',[StudentGroupController::class, 'DeleteGroupStudent'])->name('student.group.delete');

// student shift route
    Route::get('/student/shift/view',[StudentShiftController::class, 'ViewShiftStudent'])->name('student.shift.view');
    Route::get('/student/shift/add',[StudentShiftController::class, 'AddShiftStudent'])->name('student.shift.add');
    Route::post('/student/shift/store',[StudentShiftController::class, 'StoreShiftStudent'])->name('student.shift.store');
    Route::get('/student/shift/edit/{id}',[StudentShiftController::class, 'EditShiftStudent'])->name('student.shift.edit');
    Route::post('/student/shift/update/{id}',[StudentShiftController::class, 'UpdateShiftStudent'])->name('student.shift.update');
    Route::get('/student/shift/delete/{id}',[StudentShiftController::class, 'DeleteShiftStudent'])->name('student.shift.delete');

// student fee category route
    Route::get('/student/fee/cat/view',[Student_FeeCategoryController::class, 'ViewFeeCatStudent'])->name('student.fee.cat.view');
    Route::get('/student/fee/cat/add',[Student_FeeCategoryController::class, 'AddFeeCatStudent'])->name('student.fee.cat.add');
    Route::post('/student/fee/cat/store',[Student_FeeCategoryController::class, 'StoreFeeCatStudent'])->name('student.fee.cat.store');
    Route::get('/student/fee/cat/edit/{id}',[Student_FeeCategoryController::class, 'EditFeeCatStudent'])->name('student.fee.cat.edit');
    Route::post('/student/fee/cat/update/{id}',[Student_FeeCategoryController::class, 'UpdateFeeCatStudent'])->name('student.fee.cat.update');
    Route::get('/student/fee/cat/delete/{id}',[Student_FeeCategoryController::class, 'DeleteFeeCatStudent'])->name('student.fee.cat.delete');

// student fee Amount route
    Route::get('/student/fee/amount/view',[Student_FeeAmountController::class, 'ViewFeeAmountStudent'])->name('student.fee.amount.view');
    Route::get('/student/fee/amount/add',[Student_FeeAmountController::class, 'AddFeeAmountStudent'])->name('student.fee.amount.add');
    Route::post('/student/fee/amount/store',[Student_FeeAmountController::class, 'StoreFeeAmountStudent'])->name('student.fee.amount.store');
    Route::get('/student/fee/amount/edit/{fee_category_id}',[Student_FeeAmountController::class, 'EditFeeAmountStudent'])->name('student.fee.amount.edit');
    Route::post('/student/fee/amount/update/{fee_category_id}',[Student_FeeAmountController::class, 'UpdateFeeAmountStudent'])->name('student.fee.amount.update');
    Route::get('/student/fee/amount/details/{id}',[Student_FeeAmountController::class, 'DetailsFeeAmountStudent'])->name('student.fee.amount.details');


// student Exam Type route
    Route::get('/student/exam/type/view',[ExamTypeController::class, 'ViewExamTypeStudent'])->name('student.exam.type.view');
    Route::get('/student/exam/type/add',[ExamTypeController::class, 'AddExamTypeStudent'])->name('student.exam.type.add');
    Route::post('/student/exam/type/store',[ExamTypeController::class, 'StoreExamTypeStudent'])->name('student.exam.type.store');
    Route::get('/student/exam/type/edit/{id}',[ExamTypeController::class, 'EditExamTypeStudent'])->name('student.exam.type.edit');
    Route::post('/student/exam/type/update/{id}',[ExamTypeController::class, 'UpdateExamTypeStudent'])->name('student.exam.type.update');
    Route::get('/student/exam/type/delete/{id}',[ExamTypeController::class, 'DeleteExamTypeStudent'])->name('student.exam.type.delete');


// student School Subject route
    Route::get('/student/school/subject/view',[SchoolSubjectController::class, 'ViewSchoolSubjectStudent'])->name('student.school.subject.view');
    Route::get('/student/school/subject/add',[SchoolSubjectController::class, 'AddSchoolSubjectStudent'])->name('student.school.subject.add');
    Route::post('/student/school/subject/store',[SchoolSubjectController::class, 'StoreSchoolSubjectStudent'])->name('student.school.subject.store');
    Route::get('/student/school/subject/edit/{id}',[SchoolSubjectController::class, 'EditSchoolSubjectStudent'])->name('student.school.subject.edit');
    Route::post('/student/school/subject/update/{id}',[SchoolSubjectController::class, 'UpdateSchoolSubjectStudent'])->name('student.school.subject.update');
    Route::get('/student/school/subject/delete/{id}',[SchoolSubjectController::class, 'DeleteSchoolSubjectStudent'])->name('student.school.subject.delete');


// student Assign Subject Route
    Route::get('/student/assign/subject/view',[AssignSubjectController::class, 'ViewAssignSubjectStudent'])->name('student.assign.subject.view');
    Route::get('/student/assign/subject/add',[AssignSubjectController::class, 'AddAssignSubjectStudent'])->name('student.assign.subject.add');
    Route::post('/student/assign/subject/store',[AssignSubjectController::class, 'StoreAssignSubjectStudent'])->name('student.assign.subject.store');
    Route::get('/student/assign/subject/edit/{class_id}',[AssignSubjectController::class, 'EditAssignSubjectStudent'])->name('student.assign.subject.edit');
    Route::post('/student/assign/subject/update/{class_id}',[AssignSubjectController::class, 'UpdateAssignSubjectStudent'])->name('student.assign.subject.update');
    Route::get('/student/assign/subject/details/{class_id}',[AssignSubjectController::class, 'DetailsAssignSubjectStudent'])->name('student.assign.subject.details');


// Designation All route
    Route::get('/designation/view',[DesignationController::class, 'ViewDesignation'])->name('designation.view');
    Route::get('/designation/add',[DesignationController::class, 'AddDesignation'])->name('designation.add');
    Route::post('/designation/store',[DesignationController::class, 'StoreDesignation'])->name('designation.store');
    Route::get('/designation/edit/{id}',[DesignationController::class, 'EditDesignation'])->name('designation.edit');
    Route::post('/designation/update/{id}',[DesignationController::class, 'UpdateDesignation'])->name('designation.update');
    Route::get('/designationt/delete/{id}',[DesignationController::class, 'DeleteDesignation'])->name('designation.delete');
});

// student registration

Route::prefix('students')->group(function(){
    Route::get('/reg/view',[StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
    Route::get('/reg/add',[StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add'); 
    Route::post('/reg/store',[StudentRegController::class, 'StudentRegStore'])->name('student.registration.store'); 
    Route::get('/reg/edit/{stident_id}',[StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit'); 
    Route::post('/reg/update/{stident_id}',[StudentRegController::class, 'StudentRegUpdate'])->name('student.registration.update'); 
    Route::get('/find/student',[StudentRegController::class, 'FindStudent'])->name('find.student.class.year');  
    Route::get('/reg/promotion/{stident_id}',[StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion'); 
    Route::post('/reg/update/promotion/{stident_id}',[StudentRegController::class, 'StudentUpdatePromotion'])->name('student.update.registration.promotion'); 
    Route::get('/reg/details/pdf/{stident_id}',[StudentRegController::class, 'StudentDetailsPdf'])->name('student.registration.details.pdf'); 

    // Student Roll Genarate

    Route::get('/roll/view',[StudentRollController::class, 'StudentRollView'])->name('student.roll.view');
    Route::get('/roll/getstudents',[StudentRollController::class, 'GetStudent'])->name('student.registration.getstudents');
    Route::post('/roll/students/rollupdate',[StudentRollController::class, 'StudentRollUpdate'])->name('roll.generate.store');

    // Student Registration Fee

     Route::get('/reg/fee/view',[RegistrationFeeController::class, 'RegistrationFee'])->name('registration.fee.view');
     Route::get('/reg/fee/classwise/view',[RegistrationFeeController::class, 'RegistrationFeeclasswise'])->name('student.registration.fee.classwise.get');
     Route::get('/reg/fee/payslip',[RegistrationFeeController::class, 'RegistrationFeePayslip'])->name('student.registration.fee.payslip');

    // Student Registration Fee

    Route::get('/monthly/fee/view',[MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('/monthly/fee/get',[MonthlyFeeController::class, 'MonthlyFeeGet'])->name('student.monthly.fee.get');
    Route::get('/monthly/fee/payslip',[MonthlyFeeController::class, 'MonthlyFeepayslip'])->name('student.monthly.fee.payslip');
    Route::get('/monthly/fee/payment/view',[MonthlyFeeController::class, 'MonthlyFeePaymentView'])->name('student.monthly.fee.payment.view');

    // Student Registration Fee

     Route::get('/exam/fee/view',[ExamFeeController::class, 'examFeeView'])->name('exam.fee.view');
     Route::get('/exam/fee/get',[ExamFeeController::class, 'ExamFeeGet'])->name('student.exam.fee.get');
     Route::get('/exaam/fee/payslip',[ExamFeeController::class, 'ExamFeepayslip'])->name('student.exam.fee.payslip');
     Route::get('/monthly/fee/payment/view',[ExamFeeController::class, 'MonthlyFeePaymentView'])->name('student.monthly.fee.payment.view');
});


Route::prefix('employee')->group(function(){
    Route::get('/registration/view',[EmployeeRegController::class, 'EmployeeRegView'])->name('employee.registration.view');
    Route::get('/registration/add',[EmployeeRegController::class, 'EmployeeRegAdd'])->name('employee.registration.add');
    Route::post('/registration/store',[EmployeeRegController::class, 'EmployeeRegStore'])->name('employee.registration.store');
    Route::get('/registration/edit/{id}',[EmployeeRegController::class, 'EmployeeRegEdit'])->name('employee.registration.edit');
    Route::post('/registration/update/{id}',[EmployeeRegController::class, 'EmployeeRegUpdate'])->name('employee.registration.update');
    Route::get('/registration/details/{id}',[EmployeeRegController::class, 'EmployeeRegDetails'])->name('employee.registration.details');

// employee salary all route
    Route::get('/salary/view',[EmployeeSalaryController::class, 'EmployeeSalaryView'])->name('employee.salary.view');
    Route::get('/salary/increment/{id}',[EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('employee.increment.salary');
    Route::post('/salary/increment/details/{id}',[EmployeeSalaryController::class, 'EmployeeSalaryIncrementStore'])->name('update.increment.store');
    Route::get('/salary/increment/list/{id}',[EmployeeSalaryController::class, 'EmployeeIncrementDetails'])->name('employee.increment.details');

// employee leave all route    
    Route::get('/leave/view',[EmployeeLeaveController::class, 'EmployeeLeaveView'])->name('employee.leave.view');
    Route::get('/leave/add',[EmployeeLeaveController::class, 'EmployeeLeaveAdd'])->name('employee.leave.add');
    Route::post('/leave/store',[EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('employee.leave.store');
    Route::get('/leave/edit/{id}',[EmployeeLeaveController::class, 'EmployeeLeaveEdit'])->name('employee.leave.edit');
    Route::get('/leave/delete/{id}',[EmployeeLeaveController::class, 'EmployeeLeaveDelete'])->name('employee.leave.delete');

});

});



