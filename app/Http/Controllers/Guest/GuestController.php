<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsResponseNotif;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;
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
        $request->merge(['show_applied_jobs' => $request->show_applied_jobs ?? 'true']);
        $htmxParamString = http_build_query($request->except('id'));
        $jobPostingId = $request->id;
        $search = $request->search;
        $location = $request->location;
        $showAppliedJobs = $request->show_applied_jobs == 'true';
        $data = [];
        $data['htmxParamString'] = $htmxParamString;
        $data['request'] = $request;
        $activeJobPostQuery = (new JobPosting())
            ->getActiveJobPostings()
            ->applicationInfo();

        $activeJobPosts = (clone $activeJobPostQuery)
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('employer_details.name', 'like', "%{$search}%")
                        ->orWhere('job_postings.job_title', 'like', "%{$search}%");
                });
            })
            ->when($location, function ($query, $location) {
                return $query->where('job_postings.location', $location);
            });
        if (auth()->check() && auth()->user()->role == 'applicant') {
            $activeJobPosts = $activeJobPosts->when(!$showAppliedJobs, function ($query) {
                return $query->whereNull('job_applications.id');
            });
        }
        $activeJobPosts = $activeJobPosts
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();


        $selectedJobPost = (clone $activeJobPostQuery)
            ->where('job_postings.id', $jobPostingId)
            ->first() ?? (clone $activeJobPosts)->first();

        if ($request->header('HX-Request')) {
            return view(
                'components.find-job-page.job-info',
                ['selectedJobPost' => $selectedJobPost]
            )->render() . view('vendor.pagination.custom-pagination', ['paginator' => $activeJobPosts]);
        } else {
            $data['activeJobPosts'] = $activeJobPosts;
            $data['selectedJobPost'] = $selectedJobPost ?? null;
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
            return redirect(route('contact-us'))->with('error', "Something went wrong. Please try again later.");
        }

        return redirect(route('contact-us'))->with('success', "Thank you for reaching out! We'll get back to you soon.");
    }
}
