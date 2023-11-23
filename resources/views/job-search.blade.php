@extends('layouts.app')

@section('content')
    <!-- Start Search Banner -->
    <div style="margin-top: -24px" class="py-3 theme-bg searchingBar">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-9 col-xl-7">
                    <form action="{{ url('/job-search') }}" method="get" class="bg-white rounded p-1 border">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 col-xl-9">
                                <div class="form-group mb-0 position-relative">
                                    <input class="form-control border-0 shadow-none" style="padding-left: 32px"
                                        type="text" name="name" placeholder="Job Title, Keyword or Company"
                                        value="{{ $name }}" />
                                    <i class="bnc-ico lni lni-search-alt"></i>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group mb-0 align-items-center">
                                    <button type="submit"
                                        class="btn w-100 bg-dark text-light fs-6 custom-height-lg shadow-none">
                                        Find
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Searcher Banner -->

    <!-- Start content -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center justify-content-between mx-0 bg-white rounded py-4 mb-4">
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                            <h6 class="mb-0 text-dark">{{ $jobs->total() }} New Jobs Found</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center g-3">
                @foreach ($jobs as $job)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="border rounded bg-white position-relative d-block">
                            <div class="mb-3 pt-5 px-3">
                                <a href="{{ url('single-job/' . $job->id) }}" class="d-block text-center m-auto"
                                    style="height: 70px">
                                    <img src="{{ $job->getJobPath() }}" class="img-fluid" width="70" alt="" />
                                </a>
                            </div>
                            <div class="text-center pb-5 px-3">
                                <h6 style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis" class="mb-0 lh-1">{{ $job->company }}</h6>
                                <h5 style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; min-height: 53px">
                                    <a href="{{ url('single-job/' . $job->id) }}" class="text-dark">
                                        {{ $job->title }}
                                    </a>
                                </h5>
                                <div>
                                    <i class="lni lni-map-marker me-1"></i>
                                    <span>{{ $job->city }}</span>
                                </div>
                            </div>
                            <div class="pb-4 px-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="lni lni-wallet me-1"></i>
                                    {{ $job->salary }}
                                </div>
                                <div>
                                    <i class="lni lni-timer me-1"></i>
                                    {{ $job->created_at->diffInDays() }} days ago
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $jobs->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </section>
    <!-- End content -->
@endsection
