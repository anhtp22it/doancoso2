<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function myProfile() {
        $user = User::find(Auth::id());
        $jobTypes = JobType::getJobTypes();
        $jobCategories = Category::getCategories();
        $experiences = Experience::getExperiences();

        return (view('dashboard.my-profile'))
            ->with('user', $user)
            ->with('jobTypes', $jobTypes)
            ->with('jobCategories', $jobCategories)
            ->with('experiences', $experiences);
    }

    public function update(Request $request) {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $imagePath = $user->avatar;
            if ($imagePath && Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }

            $originalFileName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('avatar')->getClientOriginalExtension();
            $uniqueFileName = $fileName . '_' . time() . '.' . $fileExtension;
            $imagePath = $request->file('avatar')->storeAs('avatars', $uniqueFileName, 'public');
            $user->avatar = $imagePath;

        }

        $user->name = $request->input('name');
        $user->job_title = $request->input('job_title');
        $user->phone = $request->input('phone');
        $user->type_id = $request->input('job_type');
        $user->category_id = $request->input('job_category');
        $user->experience_id = $request->input('experience');
        $user->education = $request->input('education');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        $user->age = $request->input('age');
        $user->language = $request->input('language');
        $user->about = $request->input('about');
        $user->save();

        return redirect('/dashboard/myprofile')->with('updated', 'Success Update Information');
    }

    public function updateSocial(Request $request) {
        $user = Auth::user();

        $user->facebook = $request->input('facebook');
        $user->linkedin = $request->input('linkedin');
        $user->instagram = $request->input('instagram');
        $user->twitter = $request->input('twitter');

        $user->save();

        return redirect('/dashboard/myprofile')->with('updated', 'Success Update Social Information');
    }

    public function updateContact(Request $request) {
        $user = Auth::user();

        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->full_address = $request->input('full_address');

        $user->save();

        return redirect('/dashboard/myprofile')->with('updated', 'Success Update Contact Information');
    }

    public function updateCv(Request $request) {
        if ($request->hasFile('cv')) {
            $user = Auth::user();
            $cvPath = $user->cv;
            if ($cvPath && Storage::exists('public/' . $cvPath)) {
                Storage::delete('public/' . $cvPath);
            }

            $cv = $request->file('cv');
            $cvPath = $cv->store('cvs', 'public');
            $user->cv = $cvPath;
            $user->save();
            return redirect('/dashboard/myprofile')->with('success', 'Success Update CV');
        } else {
            return redirect('/dashboard/myprofile')->with('error', 'Please Upload CV');
        }
    }
}
