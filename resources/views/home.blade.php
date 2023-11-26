@extends('layouts.app')

@section('content')
    <!-- Start Home Banner -->
    <div style="margin-top: -25px" class="home-banner pt-3">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-7">
                    <div class="banner_caption text-start mb-4">
                        <div class="trending-jobs d-block mb-2">
                            <span class="px-3 py-1 medium theme-bg-light theme-cl rounded">Get Trending jobs</span>
                        </div>
                        <h1 class="banner_title text-black" style="font-weight: 600">
                            Explore More Than <br/>
                            <span class="theme-cl">7840+</span>
                            Jobs
                        </h1>
                        <p class="fs-6">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis praesentium voluptatum deleniti atque
                        </p>
                    </div>
                    <form action="{{ url('/job-search') }}" class="bg-white rounded p-1">
                        @csrf
                        <div class="row gx-0">
                            <div class="col-12 col-md-5">
                                <div class="form-group mb-0 position-relative">
                                    <input type="text" name="name" id="" class="form-control lg shadow-none"
                                           style="
                      padding-left: 32px;
                      border: 0;
                      border-right: 1px solid #ebedf1;
                    "
                                           placeholder="Job Title, Keyword or Company"/>
                                    <i class="bnc-ico lni lni-search-alt"></i>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group mb-0 position-relative">
                                    <select class="form-control shadow-none lg border-0" name="category">
                                        <option value="0">Choose Categories</option>
                                        @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-xl-2">
                                <div class="form-group mb-0 position-relative d-flex">
                                    <button type="submit"
                                            class="btn w-100 theme-bg custom-height-lg text-white fs-6 shadow-none">
                                        Find Job
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-5">
                    <div class="position-relative">
                        <img src="{{ asset('assets/img/bn-2.png') }}" class="img-fluid" alt=""/>
                        <div class="list_crs_img">
                            <img src="{{ asset('assets/img/img-1.png') }}" class="img-fluid elsio animate-fl-y cirl"
                                 alt=""/>
                            <img src="{{ asset('assets/img/img-3.png') }}" class="img-fluid elsio animate-fl-x arrow"
                                 alt=""/>
                            <img src="{{ asset('assets/img/img-3.png') }}" class="img-fluid elsio animate-fl-x moon"
                                 alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home Banner -->

    <!-- Start Tag Award -->
    <section class="infomation position-relative p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div style="margin-top: -50px">
                        <div class="row align-items-center">
                            <div class="infomation-item col-12 col-md-4">
                                <div class="content">
                                    <div class="content-logo">
                                        <i class="fa fa-journal-whills"></i>
                                    </div>
                                    <div class="content-text">
                                        <h6 class="text-black">7421 Active jobs</h6>
                                        <p>
                                            Duis aute irure dolor in voluptate velit esse cillum
                                            labore .
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="infomation-item col-12 col-md-4">
                                <div class="content">
                                    <div class="content-logo">
                                        <i class="fa fa-business-time"></i>
                                    </div>
                                    <div class="content-text">
                                        <h6 class="text-black">2410 Employers</h6>
                                        <p>
                                            Duis aute irure dolor in voluptate velit esse cillum
                                            labore .
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="infomation-item col-12 col-md-4">
                                <div class="content">
                                    <div class="content-logo">
                                        <i class="fa fa-user-shield"></i>
                                    </div>
                                    <div class="content-text">
                                        <h6 class="text-black">800k+ Enrolled</h6>
                                        <p>
                                            Duis aute irure dolor in voluptate velit esse cillum
                                            labore .
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Tag Award -->

    <!-- Start Job List -->
    <section class="job-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="position-relative text-center mb-2">
                        <h6 class="mb-0">Recent Jobs</h6>
                        <h2 class="text-black fw-bold">
                            Recent Active
                            <span class="theme-cl">Listed jobs</span>
                        </h2>
                    </div>
                </div>
                <div class="row align-items-center g-xl-4 g-lg-3 g-md-3 g-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @foreach ($jobs as $job)
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="position-relative d-block bg-white text-start border rounded">
                                <div
                                    class="rounded bg-white d-flex align-items-center justify-content-between px-3 py-3">
                                    <div class="rounded bg-white d-flex align-items-center">
                                        <div class="text-center" style="width: 55px; height: 55px">
                                            <img src="{{ $job->getJobPath() }}" class="img-fluid" width="55"
                                                 alt=""/>
                                        </div>
                                        <div class="px-2">
                                            <a href="{{ route('single-job', ['id' => $job->id]) }}">
                                                <h4 class="mb-0 fs-6 text-black">
                                                    {{ $job->title }}
                                                </h4>
                                            </a>
                                            <div class="d-block mb-2 position-relative" style="width: 255px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">
                                                <span>
                                                    <i class="lni lni-map-marker"></i>
                                                    {{ $job->city }}, {{ $job->country }}
                                                </span>
                                                <span class="ms-2 theme-cl">
                                                    <i class="lni lni-briefcase me-1"></i> {{ $job->jobType->type }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <form action="{{ route('jobs.apply') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="job_id" type="text"
                                                   value="{{ $job->id }}">
                                            <input type="hidden" name="user_id" type="text"
                                                   value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="cv" value="{{ Auth::user()->cv }}">
                                            @if ($job->hasApplied(Auth::user()->id))
                                                <button class="btn rounded apply-btn" style="min-width: 161px" disabled>
                                                    Job Applied
                                                    <i class="lni lni-arrow-right-circle ms-1"></i>
                                                </button>
                                            @else
                                                <button type="submit" class="btn rounded apply-btn"
                                                        style="min-width: 161px">
                                                    Apply Job
                                                    <i class="lni lni-arrow-right-circle ms-1"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                        <div class="position-relative text-center">
                            <a href="{{ url('/job-search') }}"
                               class="btn theme-bg rounded text-light hover-theme py-3 px-4 shadow-none">Explore More
                                Jobs<i class="lni lni-arrow-right-circle ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Job List -->

    <!-- Start Categories -->
    <section class="categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="position-relative mb-3 text-center">
                        <h6 class="mb-0">Popular Categories</h6>
                        <h2 class="text-black">Browse Top Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center g-3 g-xl-4">
                @foreach ($categories as $category)
                    <!-- Item -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="text-center">
                            <a href="{{ url('/job-search?category=' . $category->id) }}"
                               class="d-block rounded bg-white px-2 py-4">
                                <div
                                    class="text-center mb-2 mx-auto position-relative d-inline-flex align-items-center justify-content-center p-3 bg-light-success rounded-circle fs-4 theme-cl">
                                    {!! $category->icon !!}
                                </div>
                                <div class="categories-caption">
                                    <h4 class="fs-6">{{ $category->name }}</h4>
                                    <span>{{ $category->jobs_count }} Jobs</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12 mt-5">
                    <div class="position-relative text-center">
                        <a href="{{ url('/job-search') }}" class="browse-category btn rounded shadow-none">
                            Browse All Categories
                            <i class="lni lni-arrow-right-circle ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Categories -->

    <!-- Start Customer Review -->
    <section class="customer-review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="position-relative mb-3 text-center">
                        <h6 class="mb-0">Our Reviews</h6>
                        <h2 class="text-black">
                            What Our Customer
                            <span class="theme-cl">Saying</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="review-slide">
                        <!-- single review -->
                        <div class="single_review px-2">
                            <div class="reviews_wrap position-relative bg-white rounded py-4 px-4">
                                <div class="rw-header d-flex align-items-center justify-content-start">
                                    <div class="rv-110-thumb position-relative verified-author">
                                        <img src="{{ asset('assets/img/team-3.jpg') }}" class="img-fluid circle"
                                             width="70" alt=""/>
                                    </div>
                                    <div class="rv-110-caption ps-3">
                                        <h4 class="ft-medium fs-md mb-0 lh-1">
                                            Alvin B. Washington
                                        </h4>
                                        <p class="p-0 m-0">Co Founder</p>
                                    </div>
                                </div>
                                <div class="rw-header d-flex mt-3">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- single review -->
                        <div class="single_review px-2">
                            <div class="reviews_wrap position-relative bg-white rounded py-4 px-4">
                                <div class="rw-header d-flex align-items-center justify-content-start">
                                    <div class="rv-110-thumb">
                                        <img src="{{ asset('assets/img/team-4.jpg') }}" class="img-fluid circle"
                                             width="70" alt=""/>
                                    </div>
                                    <div class="rv-110-caption ps-3">
                                        <h4 class="ft-medium fs-md mb-0 lh-1">
                                            Lavera C. Clifford
                                        </h4>
                                        <p class="p-0 m-0">Team Manager</p>
                                    </div>
                                </div>
                                <div class="rw-header d-flex mt-3">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- single review -->
                        <div class="single_review px-2">
                            <div class="reviews_wrap position-relative bg-white rounded py-4 px-4">
                                <div class="rw-header d-flex align-items-center justify-content-start">
                                    <div class="rv-110-thumb position-relative verified-author">
                                        <img src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid circle"
                                             width="70" alt=""/>
                                    </div>
                                    <div class="rv-110-caption ps-3">
                                        <h4 class="ft-medium fs-md mb-0 lh-1">
                                            Linda S. Riggs
                                        </h4>
                                        <p class="p-0 m-0">Project Manager</p>
                                    </div>
                                </div>
                                <div class="rw-header d-flex mt-3">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- single review -->
                        <div class="single_review px-2">
                            <div class="reviews_wrap position-relative bg-white rounded py-4 px-4">
                                <div class="rw-header d-flex align-items-center justify-content-start">
                                    <div class="rv-110-thumb">
                                        <img src="{{ asset('assets/img/team-5.jpg') }}" class="img-fluid circle"
                                             width="70" alt=""/>
                                    </div>
                                    <div class="rv-110-caption ps-3">
                                        <h4 class="ft-medium fs-md mb-0 lh-1">
                                            Chris L. Hazel
                                        </h4>
                                        <p class="p-0 m-0">Web Designer</p>
                                    </div>
                                </div>
                                <div class="rw-header d-flex mt-3">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- single review -->
                        <div class="single_review px-2">
                            <div class="reviews_wrap position-relative bg-white rounded py-4 px-4">
                                <div class="rw-header d-flex align-items-center justify-content-start">
                                    <div class="rv-110-thumb position-relative verified-author">
                                        <img src="{{ asset('assets/img/team-1.jpg') }}" class="img-fluid circle"
                                             width="70" alt=""/>
                                    </div>
                                    <div class="rv-110-caption ps-3">
                                        <h4 class="ft-medium fs-md mb-0 lh-1">
                                            Mark Jukerberg
                                        </h4>
                                        <p class="p-0 m-0">PHP Developer</p>
                                    </div>
                                </div>
                                <div class="rw-header d-flex mt-3">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Customer Review -->
@endsection
