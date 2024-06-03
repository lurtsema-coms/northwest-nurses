<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail() && $request->user()->role == 'applicant') {
            return redirect()->intended(RouteServiceProvider::HOME_APPLICANT);
        } else if ($request->user()->hasVerifiedEmail() && $request->user()->role == 'employer') {
            return redirect()->intended(RouteServiceProvider::HOME_EMPLOYER);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
