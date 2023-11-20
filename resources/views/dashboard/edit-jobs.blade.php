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
                            <form action="{{ route('user.edit-jobs.edit') }}" method="post" class="row"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input name="id" value="{{ $job->id }}" type="hidden">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark"> Job Title </label>
                                                <input type="text" name="title" class="form-control rounded"
                                                    placeholder="Title" value="{{ $job->title }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark"> Company Name </label>
                                                <input type="text" name="company" class="form-control rounded"
                                                    placeholder="Title" value="{{ $job->company }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Job Description</label>
                                                <textarea name="description" class="form-control rounded" placeholder="Job Description">{{ $job->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Job Category</label>
                                                <select class="form-control rounded" name="category">
                                                    @foreach ($jobCategories as $id => $title)
                                                        <option value="{{ $id }}"
                                                            {{ $id == $job->category_id ? 'selected' : '' }}>
                                                            {{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Job Type</label>
                                                <select class="form-control rounded" name="type">
                                                    @foreach ($jobTypes as $id => $name)
                                                        <option value="{{ $id }}"
                                                            {{ $id == $job->jobType->id ? 'selected' : '' }}>
                                                            {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Experience</label>
                                                <select class="form-control rounded" name="experience">
                                                    @foreach ($experiences as $id => $title)
                                                        <option value="{{ $id }}"
                                                            {{ $id == $job->experience->id ? 'selected' : '' }}>
                                                            {{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Salary</label>
                                                <input type="text" name="salary" class="form-control rounded"
                                                    placeholder="500$ - 1000$" value="{{ $job->salary }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Application Deadline</label>
                                                <input type="date" name="dealine" class="form-control rounded"
                                                    placeholder="dd-mm-yyyy"
                                                    value="{{ \Carbon\Carbon::parse($job->deadline)->format('Y-m-d') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">Applicant Limit</label>
                                                <input type="text" name="applicant_limit" class="form-control rounded"
                                                    placeholder="1000" value="{{ $job->applicant_limit }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark">Requirements</label>
                                                    <div class="mb-3" id="requirements-container">
                                                        @foreach ($job->requirements as $requirement)
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="requirements[]"
                                                                    value="{{ $requirement->requirement }}">
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="removeRequirement(this)">X
                                                                </button>
                                                            </div>
                                                        @endforeach
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
                                                    placeholder="Country" value="{{ $job->country }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark">City</label>
                                                <input type="text" name="city" class="form-control"
                                                    placeholder="City" value="{{ $job->city }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">Full Address</label>
                                                <input type="text" name="full_address" class="form-control"
                                                    placeholder="#10 Marke Juger, SBI Road"
                                                    value="{{ $job->full_address }}" />
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
