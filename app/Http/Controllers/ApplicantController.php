<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    public function myJobs(Request $request)
    {
        return view('applicants.my-jobs');
    }

    public function myProfile(Request $request)
    {
        $userData = User::find(Auth::user()->id)->toArray();
        $applicantDetails = Auth::user()->applicantDetail;
        $data = array_merge($userData, $applicantDetails->toArray());
        return view('applicants.my-profile', $data);
    }

    public function updateMyProfile(Request $request, $userId)
    {
        if (Auth::user()->id != $userId) {
            abort(403);
        }

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class, 'email')->ignore($userId)],
            'address' => ['required'],
            'contact_number' => ['required'],
            'contact_number' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'birthdate' => ['required'],
        ]);

        $user = User::find($userId);

        $user->update([
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $user->applicantDetail->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
