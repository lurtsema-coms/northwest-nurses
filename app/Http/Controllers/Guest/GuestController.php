<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function findJobs(Request $request)
    {
        return view('find-jobs');
    }
}
