@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h2 class="text-dark">Manage Applicant</h2>
                </div>
            </div>
        </div>

        @if (isset($applicants))
            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="px-3 py-4 bg-white rounded mb-3">
                            <span class="mb-0 fw-bold text-dark">
                                {{ $applicants->count() }} New Applicants Found
                            </span>
                        </div>

                        <div class="data-applicants">
                            @foreach ($applicants as $applicant)
                                <!-- Item -->
                                <div class="applicant-wrap bg-white rounded mb-3">
                                    <div class="applicant-full bg-white rounded p-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="{{ $applicant->getAvatarPath() }}"
                                                     class="img-fluid rounded-circle" style="width: 70px; height: 70px;"
                                                     alt=""/>
                                            </div>
                                            <div>
                                                <div class="px-2">
                                                    <h4 class="fs-5 mb-0 theme-cl">{{ $applicant->name }}</h4>
                                                    <div class="d-block mb-2 position-relative">
                                                        <small>
                                                            <i class="lni lni-map-marker me-1"></i>{{ $applicant->country }}
                                                        </small>
                                                        <small class="ms-2">
                                                            <i
                                                                class="lni lni-briefcase me-1"></i>{{ $applicant->job_title }}
                                                        </small>
                                                    </div>
                                                    <a download
                                                       href="{{ route('user.manage-applicant.cv', str_replace('cvs/', '', $applicant->cv)) }}"
                                                       class="px-2 py-1 bg-light-success rounded theme-cl">
                                                        <i class="lni lni-download me-1"></i>Download CV
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-left pe-3 d-flex">
                                                <form method="post"
                                                      action="{{ route('user.manage-applicant.accept') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $applicant->user_id }}">
                                                    <input type="hidden" name="job_id" value="{{ $jobId }}">
                                                    <button type="submit"
                                                            class="me-2 agree-hover p-2 rounded-circle border-0">
                                                        <i class="lni lni-checkmark"></i>
                                                    </button>
                                                </form>
                                                <form method="post"
                                                      action="{{ route('user.manage-applicant.reject') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $applicant->user_id }}">
                                                    <input type="hidden" name="job_id" value="{{ $jobId }}">
                                                    <button type="submit"
                                                            class="close-hover p-2 rounded-circle border-0">
                                                        <i class="lni lni-close"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant-footer p-3 br-top">
{{--                                        @php--}}
{{--                                            $appliedJob = $applicant->appliedJobs->where('job_id', $jobId)->first();--}}
{{--                                        @endphp--}}
                                        @if ($applicant->status == 'Pending')
                                            <div class="applicant-status bg-light-info">
                                                <small class="text-info p-2">Pending</small>
                                            </div>
                                        @elseif($applicant->status == 'Trashed')
                                            <div class="applicant-status bg-light-danger">
                                                <small class="text-danger p-2">Trashed</small>
                                            </div>
                                        @elseif($applicant->status == 'Active')
                                            <div class="applicant-status bg-light-success">
                                                <small class="text-success p-2">Active</small>
                                            </div>
                                        @endif
                                        <div class="applied-date">
                                            <span>
                                                <i class="lni lni-calendar me-1"></i>
                                                {{ $applicant->created_at->format('d M, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if (isset($jobs))
        <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="jobModalLabel"
             data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title theme-cl" id="jobModalLabel">Chọn công việc</h4>
                    </div>
                    <div class="modal-body">
                        <ol>
                            @foreach ($jobs as $job)
                                <li class="fs-5"><a href="{{ route('user.manage-applicant', ['job_id' => $job->id]) }}">
                                        {{ $job->title }} </a>
                                </li>
                            @endforeach

                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
