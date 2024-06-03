<?php

use App\Http\Controllers\Employers\DashboardController;
use App\Http\Controllers\Employers\EmpDashboardController;
use App\Http\Controllers\Employers\EmpPostJobController;
use App\Http\Controllers\Employers\EmpProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/find-jobs', function () {
    return view('find-jobs');
});

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
        Route::get('/employer-job', [EmpPostJobController::class, 'index'])->name('employer.job');
        Route::get('/employer-profile/{id}', [EmpProfileController::class, 'index'])->name('employer.profile');
        Route::post('/employer-profile/update/{id}', [EmpProfileController::class, 'update'])->name('employer.profile.update');
    });

    //applicant route group
    Route::middleware('role:applicant')->group(function () {
        Route::get('/my-jobs', function () {
            return view('applicant.my-jobs');
        })->name('applicant.my_jobs');
        Route::get('/my-profile', [EmpProfileController::class, 'index'])->name('applicant.profile');
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
