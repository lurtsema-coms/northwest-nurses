<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class EmpDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
        
        if ($request->header('HX-Request')) {
            return view('components.employer.dashboard', $data)->render() . view('components.employer.module-title', ['module_title' => 'Dashboard']);
        } else {
            return view('layouts.employer.dashboard', $data);
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
