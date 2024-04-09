<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentFeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Marks\MarkController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Attendance\AttendanceController;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'prevent-back-history'],function(){


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

//user managemend all routes
Route::group(['middleware' =>'auth'],function(){

Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add'); 
    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit'); 
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');    
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');   
});
//user profile and password
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
    Route::get('/password/view',[ProfileController::class,'PasswordView'])->name('password.view');
    Route::post('/password/update',[ProfileController::class,'PasswordUpdate'])->name('password.update');
});


//user setup and password
Route::prefix('setups')->group(function(){
    //student class route
    Route::get('students/class/view',[StudentClassController::class,'ViewStudent'])->name('student.class.view');
    Route::get('students/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('students/class/store',[StudentClassController::class,'StudentClassStore'])->name('store.student.class');
    Route::post('students/class/update/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('update.student.class');
    Route::get('students/class/edit/{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
    Route::get('students/class/delete/{id}',[StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');   

    Route::get('students/year/view',[StudentYearController::class,'ViewYear'])->name('student.year.view');
    Route::get('students/year/add',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add'); 
    Route::post('students/year/store',[StudentYearController::class,'StudentYearStore'])->name('store.student.year');
    Route::get('students/year/edit/{id}',[StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');
    Route::get('students/year/delete/{id}',[StudentYearController::class,'StudentYearDelete'])->name('student.year.delete');   
    Route::post('students/year/update/{id}',[StudentYearController::class,'StudentYearUpdate'])->name('update.student.year');

    Route::get('students/group/view',[StudentGroupController::class,'ViewGroup'])->name('student.group.view');
    Route::get('students/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add'); 
    Route::post('students/group/store',[StudentGroupController::class,'StudentGroupStore'])->name('store.student.group');
    Route::get('students/group/edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
    Route::get('students/group/delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');   
    Route::post('students/group/update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('update.student.group');

    Route::get('students/shift/view',[StudentShiftController::class,'ViewShift'])->name('student.shift.view');
    Route::get('students/shift/add',[StudentShiftController::class,'ShiftAdd'])->name('student.shift.add');
    Route::post('students/shift/store',[StudentShiftController::class,'ShiftStore'])->name('student.shift.store');
    Route::get('students/shift/edit/{id}',[StudentShiftController::class,'ShiftEdit'])->name('student.shift.edit');
    Route::get('students/shift/delete/{id}',[StudentShiftController::class,'ShiftDelete'])->name('student.shift.delete');
    Route::post('students/shift/update/{id}',[StudentShiftController::class,'ShiftUpdate'])->name('update.student.shift');

    Route::get('students/fee/view',[StudentFeeCategoryController::class,'ViewFee'])->name('student.fee.view');
    Route::get('students/fee/add',[StudentFeeCategoryController::class,'FeeCategoryAdd'])->name('student.fee.add');
    Route::post('students/fee/store',[StudentFeeCategoryController::class,'FeeCategoryStore'])->name('store.student.feecategory');
    Route::get('students/fee/delete/{id}',[StudentFeeCategoryController::class,'FeeCategoryDelete'])->name('student.fee.delete');
    Route::get('students/fee/edit/{id}',[StudentFeeCategoryController::class,'FeeCategoryEdit'])->name('student.fee.edit');
    Route::post('students/fee/update/{id}',[StudentFeeCategoryController::class,'FeeCategoryUpdate'])->name('update.student.fee');

    Route::get('fee/amount/view',[FeeAmountController::class,'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add',[FeeAmountController::class,'AddFeeAmount'])->name('fee.amount.add');
    Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'EditFeeAmount'])->name('fee.amount.edit');
    Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class,'DetailFeeAmount'])->name('fee.amount.details');
    Route::post('store/fee/amount',[FeeAmountController::class,'StoreFeeAmount'])->name('store.fee.amount');
    Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class,'UpdateFeeAmount'])->name('update.fee.amount');

    Route::get('exam/type/view',[ExamTypeController::class,'ViewExamType'])->name('exam.type.view');
    Route::get('exam/type/add',[ExamTypeController::class,'AddExamType'])->name('exam.type.add');
    Route::post('exam/type/store',[ExamTypeController::class,'StoreExamType'])->name('store.exam.type');
    Route::get('exam/type/edit/{id}',[ExamTypeController::class,'EditExamType'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}',[ExamTypeController::class,'UpdateExamType'])->name('update.exam.type');
    Route::get('exam/type/delete/{id}',[ExamTypeController::class,'DeleteExamType'])->name('exam.type.delete');

    Route::get('school/subject/view',[SchoolSubjectController::class,'ViewSchoolSubject'])->name('school.subject.view');
    Route::get('school/subject/add',[SchoolSubjectController::class,'AddSchoolSubject'])->name('school.subject.add');
    Route::get('school/subject/edit/{id}',[SchoolSubjectController::class,'EditSchoolSubject'])->name('school.subject.edit');
    Route::get('school/subject/delete/{id}',[SchoolSubjectController::class,'DeleteSchoolSubject'])->name('school.subject.delete');
    Route::post('school/subject/update/{id}',[SchoolSubjectController::class,'UpdateSchoolSubject'])->name('school.subject.update');
    Route::post('school/subject/store',[SchoolSubjectController::class,'StoreSchoolSubject'])->name('store.school.subject');

    Route::get('assign/subject/view',[AssignSubjectController::class,'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add',[AssignSubjectController::class,'AddAssignSubject'])->name('assign.subject.add');
    Route::post('assign/subject/store',[AssignSubjectController::class,'StoreAssignSubject'])->name('store.assign.subject');
    Route::get('assign/subject/edit/{class_id}',[AssignSubjectController::class,'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{class_id}',[AssignSubjectController::class,'UpdateAssignSubject'])->name('update.assign.subject');
    Route::get('assign/subject/detail/{class_id}',[AssignSubjectController::class,'DetailAssignSubject'])->name('assign.subject.details');

    Route::get('designation/view',[DesignationController::class,'ViewDesignation'])->name('designation.view');
    Route::get('designation/add',[DesignationController::class,'AddDesignation'])->name('designation.add');
    Route::post('designation/store',[DesignationController::class,'StoreDesignation'])->name('store.designation');
    Route::get('designation/edit/{id}',[DesignationController::class,'EditDesignation'])->name('designation.edit');
    Route::post('designation/update/{id}',[DesignationController::class,'UpdateDesignation'])->name('designation.update');
    Route::get('designation/delete/{id}',[DesignationController::class,'DeleteDesignation'])->name('designation.delete');
}); 

Route::prefix('students')->group(function(){
    Route::get('/reg/view',[StudentRegController::class,'StudentRegView'])->name('student.registration.view');
    Route::get('/reg/add',[StudentRegController::class,'StudentRegAdd'])->name('student.registration.add');
    Route::post('/reg/store',[StudentRegController::class,'StudentRegStore'])->name('store.student.registration');
    Route::get('/reg/show/search',[StudentRegController::class,'StudentRegSearch'])->name('student.year.class.search');
    Route::get('/reg/edit/{student_id}',[StudentRegController::class,'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/reg/update/{student_id}',[StudentRegController::class,'StudentRegUpdate'])->name('update.student.registration');
    Route::get('/reg/delete/{student_id}',[StudentRegController::class,'StudentRegDelete'])->name('student.registration.delete');
    
    
    Route::get('/reg/fee/view',[RegistrationFeeController::class,'RegistrationFeeView'])->name('registration.fee.view');
    Route::get('/reg/fee/classwise',[RegistrationFeeController::class,'FeeClassWiseData'])->name('student.registration.fee.classwise.get');
    Route::get('/reg/fee/payslip',[RegistrationFeeController::class,'RegFeePayslip'])->name('student.registration.fee.payslip');

        //exam fee
    Route::get('/exam/fee/view',[ExamFeeController::class,'ExamFeeView'])->name('exam.fee.view');
    Route::get('/exam/fee/classwise',[ExamFeeController::class,'ExamClassWiseData'])->name('student.exam.fee.classwise.get');
    Route::get('/exam/fee/payslip',[ExamFeeController::class,'ExamFeePayslip'])->name('student.registration.fee.payslip');

            //monthly fee
    Route::get('/monthly/fee/view',[MonthlyFeeController::class,'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('/monthly/fee/classwise',[MonthlyFeeController::class,'MonthlyClassWiseData'])->name('student.monthly.fee.classwise.get');
    Route::get('/monthly/fee/payslip',[MonthlyFeeController::class,'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
    
    });
    //mark
    Route::prefix('marks')->group(function(){
        Route::get('/entry/add',[MarkController::class,'MarkAdd'])->name('mark.entry.add');
        Route::get('/getsubject',[DefaultController::class,'GetSubject'])->name('marks.getsubject');
        Route::get('/getstudent',[DefaultController::class,'GetStudent'])->name('student.marks.getstudents');
        Route::post('/storestudentmark',[MarkController::class,'StoreStudentMark'])->name('marks.entry.store');
        Route::get('/edit',[MarkController::class,'MarkEdit'])->name('mark.entry.edit');
        Route::get('/mark/edit',[MarkController::class,'MarkEditGetStudent'])->name('student.edit.getstudents');
        Route::post('/mark/update',[MarkController::class,'MarkUpdateGetStudent'])->name('marks.entry.update');
    });
    Route::prefix('attendance')->group(function(){
        Route::get('/view',[AttendanceController::class,'AttendanceView'])->name('attendance.view');
        Route::get('/add',[AttendanceController::class,'AttendanceAdd'])->name('student.attendance.add');
        Route::post('/store',[AttendanceController::class,'AttendanceStore'])->name('store.student.attendance');
        Route::get('/edit/{date}',[AttendanceController::class,'AttendanceEdit'])->name('student.attendance.edit');
        Route::get('/detail/{date}',[AttendanceController::class,'AttendanceDetail'])->name('student.attendance.delete');
        
    });
    //profit management
    Route::prefix('reports')->group(function(){
        Route::get('profits/view',[ProfitController::class,'ProfitView'])->name('academy.profit.view');
        Route::get('profits/getwais',[ProfitController::class,'ProfitGetWis'])->name('report.profit.datewais.get');
    });
    //Paid Amount
    Route::prefix('accounts')->group(function(){
        Route::get('fee/view',[StudentFeeController::class,'PaidAmountView'])->name('amount.paid.view');
        Route::get('fee/add',[StudentFeeController::class,'PaidAmountAdd'])->name('student.fee.add');
        Route::post('fee/store',[StudentFeeController::class,'PaidAmountStore'])->name('account.fee.store');
        Route::get('getstudent',[StudentFeeController::class,'AccountGetStudent'])->name('account.fee.getstudent');
    });
});
});//prevent back middleware