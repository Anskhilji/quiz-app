<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth\RegisterController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\Auth\loginController;
use App\Http\Controllers\Student\Auth\LogoutController;
use App\Http\Controllers\Student\Auth\EmailVerifyController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Teacher\AllSubjectController;
use App\Http\Controllers\Student\SubjectRequestController;
use App\Http\Controllers\Student\ViewPaperController;
use App\Http\Controllers\JsonController;
Route::get('/', function () {
    return view('student.auth.login');
})->middleware('guest');

// Admin All Routes
Route::get('admin', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'AdminLogin'])->name('admin.store');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
//    Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'Dashboard'])->name('admin.dashboard');
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LogoutController::class, 'AdminLogout'])->name('admin.logout');
    //    Teacher
    Route::get('/teacher/add', [\App\Http\Controllers\Admin\TeacherControlelr::class, 'AddTeacher'])->name('add.teacher');
    Route::post('/teacher/store', [\App\Http\Controllers\Admin\TeacherControlelr::class, 'StoreTeacher'])->name('store.teacher');
    Route::get('/teacher/all', [\App\Http\Controllers\Admin\TeacherControlelr::class, 'AllTeacher'])->name('all.teacher');
    Route::get('/teacher/{id}/delete', [\App\Http\Controllers\Admin\TeacherControlelr::class, 'DeleteTeacher'])->name('teacher.delete');
    Route::get('/teacher/edit/{id}', [\App\Http\Controllers\Admin\TeacherControlelr::class, 'EditTeacher'])->name('teacher.edit');
    Route::post('/teacher/update/{id}', [\App\Http\Controllers\Admin\TeacherControlelr::class, 'UpdateTeacher'])->name('update.teacher');
//    Subject
    Route::get('/subject/all', [\App\Http\Controllers\Admin\SubjectController::class, 'AllSubject'])->name('all.subject');
    Route::get('/subject/add', [\App\Http\Controllers\Admin\SubjectController::class, 'AddSubject'])->name('add.subject');
    Route::post('/subject/store', [\App\Http\Controllers\Admin\SubjectController::class, 'StoreSubject'])->name('store.subject');
    Route::get('/subject/delete/{subjects}', [\App\Http\Controllers\Admin\SubjectController::class, 'DeleteSubject'])->name('subject.delete');
    Route::get('/subject/edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'EditSubject'])->name('subject.edit');
    Route::post('/subject/update/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'UpdateSubject'])->name('update.subject');
    //  Setting
    Route::get('/edit/profile', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'UpdateProfile'])->name('edit.profile');
    Route::post('/update/profile/{id}', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'ChangeProfile'])->name('update.profile');
    Route::get('/change/password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'UpdatePassword'])->name('update.password');
});

// Teacher All Routes
Route::get('teacher', [\App\Http\Controllers\Teacher\Auth\LoginController::class, 'index'])->name('teacher.login');
Route::post('teacher/login', [\App\Http\Controllers\Teacher\Auth\LoginController::class, 'TeacherLogin'])->name('teacher.store');

Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function (){
    Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'Dashboard'])->name('teacher.dashboard');
    Route::get('/subjects', [AllSubjectController::class, 'AllSubject'])->name('teacher.subject');
    Route::get('/logout', [\App\Http\Controllers\Teacher\Auth\LogoutController::class, 'TeacherLogout'])->name('teacher.logout');
