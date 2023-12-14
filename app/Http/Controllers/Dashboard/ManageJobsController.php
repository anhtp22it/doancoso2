<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobRequirement;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManageJobsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index() {
        $jobs = Job::where('user_id', auth()->user()->id)->paginate(6);
        return view('dashboard.manage-jobs')
            ->with('jobs', $jobs);
    }

    public function editUi($id) {
        $jobTypes = JobType::getJobTypes();
        $jobCategories = Category::getCategories();
        $experiences = Experience::getExperiences();
        $job = Job::find($id);

        return view('dashboard.edit-jobs')
            ->with('job', $job)
            ->with('jobTypes', $jobTypes)
            ->with('jobCategories', $jobCategories)
            ->with('experiences', $experiences);
    }

    public function editJob(Request $request) {
        $job = Job::find($request->id);

        $job->title = $request->title;
        $job->company = $request->company;
        $job->description = $request->description;
        $job->category_id = $request->category;
        $job->salary = $request->salary;
        $job->type_id = $request->type;
        $job->experience_id = $request->experience;
        $job->deadline = $request->input('dealine');
        $job->country = $request->country;
        $job->city = $request->city;
        $job->full_address = $request->full_address;
        $job->applicant_limit = $request->applicant_limit;
//        xoá toàn bộ requirements cũ
        $job->requirements()->delete();
//        thêm requirements mới
        $requirements = $request->input('requirements');
        foreach ($requirements as $requirement) {
            $jobRequirement = new JobRequirement();
            $jobRequirement->job_id = $job->id;
            $jobRequirement->requirement = $requirement;
            $jobRequirement->save();
        }

        //image
        if ($request->hasFile('job_image')) {
            $imagePath = $job->image;
            if ($imagePath && Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }

            $originalFileName = $request->file('job_image')->getClientOriginalName();
            $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('job_image')->getClientOriginalExtension();
            $uniqueFileName = $fileName . '_' . time() . '.' . $fileExtension;
            $imagePath = $request->file('job_image')->storeAs('job-images', $uniqueFileName, 'public');
            $job->image = $imagePath;
        }

        $job->save();

        return redirect()->route('user.manage-jobs')->with('edit', 'Job Has Been Edited');
    }

    public function delete($id) {
        $job = Job::find($id);
        if (!$job) {
            return redirect()->route('jobs.index')->with('error', 'Công việc không tồn tại.');
        }

        $imagePath = $job->image;
        if ($imagePath && Storage::exists('public/' . $imagePath)) {
            Storage::delete('public/' . $imagePath);
        }

        $job->delete();
        return redirect()->route('user.manage-jobs')->with('delete', 'Job Has Been Deleted');
    }
}
