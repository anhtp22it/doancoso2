<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $job = Job::where('status', 'pending')->get();

        return view('admin.index')
            ->with('user', $user)
            ->with('jobs', $job);
    }


}
