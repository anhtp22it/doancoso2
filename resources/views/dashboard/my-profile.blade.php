@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h2 class="text-dark">My Profile</h2>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong>
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                <strong>Success!</strong>
                {{ session('success') }}
            </div>
        @endif
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white rounded mb-4">
                        <div class="br-bottom py-3 px-3">
                            <h4 class="mb-0 text-dark fs-6">
                                <i class="fa fa-user me-1 theme-cl fs-sm"></i>My Account
                            </h4>
                        </div>
                        <div class="py-3 px-3">
                            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data"
                                class="row">
                                @csrf
                                @method('put')
                                <div class="col-12 col-md-3">
                                    <div class="custom-file avatar_uploads">
                                        <input type="file" name="avatar" class="custom-file-input" id="customFile"
                                            onchange="updateLabel(this)" />
                                        <label class="custom-file-label" for="customFile"
                                            style="background-image: url('{{ $user->getAvatarPath() }}')">
                                            @if ($user->avatar === '')
                                                <i class="fa fa-user"></i>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Full Name</label>
                                                <input type="text" name="name" class="form-control rounded"
                                                    value="{{ $user->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Job Title</label>
                                                <input type="text" name="job_title" class="form-control rounded"
                                                    value="{{ $user->job_title }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Phone</label>
                                                <input type="tel" name="phone" class="form-control rounded"
                                                    value="{{ $user->phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Email</label>
                                                <input type="email" readonly class="form-control rounded"
                                                    value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Job Type</label>
                                                <select name="job_type" class="form-select rounded">
                                                    <option value="">Select Job Type</option>
                                                    @foreach ($jobTypes as $id => $type)
                                                        @if (!is_null($user->jobType) && $id == $user->jobType->id)
                                                            <option value="{{ $id }}" selected>{{ $type }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $id }}">{{ $type }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Job Category</label>
                                                <select name="job_category" class="form-select rounded">
                                                    <option value="">Select Job Category</option>
                                                    @foreach ($jobCategories as $id => $title)
                                                        @if (!is_null($user->jobCategory) && $id == $user->jobCategory->id)
                                                            <option value="{{ $id }}" selected>
                                                                {{ $title }}</option>
                                                        @else
                                                            <option value="{{ $id }}">{{ $title }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Experience</label>
                                                <select name="experience" class="form-select rounded">
                                                    <option value="">Select Experience</option>
                                                    @foreach ($experiences as $id => $title)
                                                        @if (!is_null($user->experience) && $id == $user->experience->id)
                                                            <option value="{{ $id }}" selected>
                                                                {{ $title }}</option>
                                                        @else
                                                            <option value="{{ $id }}">{{ $title }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Education</label>
                                                <input type="text" name="education" class="form-control rounded"
                                                    value="{{ $user->education }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Current Salary</label>
                                                <input type="text" name="current_salary" class="form-control rounded"
                                                    value="{{ $user->current_salary }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Expected Salary</label>
                                                <input type="text" name="expected_salary" class="form-control rounded"
                                                    value="{{ $user->expected_salary }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Age</label>
                                                <input type="number" name="age" class="form-control rounded"
                                                    value="{{ $user->age }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="text-dark">Language</label>
                                                <input type="text" name="language" class="form-control rounded"
                                                    value="{{ $user->language }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="text-dark">About Info</label>
                                                <textarea name="about" class="form-control with-light">{{ $user->about }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn py-3 px-4 text-white rounded theme-bg">
                                                    Save Changes
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
            <div class="row">
                <div class="col-12">
                    <div class="bg-white rounded mb-4">
                        <div class="br-bottom py-3 px-3">
                            <h4 class="mb-0 fs-6">
                                <i class="ti-facebook me-1 theme-cl"></i>Social Accounts
                            </h4>
                        </div>
                        <div class="py-3 px-3">
                            <form action="{{ route('user.updateSocial') }}" method="post" class="row">
                                @csrf
                                @method('put')
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-dark">Facebook</label>
                                        <input type="text" name="facebook" class="form-control rounded"
                                            placeholder="https://www.facebook.com/" value="{{ $user->facebook }}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-dark">Twitter</label>
                                        <input type="text" name="twitter" class="form-control rounded"
                                            placeholder="https://www.twitter.com/" value="{{ $user->twitter }}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-dark">LinkedIn</label>
                                        <input type="text" name="linkedin" class="form-control rounded"
                                            placeholder="https://www.linkedin.com/" value="{{ $user->linkedin }}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-dark">Instagram</label>
                                        <input type="text" name="instagram" class="form-control rounded"
                                            placeholder="https://www.instagram.com/" value="{{ $user->instagram }}" />
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn py-3 px-4 text-white rounded theme-bg">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bg-white rounded mb-4">
                        <div class="br-bottom py-3 px-3">
                            <h4 class="mb-0 fs-6">
                                <i class="fas fa-lock me-1 theme-cl"></i>
                                Contact Information
                            </h4>
                        </div>
                        <div class="py-3 px-3">
                            <form action="{{ route('user.updateContact') }}" method="post" class="row">
                                @csrf
                                @method('put')
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark">Country</label>
                                        <input type="text" name="country" class="form-control rounded"
                                            placeholder="Việt Nam" value="{{ $user->country }}" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark">City</label>
                                        <input type="text" name="city" class="form-control rounded"
                                            placeholder="Đà Nẵng" value="{{ $user->city }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark">Full Address</label>
                                        <input type="text" name="full_address" class="form-control rounded"
                                            placeholder="Hoà Hải, Ngũ Hành Sơn, Đà Nẵng"
                                            value="{{ $user->full_address }}" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn py-3 px-4 text-white rounded theme-bg">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bg-white rounded mb-4">
                        <div class="br-bottom py-3 px-3">
                            <h4 class="mb-0 fs-6">
                                <i class="lni lni-add-files me-1 theme-cl"></i>
                                Contact Information
                            </h4>
                        </div>
                        <div class="py-3 px-3">
                            <form action="{{ route('user.updateCv') }}" method="post" class="row"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark">Resume</label>
                                        <input type="file" id="cv" name="cv" class="d-none" />
                                        <input type="text" id="cv_filename" class="form-control rounded" readonly
                                            onclick="document.getElementById('cv').click()"
                                            value="{{ str_replace('cvs/', '', \Illuminate\Support\Facades\Auth::user()->cv) }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn py-3 px-4 text-white rounded theme-bg">
                                            Save Changes
                                        </button>
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
