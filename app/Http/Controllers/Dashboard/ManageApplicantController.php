<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ManageApplicantController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $jobId = $request->input('job_id');

        if ($jobId) {
            $applicants = User::join('applied_job', 'users.id', '=', 'applied_job.user_id')
                ->where('applied_job.job_id', $jobId)
                ->get();

            return view('dashboard.manage-applicant')
                ->with('applicants', $applicants)
                ->with('jobId', $jobId);
        } else {
            $jobs = Job::where('user_id', Auth::user()->id)->get();

            return view('dashboard.manage-applicant')
                ->with('jobs', $jobs);
        }
    }

    public function accept(Request $request)
    {
        $jobId = $request->input('job_id');
        $userId = $request->input('user_id');

        $appliedJob = AppliedJob::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->first();

        $appliedJob->status = 'Active';
        $appliedJob->save();

        return redirect()->back();
    }

    public function reject(Request $request)
    {
        $jobId = $request->input('job_id');
        $userId = $request->input('user_id');

        $appliedJob = AppliedJob::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->first();

        $appliedJob->status = 'Trashed';
        $appliedJob->save();

        return redirect()->back();
    }

    public function downloadCv($cv_name)
    {
        return Storage::download('public/cvs/' . $cv_name);
    }
}
