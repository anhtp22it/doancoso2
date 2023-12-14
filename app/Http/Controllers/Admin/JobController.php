<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'isAdmin']);
    }

    public function index() {
        $jobs = Job::where('status', 'Pending')->get();
        return view('admin.manage-job')
            ->with('jobs', $jobs);
    }

    public function rejectJob($id) {
        $job = Job::find($id);
        $job->status = 'Reject';
        $job->save();

        return redirect()->back()->with('success', 'Job Rejected Successfully');
    }

    public function approveJob($id) {
        $job = Job::find($id);
        $job->status = 'Active';
        $job->save();

        return redirect()->back()->with('success', 'Job Approved Successfully');
    }
}
