@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-6">
                    <div class="dash-widgets py-5 px-4 bg-info rounded">
                        <h2 class="ft-medium mb-1 fs-xl text-light">{{ $appliedJobs }}</h2>
                        <p class="p-0 m-0 text-light fs-md">Applied Jobs</p>
                        <i class="lni lni-empty-file"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="dash-widgets py-5 px-4 bg-purple rounded">
                        <h2 class="ft-medium mb-1 fs-xl text-light">{{ $savedJobs }}</h2>
                        <p class="p-0 m-0 text-light fs-md">Bookmark jobs</p>
                        <i class="lni lni-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
