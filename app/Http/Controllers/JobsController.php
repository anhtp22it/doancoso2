<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobRequirement;
use App\Models\JobType;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function search(Request $request)
    {

        $name = $request->name;
        $category = $request->category;

        $name == null ? '' : $name;

        $name = $name ?? '';

        if ($category != 0) {
            $jobs = Job::where('title', 'like', '%' . $name . '%')->where('category_id', $category)->where("status", "Active")->where('user_id', '!=', Auth::id())->paginate(16);
        } else {
            $jobs = Job::where('title', 'like', '%' . $name . '%')->where("status", "Active")->where('user_id', '!=', Auth::id())->paginate(16);
        }

        return view('job-search')
            ->with('jobs', $jobs)
            ->with('name', $name);
    }

    public function single($id)
    {

        $job = Job::find($id);

        $related_jobs = Job::where('category_id', $job->category_id)
            ->where('id', "!=", $id)
            ->take(4)->get();

        $savedJob = SavedJob::where('job_id', $id)->where('user_id', Auth::user()->id)->count();

        $appliedJob = AppliedJob::where('job_id', $id)->where('user_id', Auth::user()->id)->count();

        return view('single-job')
            ->with('job', $job)
            ->with('related_jobs', $related_jobs)
            ->with('savedJob', $savedJob)
            ->with('appliedJob', $appliedJob);
    }

    public function saveJob(Request $request)
    {
        $savedJob = new SavedJob();
        $savedJob->job_id = $request->job_id;
        $savedJob->user_id = $request->user_id;
        $savedJob->save();

        return redirect('/single-job/' . $request->job_id . '')->with('save', 'Job saved');
    }

    public function applyJob(Request $request)
    {
        $request->validate([
            'cv' => 'required',
        ]);

        $applyJob = new AppliedJob();
        $applyJob->job_id = $request->job_id;
        $applyJob->user_id = $request->user_id;
        $applyJob->cv = $request->cv;

        if ($applyJob->save()) {
            $job = Job::find($request->job_id);
            $job->applicant_current += 1;
            $job->save();
        }

        return redirect('/single-job/' . $request->job_id . '')->with('apply', 'Apply Job Success');
    }

    public function postUi()
    {
        $jobTypes = JobType::getJobTypes();
        $jobCategories = Category::getCategories();
        $experiences = Experience::getExperiences();

        return view('dashboard.post-job')
            ->with('jobTypes', $jobTypes)
            ->with('jobCategories', $jobCategories)
            ->with('experiences', $experiences);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|integer|exists:category,id',
            'salary' => 'required|string',
            'type' => 'required|integer|exists:job_type,id',
            'experience' => 'required|integer|exists:experience,id',
            'dealine' => 'required|date',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'full_address' => 'required|string',
            'applicant_limit' => 'required|integer|min:1',
            'job_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //image
        $originalFileName = $request->file('job_image')->getClientOriginalName();
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
        $fileExtension = $request->file('job_image')->getClientOriginalExtension();
        $uniqueFileName = $fileName . '_' . time() . '.' . $fileExtension;
        $imagePath = $request->file('job_image')->storeAs('job-images', $uniqueFileName, 'public');

        $description = $request->description;
        $description = nl2br($description);

        $job = new Job();
        $job->title = $request->title;
        $job->company = $request->company;
        $job->description = $description;
        $job->category_id = $request->category;
        $job->salary = $request->salary;
        $job->type_id = $request->type;
        $job->experience_id = $request->experience;
        $job->deadline = $request->input('dealine');
        $job->country = $request->country;
        $job->city = $request->city;
        $job->full_address = $request->full_address;
        $job->applicant_limit = $request->applicant_limit;
        $job->user_id = Auth::user()->id;
        $job->image = $imagePath;
        $job->status = "Pending";
        $job->save();

        //requirements
        $requirements = $request->input('requirements');
        foreach ($requirements as $requirement) {
            $jobRequirement = new JobRequirement();
            $jobRequirement->job_id = $job->id;
            $jobRequirement->requirement = $requirement;
            $jobRequirement->save();
        }

        $jobs = Job::where('user_id', Auth::user()->id)->paginate(8);

        return redirect(route('user.manage-jobs'))
            ->with('jobs', $jobs)
            ->with('create', 'Job Has Been Created');
    }
}
