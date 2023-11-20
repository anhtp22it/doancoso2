@extends('admin.layouts.app')

@section('content')
    <div class="container p-4">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="dash-widgets py-5 px-4 bg-info rounded">
                        <h2 class="ft-medium mb-1 fs-xl text-light">{{ \App\Models\User::count() }}</h2>
                        <p class="p-0 m-0 text-light fs-md">Users</p>
                        <i class="lni lni-users"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="dash-widgets py-5 px-4 bg-purple rounded">
                        <h2 class="ft-medium mb-1 fs-xl text-light">{{ \App\Models\Job::count() }}</h2>
                        <p class="p-0 m-0 text-light fs-md">Jobs</p>
                        <i class="lni lni-empty-file"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="dash-widgets py-5 px-4 bg-warning rounded">
                        <h2 class="ft-medium mb-1 fs-xl text-light">{{ \App\Models\AppliedJob::count() }}</h2>
                        <p class="p-0 m-0 text-light fs-md">Applied</p>
                        <i class="lni lni-bar-chart"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="dash-widgets py-5 px-4 bg-dark rounded">
                        <h2 class="ft-medium mb-1 fs-xl text-light">{{ \App\Models\SavedJob::count() }}</h2>
                        <p class="p-0 m-0 text-light fs-md">Bookmarts</p>
                        <i class="lni lni-heart"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="col-12">
            <div class="mb-4 rounded overflow-auto">
                <div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table bg-white">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Dealine</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>
                                        <div class="cats-box rounded bg-white d-flex align-items-center">
                                            <div class="text-center">
                                                <img src="{{ $job->getJobPath() }}" class="img-fluid" width="55"
                                                    alt="" />
                                            </div>
                                            <div class="px-2">
                                                <h4 class="fs-6 mb-1">{{ $job->title }}</h4>
                                                <div class="d-block mb-2 position-relative">
                                                    <span>
                                                        <i class="lni lni-map-marker me-1"></i>
                                                        {{ $job->city }}, {{ $job->country }}
                                                    </span>
                                                    <span class="ms-2 theme-cl">
                                                        <i class="lni lni-briefcase me-1"></i>
                                                        {{ $job->jobType->type }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="applicant-status text-center bg-light-warning">
                                            <small class="text-warning p-2">Pending</small>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($job->created_at)->format('Y-m-d')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('single-job', ['id' => $job->id]) }}"
                                                class="p-2 rounded-circle text-info bg-light-info d-inline-flex align-items-center justify-content-center me-1">
                                                <i class="lni lni-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.approveJob', ['id' => $job->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit"
                                                    class="p-2 border-0 rounded-circle text-success bg-light-success d-inline-flex align-items-center justify-content-center ms-1">
                                                    <i class="lni lni-checkmark"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.rejectJob', ['id' => $job->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <button type="submit"
                                                    class="p-2 border-0 rounded-circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ms-1">
                                                    <i class="lni lni-close"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @php($stt++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
