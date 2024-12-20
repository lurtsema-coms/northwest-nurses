<?php

use App\Http\Controllers\Admin\AdmAccountsController;
use App\Http\Controllers\Admin\AdmDashboardController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Employers\EmpDashboardController;
use App\Http\Controllers\Employers\EmpPostJobController;
use App\Http\Controllers\Employers\EmpProfileController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Employers\ManageEmployeeController;
use App\Http\Controllers\Guest\GuestController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [GuestController::class, 'index'])->name('index');

Route::get('/find-jobs', [GuestController::class, 'findJobs'])->name('find-jobs');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::post('/contact-us', [GuestController::class, 'submitContactUsResponse'])->name('contact-us.submit');

Route::get('/backend-layout', function () {
    return view('layouts.backend-layout');
});

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);


Route::middleware(['auth', 'verified'])->group(function () {
    // employer route group
    Route::middleware('role:employer')->group(function () {
        // Dashboard
        Route::get('/employer-dashboard', [EmpDashboardController::class, 'index'])->name('employer.dashboard');
        Route::get('/employer-dashboard-chart', [EmpDashboardController::class, 'employmentChart'])->name('employer.dashboard-chart');
        Route::get('/employer-dashboard-notification', [EmpDashboardController::class, 'employmentNotification'])->name('employer.notification');
        Route::get('/employer-dashboard-bell', [EmpDashboardController::class, 'countNotification'])->name('employer.bell');
        // Jobs
        Route::get('/employer-job', [EmpPostJobController::class, 'index'])->name('employer.job');
        Route::post('/employer-job', [EmpPostJobController::class, 'search'])->name('employer.job.search');
        Route::get('/employer-job/add', [EmpPostJobController::class, 'getAdd'])->name('employer.job.add');
        Route::post('/employer-job/add-jobs', [EmpPostJobController::class, 'store'])->name('employer.job.add-jobs');
        Route::get('/employer-job/edit/{id}', [EmpPostJobController::class, 'edit'])->name('employer.job.edit');
        Route::post('/employer-job/edit-jobs/{id}', [EmpPostJobController::class, 'update'])->name('employer.job.edit-jobs');
        Route::get('/employer-job/applicants/{id}', [EmpPostJobController::class, 'getApplicant'])->name('employer.job.applicants');
        Route::post('/employer-job/edit-applicants/{id}', [EmpPostJobController::class, 'editApplicant'])->name('employer.job.edit-applicant');
        Route::get('/employer-job/view/{id}', [EmpPostJobController::class, 'show'])->name('employer.job.view');
        Route::get('/employer-job/delete/{id}', [EmpPostJobController::class, 'delete'])->name('employer.job.delete-job');
        Route::get('/employer-profile/{id}', [EmpProfileController::class, 'index'])->name('employer.profile');
        Route::post('/employer-profile/update/{id}', [EmpProfileController::class, 'update'])->name('employer.profile.update');
        Route::post('/employer-profile/update-password/{id}', [EmpProfileController::class, 'updatePassword'])->name('employer.update.password');
        Route::post('/employer-profile/update-email/{id}', [EmpProfileController::class, 'updateEmail'])->name('employer.update.email');

        // Manage Employees
        Route::get('/employer-manage-employee', [ManageEmployeeController::class, 'index'])->name('employer.m-employee');
        Route::get('/employer-manage-employee/remove/{id}', [ManageEmployeeController::class, 'remove'])->name('employer.m-employee-remove');
    });

    //applicant route group
    Route::middleware('role:applicant')->group(function () {
        Route::get('/my-jobs', [ApplicantController::class, 'myJobs'])->name('applicant.my_jobs');
        Route::get('/my-profile', [ApplicantController::class, 'myProfile'])->name('applicant.profile');
        Route::put('/my-profile/update/{id}', [ApplicantController::class, 'updateMyProfile'])->name('applicant.profile.update');
        Route::post('/my-profile/update-password/{id}', [ApplicantController::class, 'updatePassword'])->name('applicant.update.password');
        Route::put('/my-profile/add-resume/{id}', [ApplicantController::class, 'addResume'])->name('applicant.profile.add-resume');
        Route::get('/my-profile/default-resume/{id}', [ApplicantController::class, 'defaultResume'])->name('applicant.default.resume');
        Route::get('/my-profile/delete-resume/{id}', [ApplicantController::class, 'deleteResume'])->name('applicant.profile.delete-resume');

        Route::post('/my-profile/update-email/{id}', [ApplicantController::class, 'updateEmail'])->name('applicant.update.email');
        Route::get('/job-info/get-questions/{id}', [ApplicantController::class, 'getQuestions'])->name('applicant.get-questions');
        Route::post('/job-info/apply-job/{id}', [ApplicantController::class, 'applyJob'])->name('applicant.apply-job');
    });

    //admin route group
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin-dashboard', [AdmDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin-accounts', [AdmAccountsController::class, 'index'])->name('admin.accounts');
        Route::post('/admin-accounts', [AdmAccountsController::class, 'search'])->name('admin.accounts.search');
        Route::get('/admin-show/{id}', [AdmAccountsController::class, 'show'])->name('admin.accounts.show');
        Route::post('/admin-show/{id}', [AdmAccountsController::class, 'historySearch'])->name('admin.accounts.history.search');
    });

    Route::get('/my-profile/download', [ApplicantController::class, 'downloadResume'])->name('applicant.profile.download-resume');
    Route::get('/my-profile/show-resume', [ApplicantController::class, 'showResume'])->name('showResume');
});


Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

require __DIR__ . '/auth.php';
