<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsResponseNotif;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $mostRecentJobPostings = (new JobPosting())->getRecentJobPostings();
        $data = [];
        $data['mostRecentJobPostings'] = $mostRecentJobPostings;
        return view('welcome', $data);
    }

    public function findJobs(Request $request)
    {
        $jobPostingId = $request->id;
        $data = [];
        if (!$jobPostingId) {
            $activeJobPosts = (new JobPosting())->getActiveJobPostings()
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $activeJobPosts = (new JobPosting())->getActiveJobPostings()
                ->orderBy(DB::raw("job_postings.id = $jobPostingId"), 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        if ($request->header('HX-Request')) {
            return view('components.find-job-page.job-info', ['jobPost' => JobPosting::find($jobPostingId)]);
        } else {
            $data['activeJobPosts'] = $activeJobPosts;
            return view('find-jobs', $data);
        }
    }

    public function submitContactUsResponse(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        $details = [
            'name' => $name,
            'email' => $email,
            'form_message' => $message,
        ];

        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactUsResponseNotif($details));
        } catch (\Exception $e) {
            //
            Log::error("Error sending mail: " . $e->getMessage());
        }

        return redirect(url('/'))->with('success', 'form-response-success');
    }

    public function getJob(Request $request, $id)
    {
        $job_post = JobPosting::findOrFail($id);
        return response()->json($job_post);
    }
    
    public function applyJob(Request $request, $id)
    {
        $user_id = auth()->user()->id;
    
        $application = JobApplication::create([
            'job_posting_id' => $id,
            'status' => 'APPLIED',
            'status_history' => json_encode([[ date('Y-m-d H:i:s') => 'APPLIED']]),
            'answer_1' => $request->input('answer_1'),
            'answer_2' => $request->input('answer_2'),
            'answer_3' => $request->input('answer_3'),
            'created_by' => $user_id,
        ]);
    
        return redirect()->back()->with('success', 'Applied Successfully.');
    }


}
