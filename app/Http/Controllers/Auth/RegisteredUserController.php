<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDetail;
use App\Models\EmployerDetail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Throwable;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register-2');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request, $role): RedirectResponse
    public function store(Request $request, $role)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['required'],
            'contact_number' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($role == 'applicant') {
            $request->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'sex' => ['required'],
                'birthdate' => ['required', 'date'],
            ]);
        } else if ($role == 'employer') {
            $request->validate([
                'company_name' => ['required'],
            ]);
        }

        $user = User::create([
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'role' => $role,
            'password' => Hash::make($request->password),
            'created_at' => now()
        ]);

        if ($role == 'applicant') {
            $userDetails = ApplicantDetail::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_id' => $user->id,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'created_at' => now()
            ]);
        } else if ($role == 'employer') {
            $userDetails = EmployerDetail::create([
                'user_id' => $user->id,
                'name' => $request->company_name,
                'website' => $request->company_website,
            ]);
        }


        try {
            event(new Registered($user));
            $user->sendEmailVerificationNotification();
        } catch (Throwable $e) {
            $userDetails->delete();
            $user->delete();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later...');
        }


        return redirect()->route('verification.notice');
    }
}
