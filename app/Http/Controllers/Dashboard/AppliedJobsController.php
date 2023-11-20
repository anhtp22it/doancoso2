<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppliedJobsController extends Controller
{
    //

    public function index() {
        $jobs = AppliedJob::where('user_id', Auth::user()->id)->paginate(6);
        return view('dashboard.applied-jobs')
            ->with('jobs', $jobs);
    }

    public function delete($id) {
        $job = AppliedJob::find($id);
        $job->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }
}
