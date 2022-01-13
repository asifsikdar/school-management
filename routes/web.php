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


