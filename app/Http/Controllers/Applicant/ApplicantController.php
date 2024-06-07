<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    public function myJobs(Request $request)
    {
        $myId = Auth::user()->id;
        $jobPostingId = $request->id;

        $myJobs = (new JobPosting())
            ->applicationInfo()
            ->whereRaw("job_postings.id in (SELECT job_posting_id FROM job_applications WHERE created_by = $myId)")
            ->paginate(10);

        $selectedJobPost = (new JobPosting())
            ->applicationInfo()
            ->whereRaw("job_postings.id in (SELECT job_posting_id FROM job_applications WHERE created_by = $myId)")
            ->where('job_postings.id', $jobPostingId)
            ->first();

        if ($request->header('HX-Request')) {
            return view(
                'components.find-job-page.job-info',
                ['selectedJobPost' => $selectedJobPost]
            )->render() . view('vendor.pagination.custom-pagination', ['paginator' => $myJobs]);
        }
        $data['myJobs'] = $myJobs;

        return view('applicants.my-jobs', $data);
    }

    public function myProfile(Request $request)
    {
        $userData = User::find(Auth::user()->id)->toArray();
        $applicantDetails = Auth::user()->applicantDetail;
        $data = array_merge($userData, $applicantDetails->toArray());
        return view('applicants.my-profile', $data);
    }

    public function updateMyProfile(Request $request, $userId)
    {
        if (Auth::user()->id != $userId) {
            abort(403);
        }

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class, 'email')->ignore($userId)],
            'address' => ['required'],
            'contact_number' => ['required'],
            'contact_number' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'birthdate' => ['required'],
        ]);

        $user = User::find($userId);

        $user->update([
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);

        $user->applicantDetail->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        if (Hash::check($request->all()['current_password'], $user->password)) {

            $request->validate([

                'new_password' => 'required|min:8',
                'confirmation_password' => 'required|min:8|same:new_password'
            ]);

            $user->password = Hash::make($request->get('new_password'));
            $user->save();

            return redirect()->back()->with('successPassword', 'Password updated, you will be logged-out.');
        } else {
            return redirect()->back()->with('error', 'Incorrect Current Password.');
        }
    }

    public function getQuestions(Request $request, $id)
    {
        $jobPost = JobPosting::findOrFail($id);
        return view('components.find-job-page.question-modal', ['jobPost' => $jobPost]);
    }

    public function applyJob(Request $request, $id)
    {
        $user_id = auth()->user()->id;

        $application = JobApplication::create([
            'job_posting_id' => $id,
            'status' => 'APPLIED',
            'status_history' => json_encode([[date('Y-m-d H:i:s') => 'APPLIED']]),
            'answer_1' => $request->input('answer_1'),
            'answer_2' => $request->input('answer_2'),
            'answer_3' => $request->input('answer_3'),
            'created_by' => $user_id,
        ]);

        $jobPost = JobPosting::applicationInfo()->findOrFail($id);
        $dialogData = [
            'title' => 'Thank you for applying to this job!',
            'text_content' => '',
            'id' => 'modal-success',
            'icon' => 'success',
            'showButtonCancel' => false,
            'showButtonSubmit' => true,
            'confirmButtonText' => 'Ok',
            'hidden' => '',
        ];

        return view('components.find-job-page.job-info', ['selectedJobPost' => $jobPost])->render()
            . view('components.dialog', $dialogData)
            . view('components.find-job-page.job-posting-card', ['jobPost' => $jobPost]);
    }
}