//    setting
    Route::get('/edit/profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'editProfile'])->name('teacher.edit.profile');
    Route::post('/update/profile/{id}', [\App\Http\Controllers\Teacher\ProfileController::class, 'updateProfile'])->name('teacher.update.profile');
    Route::get('/change/password', [\App\Http\Controllers\Teacher\ProfileController::class, 'ChangePassword'])->name('teacher.change.password');
    Route::post('/update/password', [\App\Http\Controllers\Teacher\ProfileController::class, 'UpdatePassword'])->name('teacher.update.password');
//    Create Question
    Route::get('/add/question', [\App\Http\Controllers\Teacher\PaperController::class, 'AddQuestion'])->name('teacher.add.question');
    Route::post('/store/question', [\App\Http\Controllers\Teacher\PaperController::class, 'StoreQuestion'])->name('teacher.store.question');
    Route::get('/all/question', [\App\Http\Controllers\Teacher\PaperController::class, 'AllQuestion'])->name('teacher.all.question');
    Route::get('/edit/question/{id}', [\App\Http\Controllers\Teacher\PaperController::class, 'EditQuestion'])->name('edit.mcqs');
    Route::post('/update/question{id}', [\App\Http\Controllers\Teacher\PaperController::class, 'UpdateQuestion'])->name('update.mcqs');
    Route::get('/delete/question/{id}', [\App\Http\Controllers\Teacher\PaperController::class, 'DeleteQuestion'])->name('delete.mcqs');
//    text edit
    Route::get('/edit/{id}/text', [\App\Http\Controllers\Teacher\PaperController::class, 'EditText'])->name('edit.text');
    Route::post('/update/text/{id}', [\App\Http\Controllers\Teacher\PaperController::class, 'UpdateText'])->name('update.text');
    Route::get('/delete/text/{id}', [\App\Http\Controllers\Teacher\PaperController::class, 'DeleteText'])->name('delete.text');

    Route::get('/subject/request', [\App\Http\Controllers\Teacher\SubjectRequestController::class, 'AllRequest'])->name('teacher.all.request');
    Route::get('/subject/request/inactive/{id}', [\App\Http\Controllers\Teacher\SubjectRequestController::class, 'InActiveRequest'])->name('teacher.request.inactive');
    Route::get('/subject/request/active/{id}', [\App\Http\Controllers\Teacher\SubjectRequestController::class, 'ActiveRequest'])->name('teacher.request.active');
    Route::get('/subject/request/delete/{id}', [\App\Http\Controllers\Teacher\SubjectRequestController::class, 'DeleteRequest'])->name('teacher.request.delete');
// Exams All

    Route::get('exam/attempted',[\App\Http\Controllers\Teacher\ExamController::class,'ExamAttempt'])->name('teacher.exam.attempted');
    Route::get('exam/attempted/view/{id}',[\App\Http\Controllers\Teacher\ExamController::class,'ViewAttemptedPaper'])->name('view.attempted.paper');
    Route::post('store/marks/{id}',[\App\Http\Controllers\Teacher\ExamController::class,'StoreMarks'])->name('store.marks');

    Route::get('exam/marked/',[\App\Http\Controllers\Teacher\ExamController::class,'MarkedPaper'])->name('teacher.exam.marked');
    Route::get('exam/marked/view/{id}',[\App\Http\Controllers\Teacher\ExamController::class,'EditMarkedPaper'])->name('view.marked.paper');
    Route::post('exam/marked/store/{id}',[\App\Http\Controllers\Teacher\ExamController::class,'StoreMarkedPaper'])->name('store.marks.update');
});

// Student All Routes
Route::get('/reset/password',[\App\Http\Controllers\Student\Auth\ResetPasswordController::class, 'ResetIndex'])->name('student.reset.password');
Route::post('/reset/link',[\App\Http\Controllers\Student\Auth\ResetPasswordController::class, 'SendLink'])->name('send.reset.link');
Route::get('/reset/password/verify/{token}/{email}',[\App\Http\Controllers\Student\Auth\ResetPasswordController::class, 'VerifyLink'])->name('student.reset.verify');
Route::get('/reset/auth/password',[\App\Http\Controllers\Student\Auth\ResetPasswordController::class, 'ResetAuthPassword'])->name('student.auth.change_password');
Route::post('/store/reset/password',[\App\Http\Controllers\Student\Auth\ResetPasswordController::class, 'StoreResetPassword'])->name('store.reset.password');


Route::get('dashboard/profile',[ProfileController::class, 'index'])->name('profile');

Route::get('login', [loginController::class, 'LoginView'])->name('login');
Route::post('login', [loginController::class, 'StudentLogin'])->name('student.login');
Route::get('logout', [LogoutController::class, 'Logout'])->name('logout');

Route::get('register', [RegisterController::class, 'RegisterView'])->name('register');
Route::post('register', [RegisterController::class, 'StudentRegister'])->name('student.register');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// verify route
Route::get('email/verification/{token}/{email}', [EmailVerifyController::class, 'VerifyEmailView'])->name('verification');

// Setting
Route::get('edit/profile', [ProfileController::class, 'EditProfile'])->name('student.edit.profile');
Route::post('update/profile/{id}', [ProfileController::class, 'UpdateProfile'])->name('student.update.profile');
Route::get('change/password', [ProfileController::class, 'ChangePassword'])->name('student.change.password');
Route::post('update/password', [ProfileController::class, 'UpdatePassword'])->name('student.update.password');

// Request
Route::get('choose/subject', [SubjectRequestController::class, 'ChooseSubject'])->name('choose.subject');
Route::post('store/subject/request', [SubjectRequestController::class, 'StoreSubRequest'])->name('store.subrequest');

//View Paper
Route::match(["get", "post"],'view/paper/{id}', [ViewPaperController::class, 'ViewPaper'])->name('view.paper');
Route::match(["get", "post"],'view/result', [\App\Http\Controllers\Student\ResultController::class, 'StudentResult'])->name('student.view.result');

//View Result


// json
Route::get("/json",[JsonController::class, 'json']);
Route::post("/json/store",[JsonController::class, 'JsonStore'])->name('json.store');

Route::get("/json/single",[JsonController::class, 'jsonMultiRow']);
Route::post("/json/multi/store",[JsonController::class, 'jsonStoreMultiRow'])->name('json.multi');

//AJAX
Route::get("/ajax/form",[JsonController::class, 'AjaxForm']);
Route::post("/ajax/form/store",[JsonController::class, 'StoreForm'])->name('ajax.form');
