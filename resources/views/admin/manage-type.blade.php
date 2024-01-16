@extends('admin.layouts.app')

@section('content')
    <div class="container p-4">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Manage Types</h2>
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
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($stt = 1)
                            @foreach ($job_types as $type)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $type->type }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#"
                                                class="p-2 rounded-circle text-success bg-light-success d-inline-flex align-items-center justify-content-center me-1"
                                                data-bs-toggle="modal" data-bs-target="#editTypeModal"
                                                data-id="{{ $type->id }}" data-name="{{ $type->type }}">
                                                <i class="lni lni-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.job-type.delete', ['id' => $type->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
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
                <a class="btn btn-success py-2 px-3 text-white" data-bs-toggle="modal" data-bs-target="#addTypeModal">
                    Add Job Type
                </a>
            </div>
        </div>
        <!-- Create Job Type Modal -->
        <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTypeModalLabel">
                            Add New Role
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.job-type.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Job Type</label>
                                        <input class="form-control rounded" type="text" name="type" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save Type
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Job Type Modal -->
        <div class="modal fade" id="editTypeModal" tabindex="-1" aria-labelledby="editTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTypeModalLabel">Edit Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.job-type.update') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="id" class="text-dark">ID</label>
                                        <input class="form-control rounded" type="number" name="id" id="id"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="type" class="text-dark">Type</label>
                                        <input class="form-control rounded" type="text" name="type" id="type" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
