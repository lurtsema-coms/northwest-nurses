<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsResponseNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    public function findJobs(Request $request)
    {
        return view('find-jobs');
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
}
