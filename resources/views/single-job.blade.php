@extends('layouts.app')

@section('content')
<!-- Start JobTitle -->
<div style="margin-top: -24px" class="bg-light rounded py-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="thumb">
                            <img src="{{ $job->getJobPath() }}" class="img-fluid" width="100" alt="" />
                        </div>
                        <div class="caption ps-3">
                            <div class="title">
                                <h4 class="mb-0 fs-6">
                                    {{ $job->title }}
                                    <img src="{{ asset('assets/img/verify.svg') }}" class="ms-1" width="12" alt="" />
                                </h4>
                            </div>
                            <div class="location mb-3">
                                <span>
                                    <i class="lni lni-map-marker me-1"></i>
                                    {{ $job->city }}, {{ $job->country }}
                                </span>
                                <span class="ms-3">
                                    <i class="lni lni-money-protection"></i>
                                    {{ $job->salary }}
                                </span>
                            </div>
                            <div class="info">
                                <span class="px-2 py-1 ft-medium medium text-light theme-bg rounded me-2">
                                    {{ $job->jobType->type }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div>
                            <form style="display:inline;" action="{{ route('jobs.apply') }}" method="post">
                                @csrf
                                <input type="hidden" name="job_id" type="text" value="{{ $job->id }}">
                                <input type="hidden" name="user_id" type="text" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="cv" value="{{ Auth::user()->cv }}">
                                @if ($appliedJob > 0 || $job->applicant_limit == $job->applicant_current)
                                <button href="#" class="btn py-3 px-4 rounded theme-cl fs-6 shadow-none"
                                    style="background-color: rgba(40, 182, 97, 0.11)" disabled>
                                    Job Applied
                                </button>
                                @else
                                <button href="#" class="btn py-3 px-4 rounded theme-cl fs-6 shadow-none"
                                    style="background-color: rgba(40, 182, 97, 0.11)">
                                    Apply This Job
                                </button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End JobTitle -->

<!-- Start Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="rounded mb-4">
                    <div class="pe-3">
                        <div class="jobdetails mb-4">
                            <h6 class="text-black">Job description</h6>
                            <p>
                                {!! $job->description !!}
                            </p>
                        </div>
                        <div class="jobdetails mb-3">
                            <h6 class="text-black">Requirements:</h6>
                            <div class="position-relative row">
                                <div class="col-12">
                                    @foreach ($job->requirements as $requirement)
                                    <div class="mb-2 me-4 ms-lg-0 me-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="theme-cl p-1 small d-flex align-items-center justify-content-center">
                                                <i class="fas fa-check small"></i>
                                            </div>
                                            <span class="mb-0 ms-3"> {{ $requirement->requirement }} </span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 pe-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mb-2">
                                <form style="display: inline" action="{{ route('jobs.save') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" type="text" value="{{ $job->id }}">
                                    <input type="hidden" name="user_id" type="text" value="{{ Auth::user()->id }}">
                                    @if ($savedJob > 0)
                                    <button type="submit" style="background-color: #eef7f8"
                                        class="btn btn-lg rounded fs-6 ft-medium me-2 py-3 px-4 border-0" disabled>
                                        Job Saved
                                    </button>
                                    @else
                                    <button type="submit" style="background-color: #eef7f8"
                                        class="btn btn-lg rounded fs-6 ft-medium me-2 py-3 px-4">
                                        Save This Job
                                    </button>
                                    @endif
                                </form>
                                <form style="display:inline;" action="{{ route('jobs.apply') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" type="text" value="{{ $job->id }}">
                                    <input type="hidden" name="user_id" type="text" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="cv" value="{{ Auth::user()->cv }}">
                                    @if ($appliedJob > 0 || $job->applicant_limit == $job->applicant_current)
                                    <button class="btn btn-lg rounded theme-bg text-light fs-6 py-3 px-4" disabled>
                                        Job Applied
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-lg rounded theme-bg text-light fs-6 py-3 px-4">
                                        Apply Job
                                    </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->

<!-- Start Related Job -->
<section style="background-color: #eef7f8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="position-relative mb-5 text-center">
                    <h5 class="mb-0 fw-light"> Related Jobs</h5>
                    <h3 class="fw-bold text-black">All Related Listed jobs</h3>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row align-items-center g-3">
            @foreach ($related_jobs as $job)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="border rounded bg-white position-relative d-block">
                    <div class="mb-3 pt-5 px-3">
                        <a href="{{ url('single-job/' . $job->id) }}" class="d-block text-center m-auto">
                            <img src="{{ $job->getJobPath() }}" class="img-fluid" width="70" alt="" />
                        </a>
                    </div>
                    <div class="text-center pb-4 px-3">
                        <h6 class="mb-0 lh-1">Google Inc</h6>
                        <h5>
                            <a href="{{ url('single-job/' . $job->id) }}" class="text-dark">
                                {{ $job->title }}
                            </a>
                        </h5>
                        <div>
                            <i class="lni lni-map-marker"></i>
                            <small>{{ $job->city }}</small>
                        </div>
                    </div>
                    <div class="pb-4 px-3 d-flex align-items-center justify-content-between">
                        <div><i class="lni lni-wallet me-1"></i>{{ $job->salary }}</div>
                        <div><i class="lni lni-timer me-1"></i>{{ $job->created_at->diffInDays() }} days ago
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Related Job -->
@endsection