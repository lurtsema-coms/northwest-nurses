<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class EmpDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd('test');
        $userId = auth()->user()->id;
        $currentMonth = date('m');
        $currentYear = date('Y');

        $data = [];
        $data['module_title'] = 'Dashboard';
        $job_posting = JobPosting::where('created_by', auth()->user()->id);
        $job_counts = $job_posting->selectRaw("
            COUNT(*) as total,
            COUNT(CASE WHEN status = 'ACTIVE' AND deleted_at IS NULL THEN 1 END) as active,
            COUNT(CASE WHEN deleted_at IS NOT NULL THEN 1 END) as expired
        ")->first();

        $data['job_total_posts'] = $job_counts->total;
        $data['job_active_posts'] = $job_counts->active;
        $data['job_expired_posts'] = $job_counts->expired;

        $data['applicant_this_month'] = JobApplication::leftJoin('job_postings' , 'job_postings.id' , 'job_applications.job_posting_id')
        ->where('job_postings.created_by', $userId)
        ->whereMonth('job_applications.created_at', $currentMonth)
        ->whereYear('job_applications.created_at', $currentYear)
        ->count();

        $employmentSuccess = JobPosting::where('created_by', auth()->user()->id)
            ->pluck('id')
            ->toArray();

        $data['job_applicants_per_month'] = JobApplication::where('status', 'APPROVED')
            ->whereIn('job_posting_id', $employmentSuccess)
            ->selectRaw('CONCAT(MONTH(created_at), "/", YEAR(created_at)) as month_year, COUNT(*) as count')
            ->groupBy('month_year')
            ->orderByRaw('MIN(created_at)')
            ->pluck('count', 'month_year');
        
        if ($request->header('HX-Request')) {
            $renderedView = view('components.employer.dashboard', $data)->render();
            $renderedModuleTitle = view('components.employer.module-title', ['module_title' => 'Dashboard'])->render();
            $combinedContent = $renderedView . $renderedModuleTitle;

            return response($combinedContent)
                ->header('HX-Current-URL', 'employer-dashboard');
        } else {
            return view('layouts.employer.dashboard', $data);
        }
    }

    public function employmentChart(Request $request)
    {
        $employmentSuccess = JobPosting::where('created_by', auth()->user()->id)
            ->pluck('id')
            ->toArray();
        $data = [];
        $data['job_applicants_per_month'] = JobApplication::where('status', 'APPROVED')
            ->whereIn('job_posting_id', $employmentSuccess)
            ->selectRaw('CONCAT(MONTH(created_at), "/", YEAR(created_at)) as month_year, COUNT(*) as count')
            ->groupBy('month_year')
            ->orderByRaw('MIN(created_at)')
            ->pluck('count', 'month_year');

        return view('components.employer.custom.employment-chart', $data);
    }

    public function employmentnotification()
    {
        $userId = auth()->user()->id;
        $data = [];
        $data['applied_applicants'] = JobApplication::leftJoin('job_postings', 'job_postings.id', 'job_applications.job_posting_id')
            ->leftJoin('users','users.id', 'job_applications.created_by')
            ->select(
                'job_postings.*',
                'job_applications.id as application_id',
                'job_applications.answer_1',
                'job_applications.status',
                'job_applications.created_at as applied_at',
                'job_applications.created_by as applied_by',
                'users.email',
            )
            ->where('job_postings.created_by',$userId )
            ->where('job_applications.status','APPLIED')
            ->orderBy('job_applications.created_at', 'desc')
            ->get();

        return view('components.employer.custom.employer-notification', $data);

    }

    // public function countNotification(){

    // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
