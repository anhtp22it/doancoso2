@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h2 class="text-dark">My Applied Jobs</h2>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-12">
                    <p class="m-0 p-0 ft-sm">
                        You have applied
                        <span class="text-dark fw-bold">{{ $jobs->count() }}</span> jobs
                    </p>
                </div>
                @if (session('delete'))
                    <div class="alert alert-success col-12">
                        <strong>Success!</strong> {{ session('delete') }}
                    </div>
                @endif
                <div class="col-12">
                    <div class="mb-4 rounded overflow-auto">
                        <div>
                            <table class="table bg-white">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Applied Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="cats-box rounded bg-white d-flex align-items-center">
                                                    <div class="text-center">
                                                        <img src="{{ $job->job->getJobPath() }}" class="img-fluid"
                                                            width="55" alt="" />
                                                    </div>
                                                    <div class="px-2">
                                                        <h4 class="fs-6 mb-1">
                                                            {{ $job->job->title }}
                                                        </h4>
                                                        <div class="d-block mb-2 position-relative">
                                                            <span>
                                                                <i class="lni lni-map-marker me-1"></i>
                                                                {{ $job->job->city }}, {{ $job->job->country }}
                                                            </span>
                                                            <span class="ms-2 theme-cl">
                                                                <i class="lni lni-briefcase me-1"></i>
                                                                {{ $job->job->jobType->type }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($job->job->status == 'Active')
                                                    <span class="text-info">
                                                        {{ $job->job->status }}
                                                    </span>
                                                @endif
                                                @if ($job->job->status == 'Expired')
                                                    <span class="text-danger">
                                                        {{ $job->job->status }}
                                                    </span>
                                                @endif
                                                @if ($job->job->status == 'Pending')
                                                    <span class="text-warning">
                                                        {{ $job->job->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ \Illuminate\Support\Carbon::parse($job->created_at)->format('d M Y') }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('single-job', ['id' => $job->job_id]) }}"
                                                        class="p-2 rounded-circle text-info bg-light-info d-inline-flex align-items-center justify-content-center me-1">
                                                        <i class="lni lni-eye"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('user.appliedJob.delete', ['id' => $job->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="id" value="{{ $job->id }}">
                                                        <button type="submit"
                                                            class="p-2 border-0 rounded-circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ms-1">
                                                            <i class="lni lni-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $jobs->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
@endsection
