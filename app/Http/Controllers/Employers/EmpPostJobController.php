<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\Facades\Image;

class EmpPostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        $data['jobs'] = JobPosting::leftJoin('employer_details as creator', 'creator.user_id', 'job_postings.created_by')
            ->leftJoin('employer_details as updator', 'updator.user_id', 'job_postings.updated_by')
            ->select(
                'job_postings.*',
                'creator.name as creator_name',
                'updator.name as updator_name'
            )
            ->whereNull('job_postings.deleted_at')
            ->orderBy('job_postings.created_at', 'desc') // Order by created_at in descending order
            ->paginate(10);

        if ($request->header('HX-Request')) {
            return view('components.employer.jobs', $data)->render() . view('components.employer.module-title', ['module_title' => 'Jobs']);
        } else {
            return view('layouts.employer.job', ['module_title' => 'Jobs', 'jobs' => $data['jobs']]);
        }
    }

    public function getAdd(Request $request)
    {

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

        $unique_id = uniqid();


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
            'job_id' => $unique_id,
            'status' => 'ACTIVE',
            'created_by' => auth()->user()->id,
        ]);

        $job_posting->save();

        // Img Handling
        $file_img = $input['img_link'];
        $img_extension = $file_img->getClientOriginalExtension();
        $file_name = "$job_posting->id - job_cover-$unique_id.$img_extension";

        // Move the image to the public directory
        $file_path = public_path('img/job-cover') . '/' . $file_name;
        $file_img->move(public_path('img/job-cover'), $file_name);
        // Open the image using Intervention Image
        $image = Image::make($file_path);
        // Resize the image to your desired dimensions (optional)
        $image->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Optimize and save the image
        $image->save($file_path, 80);

        JobPosting::find($job_posting->id)
            ->update([
                'img_link' => asset("img/job-cover/$file_name"),
                'file_name' => $file_name
            ]);

        return redirect(route('employer.job'));
    }

    public function delete($id)
    {
        $user = JobPosting::withTrashed()->find($id);
        $user->delete();
        return true;
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
    public function edit(Request $request, string $id)
    {
        $data = [];
        $data['id'] = $id;
        $data['module_title'] = 'Edit Jobs';
        $data['job_post'] = JobPosting::find($id);

        if ($request->header('HX-Request')) {
            return view('components.employer.jobs-view-edit', $data)->render() . view('components.employer.module-title', ['module_title' => $data['module_title']]);
        } else {
            return view('layouts.employer.jobs-edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        
        $job_posting = JobPosting::find($id);

        $job_posting->update([
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
            'updated_by' => auth()->user()->id,
        ]);

        if(isset($input['img_link'])){
            $file_name = $job_posting->file_name;
            $file_img = $input['img_link'];
            // Move the image to the public directory
            $file_path = public_path('img/job-cover') . '/' . $file_name;
            $file_img->move(public_path('img/job-cover'), $file_name);
            // Open the image using Intervention Image
            $image = Image::make($file_path);
            // Resize the image to your desired dimensions (optional)
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Optimize and save the image
            $image->save($file_path, 80);
        }

        return redirect(route('employer.job'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
