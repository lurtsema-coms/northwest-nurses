<?php

use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Employers\EmpDashboardController;
use App\Http\Controllers\Employers\EmpPostJobController;
use App\Http\Controllers\Employers\EmpProfileController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
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
});

Route::post('/contact-us', [GuestController::class, 'submitContactUsResponse'])->name('contact-us.submit');

route::get('/backend-layout', function () {
    return view('layouts.backend-layout');
});

// Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/job-info', function () {
    return view('components.find-job-page.job-info');
});



Route::middleware(['auth', 'verified'])->group(function () {
    // employer route group
    Route::middleware('role:employer')->group(function () {
        Route::get('/employer-dashboard', [EmpDashboardController::class, 'index'])->name('employer.dashboard');
        // Jobs
        Route::get('/employer-job', [EmpPostJobController::class, 'index'])->name('employer.job');
        Route::get('/employer-job/search', [EmpPostJobController::class, 'search'])->name('employer.job.search');
        Route::get('/employer-job/add', [EmpPostJobController::class, 'getAdd'])->name('employer.job.add');
        Route::post('/employer-job/add-jobs', [EmpPostJobController::class, 'store'])->name('employer.job.add-jobs');
        Route::get('/employer-job/edit/{id}', [EmpPostJobController::class, 'edit'])->name('employer.job.edit');
        Route::post('/employer-job/edit-jobs/{id}', [EmpPostJobController::class, 'update'])->name('employer.job.edit-jobs');
        Route::get('/employer-job/view/{id}', [EmpPostJobController::class, 'show'])->name('employer.job.view');
        Route::get('/employer-job/delete/{id}', [EmpPostJobController::class, 'delete'])->name('employer.job.delete-job');

        Route::get('/employer-profile/{id}', [EmpProfileController::class, 'index'])->name('employer.profile');
        Route::post('/employer-profile/update/{id}', [EmpProfileController::class, 'update'])->name('employer.profile.update');
    });

    //applicant route group
    Route::middleware('role:applicant')->group(function () {
        Route::get('/my-jobs', [ApplicantController::class, 'myJobs'])->name('applicant.my_jobs');
        Route::get('/my-profile', [ApplicantController::class, 'myProfile'])->name('applicant.profile');
        Route::put('/my-profile/update/{id}', [ApplicantController::class, 'updateMyProfile'])->name('applicant.profile.update');
        Route::post('/my-profile/update-password/{id}', [ApplicantController::class, 'updatePassword'])->name('applicant.update.password');
    });
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
