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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $role): RedirectResponse
    {
        // dd($request->all(), $role);
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'role' => $role,
            'password' => Hash::make($request->password),
            'created_at' => now()

        ]);

        if ($role == 'applicant'){
            ApplicantDetail::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_id' => $user->id,
                'birthdate' => $request->birthdate,
                'created_at' => now()
            ]);
        }
        else if ($role == 'employer'){
            EmployerDetail::create([
                'user_id' => $user->id,
                'name' => $request->company_name,
                'website' => $request->company_website,
            ]);
        }

        event(new Registered($user));

        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice');
    }
}
