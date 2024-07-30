<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDetail;
use App\Models\EmployerDetail;
use App\Models\User;
use App\Models\Resume;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        return view('auth.register');
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
                'sex' => ['required', 'in:male,female'],
                'birthdate' => ['required', 'date'],
                'resume' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            ]);
        } else if ($role == 'employer') {
            $request->validate([
                'company_name' => ['required'],
            ]);
        } else {
            abort(404);
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
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $path = "applicant-resume/$user->id/";
                $filename = $originalName . '.' . $extension;
                $counter = 1;
                // Check if file with same name exists and increment the filename
                while (Storage::exists($path . $filename)) {
                    $filename = $originalName . ' (' . $counter . ').' . $extension;
                    $counter++;
                }
                $file->storeAs($path, $filename);

                $userResume = Resume::create([
                    'user_id' => $user->id,
                    'default' => 1,
                    'file_path' => $path . $filename,
                    'created_at' => now(),
                ]);
            }

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
            return redirect()->route('register')->with('success', 'A verification link has been sent to your email address. Please verify your email address to continue.');
        } catch (Throwable $e) {
            $userDetails->delete();
            $userResume->delete();
            $user->delete();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later...');
        }
    }
}
