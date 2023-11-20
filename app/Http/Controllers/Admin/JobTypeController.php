<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    //

    public function index()
    {
        $job_types = JobType::all();
        return view('admin.manage-type')
            ->with('job_types', $job_types);
    }

    public function store(Request $request) {
        $request->validate([
            'type' => 'required|unique:job_type',
        ]);
        $jobType = new JobType();
        $jobType->type = $request->type;
        $jobType->save();
        return redirect()->back()->with('success', 'Job Type added successfully');
    }

    public function update(Request $request) {
        $request->validate([
            'type' => 'required|unique:job_type,type,'.$request->id,
        ]);
        $jobType = JobType::find($request->id);
        $jobType->type = $request->type;
        $jobType->save();
        return redirect()->back()->with('success', 'Job Type updated successfully');
    }

    public function delete($id) {
        $jobType = JobType::find($id);
        $jobType->delete();
        return redirect()->back()->with('success', 'Job Type deleted successfully');
    }
}
