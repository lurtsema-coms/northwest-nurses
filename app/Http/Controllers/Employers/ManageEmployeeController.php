<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;

class ManageEmployeeController extends Controller
{

    public function index(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Manage Employees';
        $data['paginate'] = 10;
        $userId = auth()->user()->id;
        $query = JobApplication::leftJoin('job_postings', 'job_postings.id', 'job_applications.job_posting_id')
            ->leftJoin('users', 'users.id', 'job_applications.created_by')
            ->leftJoin('applicant_details', 'applicant_details.id', 'job_applications.created_by')
            ->select(
                'job_postings.*',
                'job_applications.job_posting_id as posting_id',
                'job_applications.id as application_id',
                'job_applications.answer_1',
                'job_applications.status',
                'job_applications.created_at as applied_at',
                'job_applications.hired_at',
                'job_applications.hired_by',
                'users.email',
                'users.contact_number',
                'applicant_details.first_name',
                'applicant_details.last_name',
                'applicant_details.birthdate',
                'applicant_details.sex',
            )
            ->where('job_postings.created_by', $userId)
            ->where('job_applications.status', 'APPROVED')
            ->orderBy('job_applications.created_at', 'desc');

        if ($request->has('paginate')) {
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

        $data['applicants'] = $query->orderBy('job_postings.created_at', 'desc')->paginate(10);

        if ($request->header('HX-Request')) {
            $renderedView = view('components.employer.m-employee', $data)->render();
            return response($renderedView);
        } else {
            return view('layouts.employer.m-employee', $data);
        }
    }

    public function remove($id)
    {
        $job_application = JobApplication::find($id);

        $job_posting = JobPosting::find($job_application->job_posting_id);
        if ($job_posting->created_by !== auth()->user()->id) {
            abort(403);
        }
        $job_application?->update([
            'status' => 'REMOVED'
        ]);

        return redirect(route('employer.m-employee'))->with('success', 'Applicant has been removed.');
    }
}
