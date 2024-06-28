<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class ManageEmployeeController extends Controller
{
    
    public function index(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Manage Employees';
        $data['paginate'] = 10;
        $query = JobPosting::
            where('created_by', auth()->user()->id)
            ->withCount('getApplicantsPost')
            ->orderBy('id', 'desc');

        if ($request->has('paginate')){
            $data['paginate'] = $request->input('paginate');
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('job_title', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('profession', 'like', "%{$search}%")
                    ->orWhere('pay', 'like', "%{$search}%")
                    ->orWhere('openings', 'like', "%{$search}%");
            });
        }

        $data['jobs'] = $query->orderBy('job_postings.created_at', 'desc')->paginate(10);

        if ($request->header('HX-Request')) {
            $renderedView = view('components.employer.m-employee', $data)->render();
            return response($renderedView);
        } else {
            return view('layouts.employer.m-employee', $data);
        }
    }
}
