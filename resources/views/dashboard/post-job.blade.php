@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h2 class="text-dark">Post A New Job</h2>
                </div>
            </div>
        </div>
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white rounded mb-4">
                        <div class="br-bottom py-3 px-3">
                            <h4 class="mb-0 text-dark fs-6">
                                <i class="fa fa-file me-1 theme-cl fs-sm"></i>Post Job
                            </h4>
                        </div>
                        <div class="py-3 px-3">
                            <form action="{{ route('jobs.store') }}" class="row" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark"> Job Title </label>
                                                <input type="text" name="title" class="form-control rounded"
                                                    placeholder="Title" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark"> Company Name </label>
                                                <input type="text" name="company" class="form-control rounded"
                                                    placeholder="Title" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Job Description</label>
                                                <textarea name="description" class="form-control rounded" placeholder="Job Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Job Category</label>
                                                <select class="form-control rounded" name="category">
                                                    @foreach ($jobCategories as $id => $title)
                                                        <option value="{{ $id }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Job Type</label>
                                                <select class="form-control rounded" name="type">
                                                    @foreach ($jobTypes as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Experience</label>
                                                <select class="form-control rounded" name="experience">
                                                    @foreach ($experiences as $id => $title)
                                                        <option value="{{ $id }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Salary</label>
                                                <input type="text" name="salary" class="form-control rounded"
                                                    placeholder="500$ - 1000$" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Application Deadline</label>
                                                <input type="date" name="dealine" class="form-control rounded"
                                                    placeholder="dd-mm-yyyy" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Applicant Limit</label>
                                                <input type="text" name="applicant_limit" class="form-control rounded"
                                                    placeholder="1000" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark">Requirements</label>
                                                    <div class="mb-3" id="requirements-container">
                                                        <div class="d-flex requirement mb-3">
                                                            <input type="text" name="requirements[]"
                                                                class="form-control rounded me-2">
                                                            <button class="btn btn-danger py-2 px-3 text-white rounded"
                                                                onclick="removeRequirement(this)">Xóa
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                        class="btn fw-light shadow-none theme-bg text-white"
                                                        id="add-requirement" onclick="addRequirement()">Thêm
                                                        Requirement
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Country</label>
                                                <input type="text" name="country" class="form-control"
                                                    placeholder="Country" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">City</label>
                                                <input type="text" name="city" class="form-control"
                                                    placeholder="City" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Full Address</label>
                                                <input type="text" name="full_address" class="form-control"
                                                    placeholder="#10 Marke Juger, SBI Road" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark">Job Image</label>
                                                <input type="file" name="job_image" class="form-control border-white">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn py-3 px-4 text-white rounded theme-bg">
                                                    Publish Job
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
