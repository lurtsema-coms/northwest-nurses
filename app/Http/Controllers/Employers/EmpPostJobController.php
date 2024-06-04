<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class EmpPostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->header('HX-Request')) {
            return view('components.employer.jobs')->render() . view('components.employer.module-title', ['module_title' => 'Jobs']);
        } else {
            return view('layouts.employer.job', ['module_title' => 'Jobs']);
        }
    }

    public function getAdd(Request $request){

        $data = [];
        $data['module_title'] = 'Add Jobs';

        
        if ($request->header('HX-Request')) {
            return view('components.employer.jobs-view', $data)->render() . view('components.employer.module-title', $data);
        } else {
            return view('layouts.employer.jobs-add', $data);
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
        $input = $request->all();

        $job_posting = new JobPosting([
            'job_title' => $input['job_title'],
            'profession' => $input['profession'],
            'pay' => $input['pay'],
            'assignment_length' => $input['assignment_length'],
            'schedule' => $input['schedule'],
            'openings' => $input['openings'],
            'start_date' => $input['start_date'],
            'experience' => $input['experience'],
            'address' => $input['address'],
            'question_1' => $input['question_1'],
            'question_2' => $input['question_2'],
            'question_3' => $input['question_3'],
            'job_description' => $input['job_description'],
            'responsibilities' => $input['responsibilities'],
            'requirements' => $input['requirements'],
            'img_link' => 'path',
            'status' => 'ACTIVE',
            'created_by' => auth()->user()->id,
        ]);

        $job_posting->save();

        return redirect(route('employer.job'));
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
