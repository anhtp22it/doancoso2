@extends('admin.layouts.app')

@section('content')
    <div class="container p-4">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Manage Jobs</h2>
                </div>
            </div>
        </div>
        <!-- Table -->
        @if (session('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <div class="mb-4 rounded overflow-auto">
                <div>
                    <table class="table bg-white">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Dealine</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($stt = 1)
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
                                            <small class="text-warning p-2">{{ $job->status }}</small>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($job->created_at)->format('Y-m-d') }}</td>
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
