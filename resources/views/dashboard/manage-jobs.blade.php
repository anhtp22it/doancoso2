@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h2 class="text-dark">Manage Jobs</h2>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                @if (session('delete'))
                    <div class="alert alert-success col-12 text-center">
                        <strong>Success!</strong> {{ session('delete') }}
                    </div>
                @elseif(session('edit'))
                    <div class="alert alert-warning col-12 text-center">
                        <strong>Success!</strong> {{ session('edit') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger col-12 text-center">
                        <strong>Error!</strong> {{ session('error') }}
                    </div>
                @endif
                <div class="col-12">
                    <div class="mb-4 rounded overflow-auto">
                        <div>
                            <table class="table bg-white">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Filled</th>
                                        <th scope="col">Dealine</th>
                                        <th scope="col">Application</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="cats-box rounded bg-white d-flex align-items-center">
                                                    <div class="text-center">
                                                        <img src="{{ $job->getJobPath() }}" class="img-fluid" width="55"
                                                            alt="" />
                                                    </div>
                                                    <div class="px-2">
                                                        <h4 class="fs-6 mb-1">
                                                            {{ $job->title }}
                                                        </h4>
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
                                                @if ($job->status == 'Active')
                                                    <div class="applicant-status text-center bg-light-success">
                                                        <small class="text-success p-2">Active</small>
                                                    </div>
                                                @elseif($job->status == 'Pending')
                                                    <div class="applicant-status text-center bg-light-subtle">
                                                        <small class="text-warning p-2">Pending</small>
                                                    </div>
                                                @else
                                                    <div class="applicant-status text-center bg-light-danger">
                                                        <small class="text-danger p-2">{{ $job->status }}</small>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($job->applicant_limit == $job->applicant_current)
                                                    <div class="dash-filled">
                                                        <span
                                                            class="p-2 rounded-circle text-light bg-success d-inline-flex align-items-center justify-content-center">
                                                            <i class="lni lni-checkmark"></i>
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="dash-filled">
                                                        <span
                                                            class="p-2 circle gray d-inline-flex align-items-center justify-content-center">
                                                            <i class="lni lni-minus"></i>
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $job->deadline }}</td>
                                            <td>{{ $job->applicant_current }}</td>
                                            <td>
                                                <a href="{{ route('single-job', ['id' => $job->id]) }}"
                                                    class="p-2 rounded-circle text-info bg-light-info d-inline-flex align-items-center justify-content-center me-1">
                                                    <i class="lni lni-eye"></i>
                                                </a>
                                                <a href="{{ route('user.edit-jobs', ['id' => $job->id]) }}"
                                                    class="p-2 rounded-circle text-success bg-light-success d-inline-flex align-items-center justify-content-center ms-1">
                                                    <i class="lni lni-pencil"></i>
                                                </a>
                                                <form action="{{ route('user.manage-jobs.delete', ['id' => $job->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="p-2 border-0 rounded-circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ms-1">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </form>
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
