<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\JobPosting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmDashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Dashboard';
        $data['active_job_posting'] = JobPosting::countActiveJobPosting();
        $data['total_job_post'] = JobPosting::totalJobPost();
        $data['total_deleted_job_post'] = JobPosting::totalDeletedJobPost();
        $data['total_applicant'] = User::countApplicants();
        $data['total_employer'] = User::countEmployer();

        if ($request->header('HX-Request')) {
            $renderedView = view('admin.main-page.dashboard', $data)->render();

            return response($renderedView)
                ->header('HX-Current-URL', 'admin-dashboard');
        } else {
            return view('admin.admin-dashboard', $data);
        }
    }
}
