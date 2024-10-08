<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\EmployerDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmpProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Profile';
        $data['user'] = User::where('users.id', auth()->user()->id)
            ->leftJoin('employer_details as employer', 'employer.user_id', 'users.id')
            ->select(
                'users.*',
                'employer.name as company_name',
                'employer.website as company_website',
            )
            ->first();


        if ($request->header('HX-Request')) {
            return view('components.employer.emp-profile', $data)->render() . view('components.employer.module-title', $data);
        } else {
            return view('layouts.employer.profile', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            // 'company_email' => 'required|email',
            'company_contact_number' => 'required',
            'company_address' => 'required',
            'company_name' => 'required',
            'company_website' => 'nullable|url',
            // 'password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return view('components.employer.custom.update-profile', compact('errors'))->render();
        }

        $input = $request->all();

        $user = User::find($id);

        $user->update(
            [
                // 'email' => $input['company_email'],
                'contact_number' => $input['company_contact_number'],
                'address' => $input['company_address'],
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        EmployerDetail::where('user_id', $id)
            ->update(
                [
                    'name' => $input['company_name'],
                    'website' => $input['company_website'],
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );

        // if($input['password']){
        //     $user->update([
        //         'password' => password_hash($input['password'],  PASSWORD_DEFAULT),
        //     ]
        //     );
        // }

        return '<p class="mb-4 font-medium text-green-500">Edited Successfully</p>';
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        if (Hash::check($request->all()['current_password'], $user->password)) {

            $request->validate([

                'new_password' => 'required|min:8',
                'confirmation_password' => 'required|min:8|same:new_password'
            ]);

            $user->password = Hash::make($request->get('new_password'));
            $user->save();

            return redirect()->back()->with('successPassword', 'Password updated, you will be logged-out.');
        } else {
            return redirect()->back()->with('error', 'Incorrect Current Password.');
        }
    }

    public function updateEmail(Request $request, $id)
    {
        $user = User::find($id);
        if (Hash::check($request->input('email_confirmation_password'), $user->password)) {

            $request->validate([
                'new_email' => 'required|email|unique:users,email', // Ensure email is unique
                'confirm_new_email' => 'required|same:new_email'    // Fixed double '|' syntax
            ]);

            $user->email = $request->get('new_email');
            $user->email_verified_at = null;
            $user->save();

            $user->sendEmailVerificationNotification();

            return redirect()->back()->with('successEmail', 'Email updated, you will be logged-out.');
        } else {
            return redirect()->back()->with('error', 'Incorrect Current Password.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
