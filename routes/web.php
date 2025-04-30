<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\JoblistController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [indexController::class, 'index'])->name('home');
Route::get('/job-list', [JoblistController::class, 'index']);
Route::get('/employers', [EmployersController::class, 'index']);
Route::get('/employees', [EmployeesController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact_us', [ContactController::class, 'Contact_us'])->name('Contact_us');

/*-------------Employer Route-----------------*/

Route::prefix('employer')->group(function(){
    Route::get('/login', [EmployerController::class, 'Index'])->name('employer_login_form');
    Route::post('/login/employer', [EmployerController::class, 'Login'])->name('employer.login');
    Route::get('/dashboard', [EmployerController::class, 'Dashboard'])->name('employer.dashboard')->middleware('employer');
    Route::get('/register', [EmployerController::class, 'EmployerRegister'])->name('employer.register');
    Route::post('/register/create', [EmployerController::class, 'EmployerRegisterCreate'])->name('employer.register.create');
    Route::put('/register/{register}', [EmployerController::class, 'EmployerRegister_update'])->name('employer.register.update');
    Route::put('/register/upload-image/{register}', [EmployerController::class, 'EmployerRegister_uploadimage'])->name('employer.register.upload_image');
    Route::get('/logout', [EmployerController::class, 'EmployerLogout'])->name('employer.logout')->middleware('employer');
    Route::get('/changepassword', [EmployerController::class, 'ChangePassword'])->name('employer.ChangePassword');
    Route::get('/company/{employerId}', [EmployerController::class, 'company'])->name('employer.Company');
    Route::get('/my_jobs/{employerId}', [EmployerController::class, 'My_Jobs'])->name('employer.My_Jobs');
    Route::get('/post_jobs', [EmployerController::class, 'Post_Jobs'])->name('employer.Post_Jobs');
    Route::post('/post_jobs/post', [EmployerController::class, 'Post_Jobs_form'])->name('employer.Post_Jobs_form');
    Route::get('/edit_post_jobs/{id}', [EmployerController::class, 'Edit_Post_Jobs_form'])->name('employer.Edit_Post_Jobs_form');
    Route::put('/edit_post_jobs/{id}', [EmployerController::class, 'Edit_Post_Jobs'])->name('employer.Edit_Post_Jobs');
    Route::delete('/delete_post_jobs/{id}', [EmployerController::class, 'Delete_Post_Jobs'])->name('employer.Delete_Post_Jobs');
    Route::get('/explore-job/{id}', [EmployerController::class, 'Explore_Job'])->name('employer.Explore_Job');
    Route::post('/updatepassword', [EmployerController::class, 'UpdatePassword'])->name('employer.UpdatePassword');
    Route::get('/view-applicants/{jobId}', [EmployerController::class, 'View_Applicants'])->name('employer.View-Applicants');
    Route::get('/search', [EmployerController::class, 'search'])->name('search');

});
/*-------------End Employer Route-----------------*/

/*-------------Employee Route-----------------*/

Route::prefix('employee')->group(function(){
    Route::get('/login', [EmployeeController::class, 'Index'])->name('employee_login_form');
    Route::post('/login/employee', [EmployeeController::class, 'Login'])->name('employee.login');
    Route::get('/dashboard', [EmployeeController::class, 'Dashboard'])->name('employee.dashboard')->middleware('employee');
    Route::get('/register', [EmployeeController::class, 'EmployeeRegister'])->name('employee.register');
    Route::post('/register/create', [EmployeeController::class, 'EmployeeRegisterCreate'])->name('employee.register.create');
    Route::put('/register/{register}', [EmployeeController::class, 'EmployeeRegister_update'])->name('employee.register.update');
    Route::put('/register/upload-image/{register}', [EmployeeController::class, 'EmployeeRegister_uploadimage'])->name('employee.register.upload_image');
    Route::get('/employee/{id}/age', [EmployeeController::class,'calculateAge'])->name('employee.age');
    Route::get('/logout', [EmployeeController::class, 'EmployeeLogout'])->name('employee.logout')->middleware('employee');
    Route::get('/changepassword', [EmployeeController::class, 'ChangePassword'])->name('employee.ChangePassword');
    Route::post('/updatepassword', [EmployeeController::class, 'UpdatePassword'])->name('employee.UpdatePassword');
    Route::get('/academic_qualifications', [EmployeeController::class, 'AcademicQualifications'])->name('employee.AcademicQualifications');
    Route::post('/academic_qualifications', [EmployeeController::class, 'AcademicQualifications_Add'])->name('employee.AcademicQualifications_Add');
    Route::put('/academic_qualifications/{academic_qualifications}', [EmployeeController::class, 'AcademicQualifications_update'])->name('employee.AcademicQualifications.update');
    Route::delete('/academic_qualifications/{academic_qualifications}', [EmployeeController::class, 'AcademicQualifications_destroy'])->name('employee.AcademicQualifications.destroy');
    Route::get('/appliedjobs', [EmployeeController::class, 'AppliedJobs'])->name('employee.AppliedJobs');
    Route::post('/jobs/apply/{job}', [EmployeeController::class, 'applyJob'])->name('employee.applyJob');
    Route::get('/attachment', [EmployeeController::class, 'Attachment'])->name('employee.Attachment');
    Route::post('/attachment', [EmployeeController::class, 'Attachment_Add'])->name('employee.Attachment_Add');
    Route::put('/attachment/{attachment}', [EmployeeController::class, 'Attachment_update'])->name('employee.Attachment.update');
    Route::delete('/attachment/{attachment}', [EmployeeController::class, 'Attachment_destroy'])->name('employee.Attachment.destroy');
    Route::get('/experience', [EmployeeController::class, 'Experience'])->name('employee.Experience');
    Route::post('/experience', [EmployeeController::class, 'Experience_Add'])->name('employee.Experience_Add');
    Route::put('/experience/{experience}', [EmployeeController::class, 'Experience_update'])->name('employee.Experience.update');
    Route::delete('/experience/{experience}', [EmployeeController::class, 'Experience_destroy'])->name('employee.Experience.destroy');
    Route::get('/languageproficiency', [EmployeeController::class, 'LanguageProficiency'])->name('employee.LanguageProficiency');
    Route::post('/languageproficiency', [EmployeeController::class, 'LanguageProficiency_Add'])->name('employee.LanguageProficiency_Add');
    Route::put('/languageproficiency{languageproficiency}', [EmployeeController::class, 'LanguageProficiency_update'])->name('employee.LanguageProficiency.update');
    Route::delete('/languageproficiency{languageproficiency}', [EmployeeController::class, 'LanguageProficiency_destroy'])->name('employee.LanguageProficiency.destroy');
    Route::get('/qualifications', [EmployeeController::class, 'Qualifications'])->name('employee.Qualifications');
    Route::post('/qualifications', [EmployeeController::class, 'Qualifications_Add'])->name('employee.Qualification_Add');
    Route::put('/qualifications/{qualifications}', [EmployeeController::class, 'Qualifications_update'])->name('employee.Qualification.update');
    Route::delete('/qualifications/{qualifications}', [EmployeeController::class, 'Qualifications_destroy'])->name('employee.Qualification.destroy');
    Route::get('/training', [EmployeeController::class, 'Training'])->name('employee.Training');
    Route::post('/training', [EmployeeController::class, 'Training_Add'])->name('employee.Training_Add');
    Route::put('/Training/{Training}', [EmployeeController::class, 'Training_update'])->name('employee.Training.update');
    Route::delete('/Training/{Training}', [EmployeeController::class, 'Training_destroy'])->name('employee.Training.destroy');
    Route::get('/last_login', [EmployeeController::class, 'getLastLoggedIn'])->name('employee.getLastLoggedIn');
    Route::get('/employee-detail/{employeeId}', [EmployeeController::class, 'employee_detail'])->name('employee.employee_detail');


});
/*-------------End Employee Route-----------------*/

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';