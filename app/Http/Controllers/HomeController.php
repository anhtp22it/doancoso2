<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allCategories = Category::all();
        $categories = Category::withCount('jobs')->paginate(12);
        $jobs = Job::where('status', 'Active')->where('user_id', '!=', Auth::id())->paginate(8);


        return view('home')
            ->with('allCategories', $allCategories)
            ->with('categories', $categories)
            ->with('jobs', $jobs);

    }

    public function contactUs() {
        return view('contact-us');
    }

    public function privacy() {
        return view('privacy');
    }
}
