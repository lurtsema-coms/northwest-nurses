<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\EmployerDetail;
use App\Models\User;
use Illuminate\Http\Request;

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
            ->select('users.*',
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
        $input = $request->all();

        User::find($id)
            ->update([
                'email' => $input['company_email'],
                'contact_number' => $input['company_contact_number'],
                'address' => $input['company_address'],
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        EmployerDetail::where('user_id', $id)
            ->update([
                'name' => $input['company_name'],
                'website' => $input['company_website'],
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
