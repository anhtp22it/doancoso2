<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'isAdmin']);
    }

    public function index()
    {
        $experiences = Experience::all();
        return view('admin.manage-experience')
            ->with('experiences', $experiences);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:experience',
        ]);
        $experience = new Experience();
        $experience->title = $request->title;
        $experience->save();
        return redirect()->back()->with('success', 'Experience Added Successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:experience',
        ]);
        $experience = Experience::find($request->id);
        $experience->title = $request->title;
        $experience->save();
        return redirect()->back()->with('success', 'Experience Updated Successfully');
    }

    public function delete($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect()->back()->with('success', 'Experience Deleted Successfully');
    }
}
