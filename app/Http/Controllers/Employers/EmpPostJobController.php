<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use App\Models\RequiredAttachment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class EmpPostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Jobs';
        $data['paginate'] = 10;
        $query = JobPosting::where('created_by', auth()->user()->id)
            ->withCount('getApplicantsPost')
            ->orderBy('id', 'desc');

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

        $data['jobs'] = $query->orderBy('job_postings.created_at', 'desc')->paginate(10);

        if ($request->header('HX-Request')) {
            $renderedView = view('components.employer.jobs', $data)->render();
            return response($renderedView);
        } else {
            return view('layouts.employer.job', $data);
        }
    }

    public function search(Request $request)
    {
        $data = [];
        $paginate = $request->input('paginate') ?? 10;
        $data['paginate'] = $paginate;

        $query = JobPosting::where('created_by', auth()->user()->id)
            ->withCount('getApplicantsPost')
            ->orderBy('id', 'desc');

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

        $data['jobs'] = $query->orderBy('job_postings.created_at', 'desc')->paginate($paginate);

        if ($request->header('HX-Request')) {
            return view('components.employer.custom.jobs-table-body', $data)->render();
        }
    }


    public function getAdd(Request $request)
    {
        $data = [];
        $data['module_title'] = 'Add Jobs';

        if ($request->header('HX-Request')) {
            return view('components.employer.jobs-view-add', $data)->render() . view('components.employer.module-title', $data);
        } else {
            return view('layouts.employer.jobs-add', $data);
        }
    }

    public function getApplicant(Request $request, string $id)
    {
        $user = Auth::user();
        // Fetch the JobPosting along with its related applicants and their information
        $jobPost = JobPosting::with([
            'getApplicantsPost' => function ($query) {
                $query->orderBy('id', 'desc');
            },
            'getApplicantsPost.getApplicantsInformation',
            'getApplicantsPost.jobApplicationAttachments',
            'getApplicantsPost.jobApplicationAttachments.resume',
            'requiredAttachment'
        ])->findOrFail($id);

        // Check if the authenticated user is the creator of the job posting
        if (!$jobPost || $user->id !== $jobPost->created_by) {
            abort(403);
        }

        $data = [
            'module_title' => 'Applicants',
            'job_posts' => $jobPost,
            'applicants' => $jobPost->getApplicantsPost,
            'applicant_information' => []
        ];

        foreach ($data['applicants'] as $ap) {
            $data['applicant_information'][] = $ap->getApplicantsInformation;
        }

        if ($request->header('HX-Request')) {
            return view('components.employer.emp-applicant', $data)->render() . view('components.employer.module-title', $data);
        } else {
            return view('layouts.employer.jobs-applicant', $data);
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

        $file_img = $input['img_link'];
        $valid_locations = array_keys(config('global.us_states'));

        $request->validate([
            'job_title' => ['required'],
            'location' => ['required', 'in:' . implode(',', $valid_locations)],
            'profession' => ['required'],
            'pay' => ['required'],
            'assignment_length' => ['required'],
            'schedule' => ['required'],
            'openings' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'experience' => ['required'],
            'address' => ['required'],
            'question_1' => ['required'],
            'job_description' => ['required'],
            'responsibilities' => ['required'],
            'requirements' => ['required'],
            'benefits' => ['required'],
            'img_link' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $job_posting = new JobPosting([
            'job_title' => $input['job_title'],
            'location' => $input['location'],
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
            'benefits' => $input['benefits'],
            'img_link' => 'path',
            'job_id' => $unique_id,
            'status' => 'ACTIVE',
            'created_by' => auth()->user()->id,
        ]);

        $job_posting->save();

        if (!empty($input['attachments'])) {
            RequiredAttachment::create([
                'job_posting_id' => $job_posting->id,
                'label' => implode(',', $input['attachments']),
            ]);
        }

        // Img Handling
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
        $user->update(['status' => 'INACTIVE']);

        // Flash a session message
        session()->flash('success', 'App successfully deleted');

        // Return a JSON response
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = Auth::user();
        $jobPost = JobPosting::find($id);

        // Check if the authenticated user is the creator of the job posting
        if (!$jobPost || $user->id !== $jobPost->created_by) {
            abort(403);
        }

        $data = [];
        $data['id'] = $id;
        $data['module_title'] = 'View Jobs';
        $data['selectedJobPost'] = $jobPost;

        if ($request->header('HX-Request')) {
            return view('components.employer.jobs-view', $data)->render();
        } else {
            return view('layouts.employer.jobs-view', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $user = Auth::user();
        $jobPost = JobPosting::with('requiredAttachment')->find($id);

        // Check if the authenticated user is the creator of the job posting
        if (!$jobPost || $user->id !== $jobPost->created_by) {
            abort(403);
        }

        $data = [];
        $data['id'] = $id;
        $data['module_title'] = 'Edit Jobs';
        $data['job_post'] = $jobPost;
        $data['hasAnyApplicantApplied'] = $jobPost->getApplicantsPost->count();

        if ($request->header('HX-Request')) {
            return view('components.employer.jobs-view-edit', $data)->render();
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

        $job_posting = JobPosting::where('id', $id)
            ->withCount('requiredAttachment', 'getApplicantsPost')
            ->get()
            ->first();

        if ($job_posting->get_applicants_post_count > 0) {
            return redirect()->back()->with('error', 'Your app has been failed to update.');
        }

        $valid_locations = array_keys(config('global.us_states'));

        $request->validate([
            'job_title' => ['required'],
            'location' => ['required', 'in:' . implode(',', $valid_locations)],
            'profession' => ['required'],
            'pay' => ['required'],
            'assignment_length' => ['required'],
            'schedule' => ['required'],
            'openings' => ['required'],
            'start_date' => ['required', 'date'],
            'experience' => ['required'],
            'address' => ['required'],
            'question_1' => ['required'],
            'job_description' => ['required'],
            'responsibilities' => ['required'],
            'requirements' => ['required'],
            'benefits' => ['required'],
            'img_link' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);



        if (isset($input['img_link'])) {
            $file_name = $job_posting->file_name;
            $file_img = $input['img_link'];

            // Validates image
            $mime_type_img = $file_img->getClientMimeType();
            if (!(str_starts_with($mime_type_img, 'image/'))) {
                return redirect()->back()->with('error', 'Your app has been failed to update jobs. Upload image only');
            }

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

        $job_posting->update([
            'job_title' => $input['job_title'],
            'location' => $input['location'],
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
            'benefits' => $input['benefits'],
            'updated_by' => auth()->user()->id,
        ]);

        if (!$job_posting->requiredAttachment && !empty($input['attachments'])) {
            RequiredAttachment::create([
                'job_posting_id' => $job_posting->id,
                'label' => implode(',', $input['attachments']),
            ]);
        } elseif ($job_posting->requiredAttachment && !empty($input['attachments'])) {
            $job_posting->requiredAttachment->update([
                'label' => implode(',', $input['attachments'])
            ]);
        } else if ($job_posting->requiredAttachment && empty($input['attachments'])) {
            $job_posting->requiredAttachment->update([
                'label' => null
            ]);
        }

        return redirect(route('employer.job'))->with('success', 'Your app has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function editApplicant(Request $request, string $id)
    {
        $input = $request->all();
        $job_application = JobApplication::find($id);

        $job_application->update([
            'status' => $input['action-btn'],
            'updated_by' => auth()->user()->id,
            'updated_at' => date('Y-m-d')
        ]);

        if ($input['action-btn'] == 'APPROVED') {
            $job_application->update([
                'hired_by' => auth()->user()->id,
                'hired_at' => date('Y-m-d')
            ]);
        }

        return redirect()->back()->with('success', 'Your app has been successfully updated.');
    }
}
