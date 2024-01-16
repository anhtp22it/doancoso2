@extends('admin.layouts.app')

@section('content')
    <div class="container p-4">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Manage Users</h2>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif
            <div class="mb-4 rounded overflow-auto">
                <div>
                    <table class="table bg-white">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($stt = 1)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>
                                        <div class="cats-box rounded bg-white d-flex align-items-center">
                                            <div class="text-center">
                                                <img style="height: 55px" src="{{ $user->getAvatarPath() }}"
                                                    class="img-fluid" alt="" />
                                            </div>
                                            <div class="px-2">
                                                <h4 class="fs-6 mb-1">{{ $user->name }}</h4>
                                                <div class="d-block mb-2 position-relative">
                                                    <span>
                                                        <i class="lni lni-map-marker me-1"></i>
                                                        {{ $user->city }}, {{ $user->country }}
                                                    </span>
                                                    <span class="ms-2 theme-cl">
                                                        <i class="lni lni-briefcase me-1"></i>
                                                        {{ $user->jobType->type ?? '' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#"
                                                class="p-2 rounded-circle text-info bg-light-info d-inline-flex align-items-center justify-content-center me-1"
                                                data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                data-id="{{ $user->id }}" data-role="{{ $user->role->id }}"
                                                data-fullname="{{ $user->name }}" data-email="{{ $user->email }}"
                                                data-job_title="{{ $user->job_title }}" data-phone="{{ $user->phone }}"
                                                data-job_type="{{ $user->jobType->type ?? '' }}"
                                                data-job_category="{{ $user->jobCategory->name ?? '' }}"
                                                data-experience="{{ $user->experience->title ?? '' }}"
                                                data-age="{{ $user->age }}" data-language="{{ $user->language }}"
                                                data-facebook="{{ $user->facebook }}"
                                                data-linkedin="{{ $user->linkedin }}"
                                                data-instagram="{{ $user->instagram }}"
                                                data-twitter="{{ $user->twitter }}" data-country="{{ $user->country }}"
                                                data-city="{{ $user->city }}"
                                                data-full_address="{{ $user->full_address }}">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.user.delete', ['id' => $user->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="p-2 border-0 rounded-circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ms-1">
                                                    <i class="lni lni-trash-can"></i>
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
        <!-- Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal">Edit Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.updateRole') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">No.</label>
                                        <input class="form-control rounded" type="number" id="id" name="id"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Role</label>
                                        <select class="form-control rounded" name="role" id="role">
                                            @foreach ($roles as $id => $role)
                                                <option value="{{ $id }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Full Name</label>
                                        <input class="form-control rounded" type="text" id="name" name="fullname"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Email</label>
                                        <input class="form-control rounded" type="email" id="email" name="email"
                                            value="tanh11704@gmail.com" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Job Title</label>
                                        <input class="form-control rounded" type="text" id="job_title"
                                            name="job_title" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Phone</label>
                                        <input class="form-control rounded" type="tel" id="phone" name="phone"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Job Type</label>
                                        <input class="form-control rounded" type="text" id="job_type"
                                            name="job_type" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Job Category</label>
                                        <input class="form-control rounded" type="text" id="job_category"
                                            name="job_category" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Experience</label>
                                        <input class="form-control rounded" type="text" id="experience"
                                            name="experience" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Current Salary</label>
                                        <input class="form-control rounded" type="text" name="current_salary"
                                            value="0" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Expected Salary</label>
                                        <input class="form-control rounded" type="text" name="expected_salary"
                                            value="5000$" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Age</label>
                                        <input class="form-control rounded" type="number" id="age" name="age"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Language</label>
                                        <input class="form-control rounded" type="text" id="language"
                                            name="language" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Facebook</label>
                                        <input class="form-control rounded" type="url" id="facebook"
                                            name="facebook" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Linkedin</label>
                                        <input class="form-control rounded" type="url" id="linkedin"
                                            name="linkedin" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Instagram</label>
                                        <input class="form-control rounded" type="url" id="instagram"
                                            name="instagram" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Twitter</label>
                                        <input class="form-control rounded" type="url" id="twitter" name="twitter"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Country</label>
                                        <input class="form-control rounded" type="text" name="country"
                                            value="Việt Nam" disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">City</label>
                                        <input class="form-control rounded" type="text" id="city" name="city"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Full Address</label>
                                        <input class="form-control rounded" type="text" id="full_address"
                                            name="full_address" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
