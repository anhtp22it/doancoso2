<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index() {
        $user = Auth::user();
        $savedJobs = $user->savedJobs->count();
        $appliedJobs = $user->appliedJobs->count();

        return view('dashboard.dashboard')
            ->with('savedJobs', $savedJobs)
            ->with('appliedJobs', $appliedJobs);
    }

    public function changePassword() {
        return view('dashboard.change-password');
    }
}
