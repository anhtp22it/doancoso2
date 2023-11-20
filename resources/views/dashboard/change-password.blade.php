@extends('dashboard.layouts.app')

@section('content')
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h2 class="text-dark">Change Password</h2>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white rounded mb-4">
                        <div class="py-3 px-3 br-bottom">
                            <h6 class="mb-0 text-dark">
                                <i class="fa fa-lock me-1 theme-cl fs-sm"></i>
                                Change Password
                            </h6>
                        </div>
                        <div class="py-3 px-3">
                            <form action="{{ route('user.changePassword') }}" method="post" class="row">
                                @csrf
                                @method('put')
                                <div class="col-xl-8 col-lg-9 col-12">

                                    @if (session('error'))
                                        <div class="alert alert-danger text-center">
                                            <strong>Lỗi!</strong> {{ session('error') }}
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success text-center">
                                            <strong>Thành công!</strong> {{ session('success') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="col-xl-8 col-lg-9 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Old Password</label>
                                        <input type="password" name="current_password"
                                            class="form-control rounded shadow-none" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-9 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">New Password</label>
                                        <input type="password" name="new_password" class="form-control rounded shadow-none"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-9 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Confirm Password</label>
                                        <input type="password" name="new_password_confirmation"
                                            class="form-control rounded shadow-none" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md py-3 px-4 text-white rounded theme-bg">
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
